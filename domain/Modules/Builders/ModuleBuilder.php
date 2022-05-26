<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * @link    https://karaev.uz
 * Created: 23.04.2022 / 14:17
 */

namespace Domain\Modules\Builders;

use Closure;
use Domain\Modules\DTO\ModuleDto;
use Domain\Modules\Entities\Module;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class ModuleBuilder
 * @package App\domain\Modules\Builders
 */
class ModuleBuilder
{
    /**
     * @return ModuleBuilder
     */
    public static function getInstance(): ModuleBuilder
    {
        return new static();
    }

    /**
     * @param Closure $closure
     * @return Collection
     */
    public function list(Closure $closure): Collection
    {
        return $closure(Module::query())->get();
    }

    /**
     * @param Closure $closure
     * @return Module|null
     */
    public function takeBy(Closure $closure): ?Module
    {
        return $closure(Module::query())->first();
    }

    /**
     * @param Closure $closure
     * @return Collection
     */
    public function getVisibleItems(Closure $closure): Collection
    {
        return $closure(Module::query())->get();
    }

    /**
     * @param Closure $closure
     * @return bool
     */
    public function checkBySlug(Closure $closure): bool
    {
        return $closure(Module::query())->exists();
    }

    /**
     * @param Module    $module
     * @param ModuleDto $moduleDto
     * @return void
     */
    public function update(Module $module, ModuleDto $moduleDto)
    {
        $module->update($moduleDto->toArray());
    }
}
