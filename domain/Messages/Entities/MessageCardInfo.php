<?php

namespace Domain\Messages\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class MessageCardInfo
 * @package Domain\Messages\Entities
 *
 * @property int    $id
 * @property string $title
 * @property string $description
 * @property string $subDescription
 * @property int    $card_id
 * @property string $locale
 *
 * @property MessageCard $card
 */
class MessageCardInfo extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'message_card_infos';
    protected $fillable = [
        'id',
        'title',
        'description',
        'subDescription',
        'card_id',
        'locale'
    ];

    // Relations

    /**
     * @return BelongsTo
     */
    public function card(): BelongsTo
    {
        return $this->belongsTo(MessageCard::class, 'card_id', 'id')
            ->with('message');
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

    /**
     * @return int
     */
    public function getCardId(): int
    {
        return $this->card_id;
    }

    /**
     * @return string
     */
    public function getLocale(): string
    {
        return $this->locale;
    }

}
