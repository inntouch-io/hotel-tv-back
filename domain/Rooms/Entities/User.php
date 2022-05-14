<?php

namespace Domain\Rooms\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * @package Domain\Rooms\Entities
 *
 * @property string $full_name
 */
class User extends Model
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

    // Relations

    /**
     * @return mixed|null
     */
    public function room()
    {
        return $this->belongsToMany(Room::class, 'user_room', 'user_id', 'room_id')
            ->where('is_active', '=', 1)
            ->latest()
            ->first();
    }
}
