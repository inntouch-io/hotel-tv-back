<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * @link    https://karaev.uz
 * Created: 26.04.2022 / 16:20
 */

namespace Domain\Modules\Builders;

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

    /**
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object|null
     */
    public function getById(int $id)
    {
        return ModuleInfo::query()->whereKey($id)->first();
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
