<?php

namespace Domain\Rooms\Entities;

use App\Core\Entities;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;

/**
 * Class Room
 * @package domain\Rooms\Entities
 *
 * @property string $room_number
 * @property string $device_id
 * @property int $is_verified
 * @property string $device_ip
 */
class Room extends Entities
{
    use HasFactory;

    protected $table = 'rooms';
    protected $fillable = [
        'room_number',
        'device_id',
        'is_verified',
        'device_ip'
    ];

    /**
     * @return Room
     */
    public static function getInstance(): Room
    {
        return new static();
    }

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
        return $this->room_number ?? '';
    }

    /**
     * @return string
     */
    public function getDeviceId(): string
    {
        return $this->device_id;
    }

    /**
     * @return bool
     */
    public function getIsVerified(): bool
    {
        return (bool) $this->is_verified;
    }

    /**
     * @return string
     */
    public function getDeviceIp(): string
    {
        return $this->device_ip ?? '';
    }
}
