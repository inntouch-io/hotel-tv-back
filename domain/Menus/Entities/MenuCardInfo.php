<?php

namespace Domain\Menus\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class MenuCardInfo
 * @package Domain\Menus\Entities
 *
 * @property int    $id
 * @property string $title
 * @property string $description
 * @property string $subDescription
 * @property int    $card_id
 * @property string $locale
 *
 * @property MenuCard $card
 */
class MenuCardInfo extends Model
{
    use HasFactory;

    protected $table = 'menu_cards';
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
        return $this->belongsTo(MenuCard::class, 'card_id', 'id')
            ->with('menu');
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
