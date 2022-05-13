<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 13.05.2022 / 09:21
 */

namespace App\Domain\Applications\Services;

use App\Domain\Applications\Builders\ApplicationBuilder;
use App\Domain\Applications\Entities\Application;
use Illuminate\Contracts\Validation\Validator as ValidatorContract;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as ValidatorFacade;
use Illuminate\Validation\Validator;
use RuntimeException;

/**
 * Class ApplicationService
 * @package App\Domain\Applications\Services
 */
class ApplicationService
{
    /**
     * @return ApplicationService
     */
    public static function getInstance(): ApplicationService
    {
        return new static();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder[]|Collection
     */
    public function list()
    {
        return ApplicationBuilder::getInstance()->list();
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

    /**
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object|null
     */
    public function getById(int $id)
    {
        return ApplicationBuilder::getInstance()->getById($id);
    }

    public function modify(Application $application, Request $request)
    {
        /** @var Validator $validator */
        $validator = $this->validator($request);

        if ($validator->fails()){
            throw new RuntimeException($validator->errors()->first());
        }

        $data = $validator->getData();

        // TODO NOt finished
    }
}
