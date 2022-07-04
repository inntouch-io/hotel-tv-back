<?php

namespace Domain\Messages\Entities;

use Carbon\Carbon;
use Domain\Images\Entities\Image;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class Message
 * @package Domain\Messages\Entities
 *
 * @property int        $id
 * @property int        $image_id
 * @property int        $is_visible
 * @property int        $order_position
 * @property Carbon     $created_at
 *
 * @property Collection $infos
 * @property Image      $image
 * @property Collection $cards
 */
class Message extends Model
{
    use HasFactory;

    protected $table = 'messages';
    protected $fillable = [
        'id',
        'image_id',
        'is_visible',
        'order_position'
    ];

    // Relations

    /**
     * @return HasMany
     */
    public function infos(): HasMany
    {
        return $this->hasMany(MessageInfo::class, 'message_id', 'id');
    }

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
    public function cards(): HasMany
    {
        return $this->hasMany(MessageCard::class, 'message_id', 'id')
            ->with(
                [
                    'infos',
                    'image'
                ]
            );
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
     * @return Carbon
     */
    public function getCreatedAt(): Carbon
    {
        return $this->created_at;
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

}
