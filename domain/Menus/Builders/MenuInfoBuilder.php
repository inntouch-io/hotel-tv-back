<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 12.07.2022 / 14:44
 */

namespace Domain\Menus\Builders;

use Closure;
use Domain\Menus\DTO\MenuInfoDto;
use Domain\Menus\Entities\MenuInfo;

/**
 * Class MenuInfoBuilder
 * @package Domain\Menus\Builders
 */
class MenuInfoBuilder
{
    /**
     * @return MenuInfoBuilder
     */
    public static function getInstance(): MenuInfoBuilder
    {
        return new static();
    }

    public function getById(Closure $closure)
    {
        return $closure(MenuInfo::query())->first();
    }

    public function store(MenuInfoDto $dto)
    {
        MenuInfo::query()->create(
            [
                'menu_id' => $dto->getMenuId(),
                'title'   => $dto->getTitle(),
                'locale'  => $dto->getLocale()
            ]
        );
    }

    public function update(MenuInfo $info, MenuInfoDto $dto)
    {
        $info->update(
            [
                'title' => $dto->getTitle()
            ]
        );
    }
}
