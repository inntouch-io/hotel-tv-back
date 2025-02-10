<?php

/**
 * Hotel-TV.
 *
 * @author  Farrux Orziyev
 * Created: 01.02.2025
 */

namespace Domain\Iptv\Dto;

/**
 * Class CountryDto
 * @package Domain\Iptv\Dto
 *
 * @property string   $title
 * @property int      $image_id
 * @property int      $is_visible
 * @property int|null $order_position
 */
class CountryDto
{
    /** @var string $title */
    protected string $title;

    /** @var int $image_id */
    protected int $image_id;

    /** @var int $is_visible */
    protected int $is_visible;

    /** @var int|null $order_position */
    protected ?int $order_position;

    public function __construct(
        string $title,
        int    $image_id,
        int    $is_visible,
        ?int   $order_position = null
    ) {
        $this->title = $title;
        $this->image_id = $image_id;
        $this->is_visible = $is_visible;
        $this->order_position = $order_position;
    }

    // Getters

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

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
}
