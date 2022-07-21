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
class ApplicationsController extends AdminController
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|View
     * @throws AuthorizationException
     */
    public function create()
    {
        $this->authorize('create', Application::class);
        return view('applications.create');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function store(Request $request)
    {
        $this->authorize('store', Application::class);
        $application = ApplicationService::getInstance()->store($request);

        return redirect()->route('admin.applications.edit', ['application' => $application])
            ->with('success', 'Successfully added');
    }

    public function show()
    {
        //
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

    /**
     * @param int $id
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function destroy(int $id)
    {
        $this->authorize('delete', Application::class);
        try {
            $application = ApplicationService::getInstance()->takeById($id);

            $application->delete();

            return redirect()->route('admin.applications.index')
                ->with('success', 'Successfully deleted');
        } catch (Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }
}
