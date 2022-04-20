<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ModuleInfo
 * @package App\Models
 *
 * @property int    $id
 * @property int    $module_id
 * @property string $name
 * @property string $locale
 */
class ModuleInfo extends Model
{
    use HasFactory;

    protected $table = 'module_infos';
    protected $fillable = [
        'id',
        'module_id',
        'name',
        'locale'
    ];
}
