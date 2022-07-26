<?php

namespace Domain\Messages\Entities;

use Carbon\Carbon;
use Domain\Images\Entities\Image;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class MessageCard
 * @package Domain\Messages\Entities
 *
 * @property int        $id
 * @property int        $message_id
 * @property int        $image_id
 * @property boolean    $is_visible
 * @property int        $order_position
 * @property Carbon     $created_at
 *
 * @property-read  string $title
 * @property-read  string $description
 * @property-read  string $subDescription
 *
 * @property Image      $image
 * @property Message    $message
 * @property Collection $infos
 */
class MessageCard extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'message_cards';
    protected $fillable = [
        'id',
        'message_id',
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
        return $this->hasMany(MessageCardInfo::class, 'card_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function message(): BelongsTo
    {
        return $this->belongsTo(Message::class, 'message_id', 'id');
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
    public function getMessageId(): int
    {
        return $this->message_id;
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
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getSubDescription(): string
    {
        return $this->subDescription;
    }
}
