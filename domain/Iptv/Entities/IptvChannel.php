<?php

namespace Domain\Iptv\Entities;

use Carbon\Carbon;
use Domain\Images\Entities\Image;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class IptvChannel
 * @package Domain\Iptv\Entities
 *
 * @property int        $id
 * @property string     $slug
 * @property string     $title
 * @property string     $stream_url
 * @property int        $is_visible
 * @property int        $order_position
 * @property int        $image_id
 * @property Carbon     $created_at
 *
 * @property Collection $infos
 * @property Image      $image
 */
class IptvChannel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'iptv_channels';
    protected $fillable = [
        'slug',
        'title',
        'stream_url',
        'is_visible',
        'order_position',
        'image_id',
        'created_at'
    ];

    // Relations

    /**
     * @return HasMany
     */
    public function infos(): HasMany
    {
        return $this->hasMany(IptvChannelInfo::class, 'channel_id', 'id');
    }

    /**
     * @return HasOne
     */
    public function image(): HasOne
    {
        return $this->hasOne(Image::class, 'id', 'image_id');
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
     * @return string
     */
    public function getStreamUrl(): string
    {
        return $this->stream_url;
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

    /**
     * @return Carbon
     */
    public function getCreatedAt(): Carbon
    {
        return $this->created_at;
    }
}
