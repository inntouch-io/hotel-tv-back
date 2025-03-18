<?php

/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * @link    https://karaev.uz
 * Created: 26.04.2022 / 16:20
 */

namespace Domain\Modules\Builders;

use Closure;
use Domain\Modules\DTO\ModuleInfoDto;
use Domain\Modules\Entities\ModuleInfo;

/**
 * Class ModuleInfoBuilder
 * @package App\domain\Modules\Builders
 */
class ModuleInfoBuilder
{
    /**
     * @return ModuleInfoBuilder
     */
    public static function getInstance(): ModuleInfoBuilder
    {
        return new static();
    }

    public function takeBy(Closure $closure)
    {
        return $closure(ModuleInfo::query())->first();
    }

    public function store(ModuleInfoDto $dto)
    {
        return ModuleInfo::query()->create(
            [
                'name'      => $dto->getName(),
                'locale'     => $dto->getLocale(),
                'module_id'  => $dto->getModuleId()
            ]
        );
    }

    /**
     * @param ModuleInfo $moduleInfo
     * @param string     $name
     * @return bool
     */
    public function update(ModuleInfo $moduleInfo, string $name): bool
    {
        return $moduleInfo->update(
            [
                'name' => $name
            ]
        );
    }
}
