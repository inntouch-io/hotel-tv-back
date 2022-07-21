<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 14.07.2022 / 17:56
 */

namespace Domain\Menus\DTO;

/**
 * Class MenuCardDto
 * @package Domain\Menus\DTO
 *
 * @property int      $image_id
 * @property int      $is_visible
 * @property int|null $order_position
 * @property int|null $menu_id
 */
class MenuCardDto
{
    /** @var int $image_id */
    protected int $image_id;

    /** @var int $is_visible */
    protected int $is_visible;

    /** @var int|null $order_position */
    protected ?int $order_position;

    /** @var int|null $menu_id */
    protected ?int $menu_id;

    public function __construct(
        int $image_id,
        int $is_visible,
        int $order_position = null,
        int $menu_id = null
    )
    {
        $this->image_id = $image_id;
        $this->is_visible = $is_visible;
        $this->order_position = $order_position;
        $this->menu_id = $menu_id;
    }

    // Getters

    /**
     * @return int
     */
    public function getImageId(): int
    {
        return $this->image_id;
    }

    /**
     * @return int
     */
    public function getIsVisible(): int
    {
        return $this->is_visible;
    }

    /**
     * @return int|null
     */
    public function getOrderPosition(): ?int
    {
        return $this->order_position;
    }

    /**
     * @return int|null
     */
    public function getMenuId(): ?int
    {
        return $this->menu_id;
    }
}
