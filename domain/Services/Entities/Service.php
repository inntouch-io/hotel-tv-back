<?php

namespace Domain\Services\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Service
 * @package Domain\Services\Entities
 *
 * @property int $id
 * @property int $image_id
 * @property string $type
 * @property int $is_visible
 * @property int $order_position
 * @property
 */
class Service extends Model
{
    use HasFactory;

    protected $table = 'services';
    protected $fillable  = [

    ];

}
