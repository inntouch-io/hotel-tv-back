<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * @link    https://karaev.uz
 * Created: 23.04.2022 / 14:17
 */

namespace Domain\Modules\Builders;

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
     * @return Collection
     */
    public function getAll(): Collection
    {
        return Module::query()
            ->with('infos')
            ->orderBy('order_position')
            ->get();
    }

    /**
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object|null
     */
    public function getById(int $id)
    {
        return Module::query()->whereKey($id)->with('image')->first();
    }

    /**
     * @param string $slug
     * @return bool
     */
    public function checkBySlug(string $slug): bool
    {
        return Module::query()->where('module_slug', '=', $slug)->exists();
    }

    /**
     * @param Module    $module
     * @param ModuleDto $moduleDto
     * @return void
     */
    public function update(Module $module, ModuleDto $moduleDto)
    {
        $module->update(
            [
                'module_slug' => $moduleDto->getModuleSlug(),
                'module_name' => $moduleDto->getModuleName(),
                'image_id'    => $moduleDto->getImageId(),
                'is_visible'  => $moduleDto->getIsVisible()
            ]
        );
    }
}
