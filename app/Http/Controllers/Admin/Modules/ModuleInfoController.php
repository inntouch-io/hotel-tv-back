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
}
