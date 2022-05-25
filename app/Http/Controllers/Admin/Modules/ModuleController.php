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


    public function index()
    {
        $this->authorize('index', Module::class);
        $list = ModuleService::getInstance()->list();

        return view(
            'modules.module.index',[
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
        $this->authorize('edit', Module::class);
        /** @var Module $module */
        $module = ModuleService::getInstance()->getById($id);

        return view(
            'modules.module.edit',
            [
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
        $this->authorize('update', Module::class);

        /** @var Module $module */
        $module = ModuleService::getInstance()->getById($id);

        try {
            ModuleService::getInstance()->modify($module, $request);

            return redirect()->route('admin.modules.module.edit', ['id' => $module->getId()])
                ->with('success', 'Успешно сохранено');

        } catch (Exception $exception) {
            return redirect()->route('admin.modules.module.edit', ['id' => $module->getId()])
                ->with('error', $exception->getMessage());
        }
    }
}
