<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 29.04.2022 / 15:24
 */

namespace App\Services\Admin\Module;

use App\Models\App;
use App\Repositories\Admin\AppRepository;
use Illuminate\Contracts\Validation\Validator as ValidatorContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as ValidatorFacade;
use Illuminate\Validation\Validator;
use RuntimeException;

class AppService
{
    /**
     * @return AppService
     */
    public static function getInstance(): AppService
    {
        return new static();
    }

    /**
     * @return \App\Models\App[]|\Illuminate\Database\Eloquent\Collection
     */
    public function list()
    {
        return AppRepository::getInstance()->list();
    }

    /**
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object|null
     */
    public function getById(int $id)
    {
        return AppRepository::getInstance()->getById($id);
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
                'name'  => 'required',
                'image' => 'required',
                'url'   => 'required',
            ],
            [
                'required' => 'Поле :attribute обязательно',
            ]
        );
    }

    public function modify(App $app, Request $request)
    {
        /** @var Validator $validator */
        $validator = $this->validator($request);

        if ($validator->fails()){
            throw new RuntimeException($validator->errors()->first());
        }

        $data = $validator->getData();



    }
}
