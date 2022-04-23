<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * @link    https://karaev.uz
 * Created: 20.04.2022 / 15:23
 */

namespace App\Http\Controllers\Admin\Module;

use App\Http\Controllers\Admin\AdminController;
use App\Models\Module;
use App\Services\Admin\Module\ModuleService;
use Exception;
use Illuminate\Contracts\View\View;
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
            $list = ModuleService::getInstance()->list();
        } catch (Exception $exception) {
            $error = $exception->getMessage();
        }

        return view(
            'modules.index',
            [
                'error' => $error,
                'list'  => $list
            ]
        );
    }

    public function edit(Request $request)
    {
        $error = $module = null;

        try {
            /** @var Module $module */
            $module = ModuleService::getInstance()->getById((int)$request->query('id'));

            if ($request->isMethod('POST')) {
                ModuleService::getInstance()->modify($module, $request);

                return redirect()->route('admin.modules.edit', ['id' => $module->getId()])
                    ->with('success', 'Успешно сохранено');
            }
        } catch (Exception $exception) {
            $error = $exception->getMessage();
        }

        return view(
            'modules.edit',
            [
                'error'  => $error,
                'module' => $module
            ]
        );
    }
}
