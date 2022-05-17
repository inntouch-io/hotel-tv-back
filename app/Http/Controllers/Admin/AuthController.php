<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 17.05.2022 / 06:03
 */

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class AuthController
 * @package App\Http\Controllers\Admin\Auth
 */
class AuthController extends AdminController
{
    use AuthenticatesUsers;

    /**
     * AuthController constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    protected function authenticated(Request $request, $user)
    {
        $user->last_ip = $request->ip();
        $user->last_login = time();
        $user->save();
    }

    public function username()
    {
        return 'username';
    }

    protected function guard()
    {
        return Auth::guard('web');
    }
}
