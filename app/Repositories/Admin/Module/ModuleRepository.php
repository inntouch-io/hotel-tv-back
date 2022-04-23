<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * @link    https://karaev.uz
 * Created: 23.04.2022 / 14:17
 */

namespace App\Repositories\Admin\Module;

use App\Http\DTO\Admin\Module\ModuleDto;
use App\Models\Module;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class ModuleRepository
 * @package App\Repositories\Admin\Module
 */
class ModuleRepository
{
    /**
     * @return ModuleRepository
     */
    public static function getInstance(): ModuleRepository
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
        return Module::query()->whereKey($id)->first();
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
                'status'      => $moduleDto->getStatus()
            ]
        );
    }
}
