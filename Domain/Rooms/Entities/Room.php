<?php

namespace Domain\Rooms\Entities;

use Domain\Users\Entities\User;
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

    // Relations

    public function user()
    {
        return $this->belongsToMany(User::class, 'user_room', 'room_id', 'user_id')
            ->where('is_active', '=', 1)
            ->first();
    }

    // Getters

    /**
     * @return string
     */
    public function getRoomNumber(): string
    {
        return $this->room_number;
    }

    /**
     * @return string
     */
    public function getDeviceId(): string
    {
        return $this->device_id;
    }
}
