<?php

/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * @link    https://karaev.uz
 * Created: 26.04.2022 / 16:18
 */

namespace Domain\Modules\Services;

use Domain\Modules\Builders\ModuleInfoBuilder;
use Domain\Modules\Dto\ModuleInfoDto;
use Domain\Modules\Entities\ModuleInfo;
use Illuminate\Contracts\Validation\Validator as ValidatorContract;
use Illuminate\Database\Eloquent\Builder;
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
    /** @var ModuleInfoBuilder $builder */

    protected ModuleInfoBuilder $builder;

    public function __construct(ModuleInfoBuilder $builder)
    {
        $this->builder = $builder;
    }

    /**
     * @return ModuleInfoService
     */
    public static function getInstance(): ModuleInfoService
    {
        return new static(ModuleInfoBuilder::getInstance());
    }

    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'name'  => 'required|string',
                'locale' => 'required|in:' . implode(',', array_keys(config('app.locales'))),
            ]
        );

        return $this->builder->store(new ModuleInfoDto(
            $data['name'],
            $data['locale'],
            (int)$request->query('moduleId')
        ));
    }

    public function getById(int $id)
    {
        return $this->builder->takeBy(function (Builder $builder) use ($id) {
            return $builder->whereKey($id);
        });
    }

    /**
     * @param Request $request
     * @return array
     */
    public function validator(Request $request): array
    {
        return $request->validate(
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
    public function update(ModuleInfo $moduleInfo, Request $request)
    {
        $this->validator($request);
        $data = $request->all();

        $this->builder->update($moduleInfo, $data['name']);
    }
}
