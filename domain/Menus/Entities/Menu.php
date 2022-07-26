<?php

namespace Domain\Menus\Entities;

use Carbon\Carbon;
use Domain\Images\Entities\Image;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Menu
 * @package Domain\Menus\Entities
 *
 * @property int        $id
 * @property int        $image_id
 * @property string     $type
 * @property int        $is_visible
 * @property int        $order_position
 * @property Carbon     $created_at
 *
 * @property-read string $title
 *
 * @property Image      $image
 * @property Collection $infos
 * @property Collection $cards
 */
class Menu extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'menus';
    protected $fillable = [
        'image_id',
        'type',
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

    /**
     * @return HasMany
     */
    public function infos(): HasMany
    {
        return $this->hasMany(MenuInfo::class, 'menu_id', 'id');
    }

    /**
     * @return HasMany
     */
    public function cards(): HasMany
    {
        return $this->hasMany(MenuCard::class, 'menu_id', 'id')->with('infos')
            ->orderBy('order_position');
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
     * @return int
     */
    public function getImageId(): int
    {
        return $this->image_id;
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
     * @return Carbon
     */
    public function getCreatedAt(): Carbon
    {
        return $this->created_at;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }
}
