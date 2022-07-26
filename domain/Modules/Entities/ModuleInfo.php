<?php

namespace Domain\Modules\Entities;

use App\Core\Entities;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ModuleInfo
 * @package App\domain\Modules\Entities
 *
 * @property int    $id
 * @property int    $module_id
 * @property string $name
 * @property string $locale
 */
class ModuleInfo extends Entities
{
    use HasFactory, SoftDeletes;

    protected $table = 'module_infos';
    protected $fillable = [
        'id',
        'module_id',
        'name',
        'locale'
    ];

    // Relations

    /**
     * @return BelongsTo
     */
    public function module(): BelongsTo
    {
        return $this->belongsTo(Module::class, 'module_id', 'id');
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
    public function getModuleId(): int
    {
        return $this->module_id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getLocale(): string
    {
        return $this->locale;
    }
}
