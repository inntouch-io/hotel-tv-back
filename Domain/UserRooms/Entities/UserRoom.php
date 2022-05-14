<?php

namespace Domain\UserRooms\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserRoom
 * @package App\Models
 *
 * @property int $user_id
 * @property int $room_id
 * @property int $arrival_time
 * @property int $departure_time
 * @property int $is_active
 */
class UserRoom extends Model
{
    use HasFactory;

    protected $table = 'user_room';
    protected $fillable = [
        'user_id',
        'room_id',
        'arrival_time',
        'departure_time',
        'is_active',
    ];

    // Relations


    //Getters

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }

    /**
     * @return int
     */
    public function getRoomId(): int
    {
        return $this->room_id;
    }

    /**
     * @return int
     */
    public function getArrivalTime(): int
    {
        return $this->arrival_time;
    }

    /**
     * @return int
     */
    public function getDepartureTime(): int
    {
        return $this->departure_time;
    }

    /**
     * @return int
     */
    public function getIsActive(): int
    {
        return $this->is_active;
    }
}
