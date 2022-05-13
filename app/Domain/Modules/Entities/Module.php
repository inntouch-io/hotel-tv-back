<?php

namespace App\Domain\Modules\Entities;

use App\Domain\Images\Entities\Image;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;

/**
 * Class Module
 * @package App\Domain\Modules\Entities
 *
 * @property int         $id
 * @property string      $module_slug
 * @property string      $module_name
 * @property string      $image_id
 * @property int         $is_visible
 * @property int         $order_position
 * @property Carbon|null $created_at
 *
 * @property Collection  $infos
 * @property Image       $image
 */
class Module extends Model
{
    use HasFactory;

    protected $table = 'modules';
    protected $fillable = [
        'id',
        'module_slug',
        'module_name',
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
        return $this->hasMany(ModuleInfo::class, 'module_id', 'id');
    }

    /**
     * @return HasOne
     */
    public function image(): HasOne
    {
        return $this->hasOne(Image::class, 'id', 'image_id');
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
    public function getModuleSlug(): string
    {
        return $this->module_slug;
    }

    /**
     * @return string
     */
    public function getModuleName(): string
    {
        return $this->module_name;
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

    /**
     * @return Carbon|null
     */
    public function getCreatedAt(): ?Carbon
    {
        return $this->created_at;
    }

    /**
     * @return string
     */
    public function getImageId(): string
    {
        return $this->image_id;
    }
}
