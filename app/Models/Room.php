<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Room
 * @package App\Models
 *
 * @property string $room_number
 * @property string $device_id
 */
class Room extends Model
{
    use HasFactory;

    protected $table = 'rooms';
    protected $fillable = [
        'room_number',
        'device_id'
    ];
}
