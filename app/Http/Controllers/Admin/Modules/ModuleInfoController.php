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
use Domain\Modules\Entities\ModuleInfo;
use Domain\Modules\Services\ModuleInfoService;
use Exception;
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(int $id)
    {
        $error = $moduleInfo = null;

        try {
            $moduleInfo = ModuleInfoService::getInstance()->getById($id);
        } catch (Exception $exception) {
            $error = $exception->getMessage();
        }

        return view(
            'modules.infos.edit',
            [
                'error'      => $error,
                'moduleInfo' => $moduleInfo
            ]
        );
    }

    /**
     * @param Request $request
     * @param int     $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, int $id)
    {
        $error = $moduleInfo = null;

        try {
            /** @var ModuleInfo $moduleInfo */
            $moduleInfo = ModuleInfoService::getInstance()->getById($id);

            ModuleInfoService::getInstance()->modify($moduleInfo, $request);

            return redirect()->route('admin.modules.infos.edit', ['id' => $moduleInfo->getId()])
                ->with('success', 'Успешно сохранено');
        } catch (Exception $exception) {
            $error = $exception->getMessage();
        }

        return view(
            'modules.infos.edit',
            [
                'error'      => $error,
                'moduleInfo' => $moduleInfo
            ]
        );
    }
}
