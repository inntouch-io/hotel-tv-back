<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 29.04.2022 / 15:12
 */

namespace App\Http\Controllers\Admin;

use App\Domain\Applications\Services\ApplicationService;
use App\Models\Application;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

/**
 * Class ApplicationController
 * @package App\Http\Controllers\Admin
 */
class ApplicationController extends AdminController
{
    /**
     * @return View
     */
    public function index(): View
    {
        $error = $applications = null;

        try {
            $applications = ApplicationService::getInstance()->list();
        } catch (Exception $exception) {
            $error = $exception->getMessage();
        }

        return view(
            'apps.index',
            [
                'error' => $error,
                'list'  => $applications
            ]
        );
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|View
     */
    public function edit(int $id)
    {
        $error = $application = null;

        try {
            /** @var Application $application */
            $application = ApplicationService::getInstance()->getById($id);
        } catch (Exception $exception) {
            $error = $exception->getMessage();
        }

        return view(
            'apps.edit',
            [
                'error'       => $error,
                'application' => $application
            ]
        );
    }

    public function update(Request $request, int $id)
    {
        $error = $application = null;

        try {
            /** @var Application $application */
            $application = ApplicationService::getInstance()->getById($id);
            ApplicationService::getInstance()->modify($application, $request);

            return redirect()->route('admin.apps.edit', ['app' => $application->getId()])
                ->with('success', 'Успешно сохранено');
        } catch (Exception $exception) {
            $error = $exception->getMessage();
        }

        return view(
            'apps.edit',
            [
                'error' => $error,
                'application'   => $application
            ]
        );
    }
}
