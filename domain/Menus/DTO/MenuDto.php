<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 08.07.2022 / 14:31
 */

namespace Domain\Menus\DTO;

/**
 * Class MenuDto
 * @package Domain\Menus\DTO
 *
 * @property int         $image_id
 * @property int         $is_visible
 * @property string      $category
 * @property string|null $type
 * @property int|null    $order_position
 */
class MenuDto
{
    /** @var int $image_id */
    protected int $image_id;

    /** @var int $is_visible */
    protected int $is_visible;

    /** @var string $category */
    protected string $category;

    /** @var string|null $type */
    protected ?string $type;

    /** @var int|null $order_position */
    protected ?int $order_position;

    public function __construct(
        int    $image_id,
        int    $is_visible,
        string $category,
        string $type = null,
        int    $order_position = null
    )
    {
        $this->image_id = $image_id;
        $this->is_visible = $is_visible;
        $this->category = $category;
        $this->type = $type;
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
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @return int|null
     */
    public function getOrderPosition(): ?int
    {
        return $this->order_position;
    }

    /**
     * @return string
     */
    public function getCategory(): string
    {
        return $this->category;
    }
}

