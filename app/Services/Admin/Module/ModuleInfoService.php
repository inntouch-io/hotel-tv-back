<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * @link    https://karaev.uz
 * Created: 26.04.2022 / 16:18
 */

namespace App\Services\Admin\Module;

use App\Models\ModuleInfo;
use App\Repositories\Admin\Module\ModuleInfoRepository;
use Illuminate\Contracts\Validation\Validator as ValidatorContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as ValidatorFacade;
use Illuminate\Validation\Validator;
use RuntimeException;

/**
 * Class ModuleInfoService
 * @package App\Services\Admin\Module
 */
class ModuleInfoService
{
    /**
     * @return ModuleInfoService
     */
    public static function getInstance(): ModuleInfoService
    {
        return new static();
    }

    /**
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object|null
     */
    public function getById(int $id)
    {
        return ModuleInfoRepository::getInstance()->getById($id);
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
                'name' => 'required'
            ]
        );
    }

    /**
     * @param ModuleInfo $moduleInfo
     * @param Request    $request
     * @return void
     */
    public function modify(ModuleInfo $moduleInfo, Request $request)
    {
        /** @var Validator $validator */
        $validator = $this->validator($request);

        if ($validator->fails()){
            throw new RuntimeException($validator->errors()->first());
        }

        $data = $validator->getData();

        ModuleInfoRepository::getInstance()->update($moduleInfo, $data['name']);
    }
}
