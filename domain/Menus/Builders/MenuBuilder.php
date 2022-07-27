<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 06.07.2022 / 12:21
 */

namespace Domain\Menus\Builders;

use Closure;
use Domain\Menus\DTO\MenuCreateDto;
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

    public function getItems(Closure $closure, $itemsPerPage = 18)
    {
        return $closure(Menu::query())->paginate($itemsPerPage);
    }

    public function store(MenuDto $dto)
    {
        return Menu::query()->create(
            [
                'image_id'       => $dto->getImageId(),
                'is_visible'     => $dto->getIsVisible(),
                'category'       => $dto->getCategory(),
                'order_position' => $dto->getOrderPosition(),
                'type'           => $dto->getType()
            ]
        );
    }

    public function update(Menu $menu, MenuDto $dto)
    {
        $menu->update(
            [
                'image_id'   => $dto->getImageId(),
                'is_visible' => $dto->getIsVisible(),
                'category'   => $dto->getCategory()
            ]
        );
    }

    public function takeBy(Closure $closure)
    {
        return $closure(Menu::query())->first();
    }
}
