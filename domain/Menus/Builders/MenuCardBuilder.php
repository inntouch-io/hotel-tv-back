<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 14.07.2022 / 15:51
 */

namespace Domain\Menus\Builders;

use Closure;
use Domain\Menus\DTO\MenuCardDto;
use Domain\Menus\Entities\MenuCard;

/**
 * Class MenuCardBuilder
 * @package Domain\Menus\Builders
 */
class MenuCardBuilder
{
    /**
     * @return MenuCardBuilder
     */
    public static function getInstance(): MenuCardBuilder
    {
        return new static();
    }

    public function takeBy(Closure $closure)
    {
        return $closure(MenuCard::query())->first();
    }

    public function getItems(Closure $closure, $itemsPerPage = 18)
    {
        return $closure(MenuCard::query())->paginate($itemsPerPage);
    }

    public function store(MenuCardDto $dto)
    {
        MenuCard::query()->create(
            [
                'image_id'       => $dto->getImageId(),
                'is_visible'     => $dto->getIsVisible(),
                'order_position' => $dto->getOrderPosition(),
                'menu_id'        => $dto->getMenuId()
            ]
        );
    }

    public function update(MenuCard $card, MenuCardDto $dto)
    {
        $card->update(
            [
                'image_id'   => $dto->getImageId(),
                'is_visible' => $dto->getIsVisible()
            ]
        );
    }
}
