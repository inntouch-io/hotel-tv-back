<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 06.07.2022 / 12:21
 */

namespace Domain\Menus\Builders;

use Closure;
use Domain\Menus\DTO\MenuDto;
use Domain\Menus\Entities\Menu;

/**
 * Class MenuBuilder
 * @package Domain\Menus\Builders
 */
class MenuBuilder
{
    /**
     * @return MenuBuilder
     */
    public static function getInstance(): MenuBuilder
    {
        return new static();
    }

    public function list(Closure $closure)
    {
        return $closure(Menu::query())->get();
    }

    public function store(MenuDto $createDto)
    {
        return Menu::query()->create(
            [
                'image_id'       => $createDto->getImageId(),
                'is_visible'     => $createDto->getIsVisible(),
                'order_position' => $createDto->getOrderPosition(),
                'type'           => $createDto->getType()
            ]
        );
    }

    public function update(Menu $menu, MenuDto $createDto)
    {
        $menu->image_id = $createDto->getImageId();
        $menu->is_visible = $createDto->getIsVisible();
        $menu->type = $createDto->getType();

        if (!is_null($createDto->getOrderPosition())){
            $menu->order_position = $createDto->getOrderPosition();
        }

        $menu->save();
    }

    public function getById(Closure $closure)
    {
        return $closure(Menu::query())->first();
    }
}
