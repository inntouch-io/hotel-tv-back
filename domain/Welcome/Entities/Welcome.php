<?php

namespace Domain\Welcome\Entities;

use App\Core\Entities;
use Domain\Rooms\Entities\Room;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * Class Welcome
 * @package domain\Welcome\Entities
 *
 * @property int         $id
 * @property string      $language
 * @property string      $title
 * @property string      $text
 * @property string|null $slogan
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
class Welcome extends Entities
{
    use HasFactory;

    protected $table = 'welcome';
    protected $fillable = [
        'language',
        'title',
        'text',
        'slogan'
    ];

    /**
     * @return Welcome
     */
    public static function getInstance(): Welcome
    {
        return new static();
    }

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
    public function getLanguage(): string
    {
        return $this->language;
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
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @return string|null
     */
    public function getSlogan(): ?string
    {
        return $this->slogan;
    }
}
