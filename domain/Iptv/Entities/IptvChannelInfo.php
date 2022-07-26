<?php

namespace Domain\Iptv\Entities;

use App\Core\Entities;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class IptvChannelInfo
 * @package Domain\Iptv\Entities
 *
 * @property int    $id
 * @property int    $channel_id
 * @property string $title
 * @property string $locale
 */
class IptvChannelInfo extends Entities
{
    use HasFactory, SoftDeletes;

    protected $table = 'iptv_channel_infos';
    protected $fillable = [
        'channel_id',
        'title',
        'locale'
    ];

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
    public function getChannelId(): int
    {
        return $this->channel_id;
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
    public function getLocale(): string
    {
        return $this->locale;
    }
}
