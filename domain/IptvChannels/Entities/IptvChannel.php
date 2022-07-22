<?php

namespace Domain\IptvChannels\Entities;

use App\Core\Entities;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class IptvChannel
 * @package Domain\IptvChannels\Entities
 *
 * @property int    $id
 * @property string $slug
 * @property string $title
 * @property int    $stream_id
 * @property int    $is_visible
 * @property int    $order_position
 * @property int    $image_id
 */
class IptvChannel extends Entities
{
    use HasFactory;

    protected $table = 'iptv_channels';
    protected $fillable = [
        'slug',
        'title',
        'stream_id',
        'is_visible',
        'order_position',
        'image_id'
    ];

    // Relations

    /**
     * @return HasMany
     */
    public function infos(): HasMany
    {
        return $this->hasMany(IptvChannelInfo::class, 'channel_id', 'id');
    }

    // Getters

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
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
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return int
     */
    public function getStreamId(): int
    {
        return $this->stream_id;
    }

    /**
     * @return int
     */
    public function getIsVisible(): int
    {
        return $this->is_visible;
    }

    /**
     * @return int
     */
    public function getOrderPosition(): int
    {
        return $this->order_position;
    }

    /**
     * @return int
     */
    public function getImageId(): int
    {
        return $this->image_id;
    }
}
