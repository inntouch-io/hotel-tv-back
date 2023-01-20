<?php

namespace Domain\Rooms\Entities;

use App\Core\Entities;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class User
 * @package domain\Rooms\Entities
 *
 * @property string $first_name
 * @property string $name
 * @property int    $guest_number
 * @property string $guest_language
 * @property int    $id
 */
class User extends Entities
{
    use HasFactory;

    protected $table = 'users';
    protected $fillable = [
        'first_name',
        'name',
        'guest_number',
        'guest_language',
    ];

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->first_name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getGuestNumber(): int
    {
        return $this->guest_number;
    }

    /**
     * @return string
     */
    public function getGuestLanguage(): string
    {
        return $this->guest_language;
    }

    /**
     * @return int
     */
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
