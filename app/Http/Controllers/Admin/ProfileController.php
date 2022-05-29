<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 29.05.2022 / 13:10
 */

namespace App\Http\Controllers\Admin;

use Domain\Admins\Services\AdminService;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

/**
 * Class ProfileController
 * @package App\Http\Controllers\Admin
 */
class ProfileController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return View
     */
    public function edit()
    {
        return view('profile.edit');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request)
    {
        try {
            AdminService::getInstance()->update($request);

            return redirect()->route('admin.profile.edit')
                ->with('success', 'Успешно сохранено');
        }catch (Exception $exception){
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }

    public function editPassword()
    {
        return view('profile.password');
    }

    public function updatePassword(Request $request)
    {
        try {
            AdminService::getInstance()->updatePassword($request);

            return redirect()->route('admin.profile.editPassword')
                ->with('success', 'Успешно сохранено');
        }catch (Exception $exception){
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }
}
