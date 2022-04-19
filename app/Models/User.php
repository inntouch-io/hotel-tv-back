<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * @package App\Models
 *
 * @property string $full_name
 * @property int    $arrival_time
 * @property int    $departure_time
 * @property int    $room_id
 */
class User extends Model
{
    use HasFactory;

    protected $table = 'users';
    protected $fillable = [
        'full_name',
        'arrival_time',
        'departure_time',
        'room_id'
    ];
}
