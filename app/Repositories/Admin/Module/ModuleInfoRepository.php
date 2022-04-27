<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * @link    https://karaev.uz
 * Created: 26.04.2022 / 16:20
 */

namespace App\Repositories\Admin\Module;

use App\Models\ModuleInfo;

/**
 * Class ModuleInfoRepository
 * @package App\Repositories\Admin\Module
 */
class ModuleInfoRepository
{
    /**
     * @return ModuleInfoRepository
     */
    public static function getInstance(): ModuleInfoRepository
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
