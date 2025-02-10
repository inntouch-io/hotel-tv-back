<?php

namespace Domain\Iptv\Entities;

use Carbon\Carbon;
use Domain\Images\Entities\Image;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class IptvCountry
 * @package Domain\Iptv\Entities
 *
 * @property int        $id
 * @property string     $title
 * @property int        $is_visible
 * @property int        $order_position
 * @property int        $image_id
 * @property Carbon     $created_at
 *
 * @property Image      $image
 *
 * @property-read string $name
 */
class IptvCountry extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'iptv_countries';
    protected $fillable = [
        'title',
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
        return $this->hasMany(IptvCountryInfo::class, 'country_id', 'id');
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
    public function getTitle(): string
    {
        return $this->title;
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

    public function getName(): ?string
    {
        return $this->name;
    }
}
