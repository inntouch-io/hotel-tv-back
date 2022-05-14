<?php

namespace Domain\Rooms\Entities;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Room
 * @package Domain\Rooms\Entities
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

    /**
     * @return Collection
     */
    public function users(): Collection
    {
        return $this->belongsToMany(User::class, 'user_room', 'room_id', 'user_id')
            ->where('room_status', '=', 1)
            ->get();

        // TODO need implement departure_time check with where condition
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
