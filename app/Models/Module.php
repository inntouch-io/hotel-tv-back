<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Module
 * @package App\Models
 *
 * @property int    $id
 * @property string $module_slug
 * @property string $module_name
 * @property string $module_icon
 * @property int    $status
 * @property int    $order_position
 */
class Module extends Model
{
    use HasFactory;

    protected $table = 'modules';
    protected $fillable = [
        'id',
        'module_slug',
        'module_name',
        'module_icon',
        'status',
        'order_position'
    ];
}
