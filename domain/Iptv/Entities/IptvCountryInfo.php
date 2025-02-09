<?php

namespace Domain\Iptv\Entities;

use App\Core\Entities;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class IptvCountryInfo
 * @package Domain\Iptv\Entities
 *
 * @property int    $id
 * @property int    $country_id
 * @property string $title
 * @property string $locale
 */
class IptvCountryInfo extends Entities
{
    use HasFactory, SoftDeletes;

    protected $table = 'iptv_country_infos';
    protected $fillable = [
        'country_id',
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
    public function getCountryId(): int
    {
        return $this->country_id;
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
