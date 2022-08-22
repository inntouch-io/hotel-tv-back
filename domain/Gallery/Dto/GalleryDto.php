<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 22.08.2022 / 11:34
 */

namespace Domain\Gallery\Dto;

/**
 * Class GalleryDto
 * @package Domain\Gallery\Dto
 *
 * @property int      $image_id
 * @property bool     $is_visible
 * @property int|null $order_position
 */
class GalleryDto
{
    /** @var int $image_id */
    protected int $image_id;

    /** @var bool $is_visible */
    protected bool $is_visible;

    /** @var int|null $order_position */
    protected ?int $order_position;

    /**
     * @param int      $image_id
     * @param bool     $is_visible
     * @param int|null $order_position
     */
    public function __construct(
        int  $image_id,
        bool $is_visible,
        ?int $order_position = null
    )
    {
        $this->image_id = $image_id;
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
     * @return bool
     */
    public function getIsVisible(): bool
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
}
