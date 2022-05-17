<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 17.05.2022 / 06:03
 */

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Admin\AdminController;
use Exception;
use Illuminate\Contracts\Validation\Validator as ValidatorContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as ValidatorFacade;

/**
 * Class AuthController
 * @package App\Http\Controllers\Admin\Auth
 */
class AuthController extends AdminController
{
    /**
     * AuthController constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function showLoginForm()
    {
        return view(
            'auth.login.index',
            [
                'error' => null
            ]
        );
    }

    /**
     * @param Request $request
     * @return ValidatorContract
     */
    public function validator(Request $request): ValidatorContract
    {
        return ValidatorFacade::make(
            $request->all(),
            [
                'username' => 'required|string|min:6',
                'password' => 'required|string|min:6'
            ],
            [

            ]
        );
    }

    public function login(Request $request)
    {
        $error = null;

        try {

        } catch (Exception $exception) {
            $error = $exception->getMessage();
        }

        return view(
            'auth.login.index',
            [
                'error' => $error
            ]
        );
    }

    public function logout()
    {

    }
}
