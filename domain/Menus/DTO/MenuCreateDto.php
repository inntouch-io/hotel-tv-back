<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 16.07.2022 / 01:29
 */

namespace Domain\Menus\DTO;

/**
 * Class MenuCreateDto
 * @package Domain\Menus\DTO
 */
class MenuCreateDto
{
    /** @var int $image_id */
    protected int $image_id;

    /** @var int $is_visible */
    protected int $is_visible;

    /** @var string $type */
    protected string $type;

    /** @var int $order_position */
    protected int $order_position;

    public function __construct(
        int    $image_id,
        string $type,
        int    $is_visible,
        int    $order_position

    )
    {
        $this->image_id = $image_id;
        $this->type = $type;
        $this->is_visible = $is_visible;
        $this->order_position = $order_position;
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
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return int
     */
    public function getOrderPosition(): int
    {
        return $this->order_position;
    }
}
