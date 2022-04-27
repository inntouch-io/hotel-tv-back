<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * @link    https://karaev.uz
 * Created: 26.04.2022 / 15:20
 */

namespace App\Http\Controllers\Admin\Module;

use App\Http\Controllers\Admin\AdminController;
use App\Services\Admin\Module\ModuleInfoService;
use Exception;
use Illuminate\Http\Request;

/**
 * Class ModuleInfoController
 * @package App\Http\Controllers\Admin\Module
 */
class ModuleInfoController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }

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

    public function update(Request $request, int $id)
    {

    }
}
