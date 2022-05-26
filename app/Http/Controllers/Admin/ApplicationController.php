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
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

/**
 * Class ApplicationController
 * @package App\Http\Controllers\Admin
 */
class ApplicationController extends AdminController
{
    /**
     * @return View
     * @throws AuthorizationException
     */
    public function index(): View
    {
        $this->authorize('index', Application::class);
        $applications = ApplicationService::getInstance()->list();

        return view('applications.index', ['list' => $applications]);
    }

    /**
     * @param int $id
     * @return View
     * @throws AuthorizationException
     */
    public function edit(int $id)
    {
        $this->authorize('edit', Application::class);
        $application = ApplicationService::getInstance()->takeById($id);

        return view('applications.edit', ['application' => $application]);
    }

    /**
     * @param Request $request
     * @param int     $id
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function update(Request $request, int $id)
    {
        $this->authorize('update', Application::class);

        $application = ApplicationService::getInstance()->takeById($id);
        try {
            ApplicationService::getInstance()->update($request, $application);

            return redirect()->route('admin.applications.edit', ['application' => $application->getId()])
                ->with('success', 'Успешно сохранено');
        } catch (Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }
}
