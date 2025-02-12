<?php

namespace Domain\Rooms\Entities;

use App\Core\Entities;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class RoomHistory
 * @package domain\Rooms\RoomHistory
 *
 * @property int    $user_id
 * @property int    $room_id
 * @property string $status
 * @property int    $time
 */
class RoomHistory extends Entities
{
    use HasFactory;

    protected $table = 'room_histories';
    protected $fillable = [
        'user_id',
        'room_id',
        'status',
        'time',
    ];

    // Getters

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
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @return int
     */
    public function getTime(): int
    {
        return $this->time;
    }
}
