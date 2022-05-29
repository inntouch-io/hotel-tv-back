<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 29.05.2022 / 13:36
 */

namespace Domain\Admins\Services;

use Domain\Admins\Builders\AdminBuilder;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

/**
 * Class AdminService
 * @package Domain\Admins\Services
 */
class AdminService
{
    /** @var AdminBuilder $builder */
    protected AdminBuilder $builder;

    public function __construct(AdminBuilder $builder)
    {
        $this->builder = $builder;
    }

    /**
     * @return AdminService
     */
    public static function getInstance(): AdminService
    {
        return new static(AdminBuilder::getInstance());
    }

    /**
     * @param Request $request
     * @return void
     */
    public function update(Request $request)
    {
        /** @var Validator $data */
        $data = $request->validate(
            [
                'full_name' => 'required|string'
            ]
        );

        $this->builder->update($data['full_name']);
    }

    public function updatePassword(Request $request)
    {
        /** @var Validator $data */
        $data = $this->validator($request);

        dd($data);
    }

    // Validator for passwords

    /**
     * @param Request $request
     * @return array
     */
    public function validator(Request $request): array
    {
        return $request->validate(
            [
                'current_password' => 'required|string|min:6',
                'new_password'     => 'required|string|min:6',
                'password_confirm' => 'required|string|min:6',
            ]
        );
    }
}
