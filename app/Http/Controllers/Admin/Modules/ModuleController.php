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
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
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
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function index()
    {
        $this->authorize('index', Module::class);
        $list = ModuleService::getInstance()->list();

        return view('modules.module.index', ['list' => $list]);
    }

    /**
     * @param int $id
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function edit(int $id)
    {
        $this->authorize('edit', Module::class);
        $module = ModuleService::getInstance()->getById($id);

        return view('modules.module.edit', ['module' => $module]);
    }

    /**
     * @param Request $request
     * @param int     $id
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function update(Request $request, int $id)
    {
        $this->authorize('update', Module::class);
        $module = ModuleService::getInstance()->getById($id);

        try {
            ModuleService::getInstance()->update($module, $request);

            return redirect()->route('admin.modules.module.edit', ['id' => $module->getId()])
                ->with('success', 'Успешно сохранено');

        } catch (Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }

    /**
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function sortingList()
    {
        $this->authorize('sortingList', Module::class);
        $list = ModuleService::getInstance()->getAll();

        return view(
            'modules.module.sorting',
            [
                'list' => $list
            ]
        );
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|RedirectResponse
     * @throws AuthorizationException
     */
    public function sorting(Request $request)
    {
        $this->authorize('sorting', Module::class);
        try {
            if ($request->isXmlHttpRequest()) {
                ModuleService::getInstance()->sorting($request->input('modules'));

                return response()->json(['status' => true]);
            }

            return redirect()->back();
        } catch (Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }
}
