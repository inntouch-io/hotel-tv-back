<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 20.04.2022 / 15:23
 */

namespace App\Http\Controllers\Admin\Modules;

use App\Http\Controllers\Admin\AdminController;
use Domain\Modules\Entities\Module;
use Domain\Modules\Services\ModuleService;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ModuleController extends AdminController
{
    /**
     * ModuleController constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return View
     */
    public function index(): View
    {
        $error = $list = null;

        try {
            $this->authorize('index', Module::class);
            $list = ModuleService::getInstance()->list();
        } catch (Exception $exception) {
            $error = $exception->getMessage();
        }

        return view(
            'modules.module.index',
            [
                'error' => $error,
                'list'  => $list
            ]
        );
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|View
     */
    public function edit(int $id)
    {
        $error = $module = null;

        try {
            $this->authorize('edit', Module::class);
            /** @var Module $module */
            $module = ModuleService::getInstance()->getById($id);
        } catch (Exception $exception) {
            $error = $exception->getMessage();
        }

        return view(
            'modules.module.edit',
            [
                'error'  => $error,
                'module' => $module
            ]
        );
    }

    /**
     * @param Request $request
     * @param int     $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|View|RedirectResponse
     */
    public function update(Request $request, int $id)
    {
        $error = $module = null;

        try {
            $this->authorize('update', Module::class);
            /** @var Module $module */
            $module = ModuleService::getInstance()->getById($id);

            ModuleService::getInstance()->modify($module, $request);

            return redirect()->route('admin.modules.module.edit', ['id' => $module->getId()])
                ->with('success', 'Успешно сохранено');
        } catch (Exception $exception) {
            $error = $exception->getMessage();
        }

        return view(
            'modules.module.edit',
            [
                'error'  => $error,
                'module' => $module
            ]
        );
    }
}
