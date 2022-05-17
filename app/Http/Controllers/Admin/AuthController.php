<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 17.05.2022 / 06:03
 */

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
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

    public function username()
    {
        return 'username';
    }

    protected function guard()
    {
        return Auth::guard('web');
    }
}
