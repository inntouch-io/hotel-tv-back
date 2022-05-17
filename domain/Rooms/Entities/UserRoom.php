<?php

namespace Domain\Rooms\Entities;

use App\Core\Entities;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Validation\Rules\Enum;

/**
 * Class UserRoom
 * @package domain\Rooms\Entities
 *
 * @property int $user_id
 * @property int $room_id
 * @property int $arrival_time
 * @property int $departure_time
 * @property enum $room_status
 */
class UserRoom extends Entities
{
    use HasFactory;

    protected $table = 'user_room';
    protected $fillable = [
        'user_id',
        'room_id',
        'arrival_time',
        'departure_time',
        'room_status',
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
     * @return Enum
     */
    public function getRoomStatus(): Enum
    {
        return $this->room_status;
    }
}
