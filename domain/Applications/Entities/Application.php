<?php

namespace Domain\Applications\Entities;

use Domain\Images\Entities\Image;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;

/**
 * Class Application
 * @package App\domain\Applications\Entities
 *
 * @property int    $id
 * @property string $name
 * @property int    $image_id
 * @property string $url
 * @property int    $is_visible
 * @property int    $order_position
 * @property Carbon $created_at
 *
 * @property Image  $image
 */
class Application extends Model
{
    use HasFactory;

    protected $table = 'applications';
    protected $fillable = [
        'name',
        'image_id',
        'url',
        'is_visible',
        'order_position'
    ];

    // Relations

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
    public function getName(): string
    {
        return $this->name;
    }


    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return bool
     */
    public function getIsVisible(): bool
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
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->created_at;
    }

    /**
     * @return int
     */
    public function getImageId(): int
    {
        return $this->image_id;
    }

    // accessors

    public function createdAt(): Attribute
    {
        return Attribute::get(function ($value){
            return date('d.m.Y H:i', strtotime($value));
        });
    }

    public function status(): Attribute
    {
        return Attribute::get(function ($value){
            return (bool) $value;
        });
    }
}
