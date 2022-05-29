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
use Illuminate\Support\Facades\Validator as ValidatorFacade;
use Illuminate\Validation\Validator;
use RuntimeException;

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
        /** @var ValidatorFacade $data */
        $data = $request->validate(
            [
                'full_name' => 'required|string'
            ]
        );

        $this->builder->update($data['full_name']);
    }

    /**
     * @param Request $request
     * @return void
     */
    public function updatePassword(Request $request)
    {
        /** @var Validator $validator */
        $validator = $this->validator($request);

        if ($validator->fails()){
            throw new RuntimeException($validator->errors()->first());
        }

        $data = $validator->getData();

        if ($data['new_password'] !== $data['password_confirm']){
            throw new RuntimeException('Password Confirmation does not match!');
        }

        if (!$this->builder->checkCurrentPassword($data['current_password'])){
            throw new RuntimeException('Current Password is incorrect!');
        }

        $this->builder->updatePassword($data['new_password']);
    }

    // Validator for passwords

    public function validator(Request $request)
    {
        return ValidatorFacade::make(
            $request->all(),
            [
                'current_password' => 'required|string|min:6',
                'new_password'     => 'required|string|min:6',
                'password_confirm' => 'required|string|min:6',
            ],
            [
                'required' => 'something'
            ]
        );
    }
}
