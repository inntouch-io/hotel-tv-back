<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 29.04.2022 / 15:12
 */

namespace App\Http\Controllers\Admin;

use App\Models\App;
use App\Services\Admin\Module\AppService;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

/**
 * Class AppController
 * @package App\Http\Controllers\Admin
 */
class AppController extends AdminController
{
    /**
     * @return View
     */
    public function index(): View
    {
        $error = $apps = null;

        try {
            $apps = AppService::getInstance()->list();
        } catch (Exception $exception) {
            $error = $exception->getMessage();
        }

        return view(
            'apps.index',
            [
                'error' => $error,
                'list'  => $apps
            ]
        );
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|View
     */
    public function edit(int $id)
    {
        $error = $app = null;

        try {
            /** @var App $app */
            $app = AppService::getInstance()->getById($id);
        } catch (Exception $exception) {
            $error = $exception->getMessage();
        }

        return view(
            'apps.edit',
            [
                'error' => $error,
                'app'   => $app
            ]
        );
    }

    public function update(Request $request, int $id)
    {
        $error = $app = null;

        try {
            /** @var App $app */
            $app = AppService::getInstance()->getById($id);
            AppService::getInstance()->modify($app, $request);

            return redirect()->route('admin.apps.edit', ['app' => $app->getId()])
                ->with('success', 'Успешно сохранено');
        } catch (Exception $exception) {
            $error = $exception->getMessage();
        }

        return view(
            'apps.edit',
            [
                'error' => $error,
                'app'   => $app
            ]
        );
    }
}
