<?php

namespace Domain\Menus\Entities;

use Carbon\Carbon;
use Domain\Images\Entities\Image;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class MenuCard
 * @package Domain\Menus\Entities
 *
 * @property int        $id
 * @property int        $menu_id
 * @property int        $image_id
 * @property boolean    $is_visible
 * @property int        $order_position
 * @property Carbon     $created_at
 *
 * @property Image      $image
 * @property Collection $infos
 * @property Menu       $menu
 */
class MenuCard extends Model
{
    use HasFactory;

    protected $table = 'menu_cards';
    protected $fillable = [
        'id',
        'menu_id',
        'image_id',
        'is_visible',
        'order_position',
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
        return $this->hasMany(MenuCardInfo::class, 'card_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class, 'menu_id', 'id');
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
     * @return Carbon
     */
    public function getCreatedAt(): Carbon
    {
        return $this->created_at;
    }

    /**
     * @return int
     */
    public function getMenuId(): int
    {
        return $this->menu_id;
    }
}
