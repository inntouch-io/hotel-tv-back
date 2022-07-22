<?php

namespace Domain\Rooms\Entities;

use App\Core\Entities;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class User
 * @package domain\Rooms\Entities
 *
 * @property string $full_name
 * @property int $id
 */
class User extends Entities
{
    use HasFactory;

    protected $table = 'users';
    protected $fillable = [
        'full_name',
    ];

    /**
     * @return string
     */
    public function getFullName(): string
    {
        return $this->full_name;
    }

    public function getId(): int
    {
        return $this->id;
    }

    // Relations

    /**
     * @return mixed|null
     */
    public function room()
    {
        return $this->belongsToMany(Room::class, 'user_room', 'user_id', 'room_id')
            ->where('room_status', '=', 'booked')
            ->latest()
            ->first();
    }
}
