<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 04.07.2022 / 12:21
 */

namespace Domain\Messages\DTO;

/**
 * Class MessageCreateDto
 * @package Domain\Messages\DTO
 *
 * @property int      $image_id
 * @property int      $is_visible
 * @property string   $category
 * @property int|null $order_position
 */
class MessageDto
{
    /** @var int $image_id */
    protected int $image_id;

    /** @var int $is_visible */
    protected int $is_visible;

    /** @var string $category */
    protected string $category;

    /** @var int|null $order_position */
    protected ?int $order_position;

    public function __construct(
        int    $image_id,
        int    $is_visible,
        string $category,
        int    $order_position = null
    )
    {
        $this->image_id = $image_id;
        $this->is_visible = $is_visible;
        $this->category = $category;
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
