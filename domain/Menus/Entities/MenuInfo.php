<?php

namespace Domain\Menus\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class MenuInfo
 * @package Domain\Menus\Entities
 *
 * @property int    $id
 * @property int    $menu_id
 * @property string $title
 * @property string $locale
 */
class MenuInfo extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'menu_infos';
    protected $fillable = [
        'menu_id',
        'title',
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
    public function getMenuId(): int
    {
        return $this->menu_id;
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
