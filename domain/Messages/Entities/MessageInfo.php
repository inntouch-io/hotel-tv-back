<?php

namespace Domain\Messages\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class MessageInfo
 * @package Domain\Messages\Entities
 *
 * @property int    $id
 * @property int    $message_id
 * @property string $title
 * @property string $description
 * @property string $longDescription
 * @property string $locale
 */
class MessageInfo extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'message_infos';
    protected $fillable = [
        'id',
        'message_id',
        'title',
        'description',
        'longDescription',
        'locale'
    ];

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
    public function getLongDescription(): string
    {
        return $this->longDescription;
    }

    /**
     * @return string
     */
    public function getLocale(): string
    {
        return $this->locale;
    }

}
