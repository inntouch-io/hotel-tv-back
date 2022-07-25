<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 25.07.2022 / 15:55
 */

namespace Domain\Iptv\Dto;

/**
 * Class ChannelDto
 * @package Domain\Iptv\Dto
 *
 * @property string   $title
 * @property string   $slug
 * @property string   $stream_url
 * @property int      $image_id
 * @property int      $is_visible
 * @property int|null $order_position
 */
class ChannelDto
{
    /** @var string $title */
    protected string $title;

    /** @var string $slug */
    protected string $slug;

    /** @var string $stream_url */
    protected string $stream_url;

    /** @var int $image_id */
    protected int $image_id;

    /** @var int $is_visible */
    protected int $is_visible;

    /** @var int|null $order_position */
    protected ?int $order_position;

    public function __construct(
        string $title,
        string $slug,
        string $stream_url,
        int    $image_id,
        int    $is_visible,
        ?int   $order_position = null
    )
    {
        $this->title = $title;
        $this->slug = $slug;
        $this->stream_url = $stream_url;
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
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @return string
     */
    public function getStreamUrl(): string
    {
        return $this->stream_url;
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
