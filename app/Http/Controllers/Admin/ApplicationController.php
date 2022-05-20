<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 29.04.2022 / 15:12
 */

namespace App\Http\Controllers\Admin;

use Domain\Applications\Entities\Application;
use Domain\Applications\Services\ApplicationService;
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
            'applications.index',
            [
                'error' => $error,
                'list'  => $applications
            ]
        );
    }

    public function edit(Request $request, int $id)
    {
        $error = $application = null;

        try {
            $application = ApplicationService::instance()->takeById($id);

            if ($request->isMethod('POST')) {
                ApplicationService::instance()->update($request, $application);
            }
        } catch (Exception $exception) {
            $error = $exception->getMessage();
        }

        return view('applications.edit', [
            'error'       => $error,
            'application' => $application
        ]);
    }

    public function update(Request $request, int $id)
    {
        $error = $application = null;

        try {
            /** @var Application $application */
            $application = ApplicationService::getInstance()->getById($id);
            ApplicationService::getInstance()->modify($application, $request);

            return redirect()->route('admin.applications.edit', ['application' => $application->getId()])
                ->with('success', 'Успешно сохранено');
        } catch (Exception $exception) {
            $error = $exception->getMessage();
        }

        return view(
            'applications.edit',
            [
                'error'       => $error,
                'application' => $application
            ]
        );
    }
}
