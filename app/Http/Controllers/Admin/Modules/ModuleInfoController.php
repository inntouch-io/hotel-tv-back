<?php

/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * @link    https://karaev.uz
 * Created: 26.04.2022 / 15:20
 */

namespace App\Http\Controllers\Admin\Modules;

use App\Http\Controllers\Admin\AdminController;
use Domain\Modules\Entities\Module;
use Domain\Modules\Entities\ModuleInfo;
use Domain\Modules\Services\ModuleInfoService;
use Domain\Modules\Services\ModuleService;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

/**
 * Class ModuleInfoController
 * @package App\Http\Controllers\Admin\Module
 */
class ModuleInfoController extends AdminController
{
    /**
     * ModuleInfoController constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function create(int $moduleId)
    {
        $this->authorize('create', Module::class);
        $module = ModuleService::getInstance()->getWithInfos($moduleId);

        return view('modules.infos.create', ['module' => $module]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(Request $request)
    {
        $this->authorize('store', Module::class);
        $info = ModuleInfoService::getInstance()->store($request);

        return redirect()->route('admin.modules.infos.edit', ['id' => $info->getId()])
            ->with('success', 'Successfully added');
    }

    /**
     * @param int $id
     * @return View
     * @throws AuthorizationException
     */
    public function edit(int $id)
    {
        $this->authorize('edit', Module::class);
        $moduleInfo = ModuleInfoService::getInstance()->getById($id);

        return view('modules.infos.edit', ['moduleInfo' => $moduleInfo]);
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
        /** @var ModuleInfo $moduleInfo */
        $moduleInfo = ModuleInfoService::getInstance()->getById($id);

        try {
            ModuleInfoService::getInstance()->update($moduleInfo, $request);

            return redirect()->route('admin.modules.infos.edit', ['id' => $moduleInfo->getId()])
                ->with('success', 'Успешно сохранено');
        } catch (Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(int $id)
    {
        $this->authorize('delete', Module::class);
        try {
            $info = ModuleInfoService::getInstance()->getById($id);
            $info->delete();

            return redirect()->route('admin.modules.module.index')
                ->with('success', 'Successfully deleted');
        } catch (Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }
}
