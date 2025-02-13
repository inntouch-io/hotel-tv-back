<?php

namespace Domain\Rooms\Entities;

use App\Core\Entities;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;

/**
 * Class Room
 * @package domain\Rooms\Entities
 *
 * @property int         $id
 * @property string      $room_number
 * @property string      $room_status
 * @property int         $max_volume
 * @property int|null         $category_id
 * @property string      $device_id
 * @property int         $is_active
 * @property string      $device_ip
 * @property Carbon|null $created_at
 * 
 * @property RoomCategory $category
 * 
 */
class Room extends Entities
{
    use HasFactory, SoftDeletes;

    protected $table = 'rooms';
    protected $fillable = [
        'room_number',
        'max_volume',
        'device_id',
        'is_active',
        'device_ip',
        'room_status',
        'category_id'
    ];

    const STATUSES = [
        'free'   => 'Свободно',
        'booked' => 'Забронировано'
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
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(RoomCategory::class, 'category_id', 'id');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOneThrough
     */
    public function users()
    {
        return $this->hasOneThrough(User::class, UserRoom::class, 'room_id', 'id', 'id', 'user_id')
            ->where('user_room.room_status', '=', 'booked')
            ->first();
    }

    public function userRoom()
    {
        return $this->hasOne(UserRoom::class, 'room_id', 'id')
            ->where('room_status', '=', 'booked')
            ->first();
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
    public function getRoomStatus(): string
    {
        return $this->room_status;
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
    public function getIsActive(): bool
    {
        return (bool)$this->is_active;
    }

    /**
     * @return string
     */
    public function getDeviceIp(): string
    {
        return $this->device_ip ?? '';
    }

    /**
     * @return string|null
     */
    public function getCreatedAt(): ?string
    {
        return $this->created_at;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getMaxVolume(): int
    {
        return $this->max_volume;
    }

    /**
     * @return int|null
     */
    public function getCategoryId(): ?int
    {
        return $this->category_id;
    }
}
