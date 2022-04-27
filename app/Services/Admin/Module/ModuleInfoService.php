<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * @link    https://karaev.uz
 * Created: 26.04.2022 / 16:18
 */

namespace App\Services\Admin\Module;

use App\Repositories\Admin\Module\ModuleInfoRepository;

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

    public function getById(int $id)
    {
        return ModuleInfoRepository::getInstance()->getById($id);
    }
}
