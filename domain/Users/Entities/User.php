<?php

namespace Domain\Users\Entities;

use App\Core\Entities;
use Domain\Rooms\Entities\Room;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * Class User
 * @package domain\Users\Entities
 *
 * @property int         $id
 * @property string      $first_name
 * @property string      $last_name
 * @property string      $telephone_number
 * @property string      $passport_number
 * @property string      $language
 * @property int|null    $arrival_time
 * @property int|null    $departure_time
 * @property int|null    $room_id
 * @property Carbon|null $created_at
 *
 * @property Room        $room
 */
class User extends Entities
{
    use HasFactory;

    protected $table = 'users';
    protected $fillable = [
        'first_name',
        'last_name',
        'telephone_number',
        'passport_number',
        'language',
        'arrival_time',
        'departure_time',
        'room_id'
    ];

    /**
     * @return User
     */
    public static function getInstance(): User
    {
        return new static();
    }

    // Relations

    /**
     * @return BelongsTo
     */
    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class, 'room_id', 'id');
    }

    /**
     * @return string
     */
    public function getFullName(): string
    {
        return $this->first_name . " " . $this->last_name;
    }

    // Getters

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

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
    public function getLastName(): string
    {
        return $this->last_name;
    }

    /**
     * @return string
     */
    public function getTelephoneNumber(): string
    {
        return $this->telephone_number;
    }

    /**
     * @return string
     */
    public function getPassportNumber(): string
    {
        return $this->passport_number;
    }

    /**
     * @return string
     */
    public function getLanguage(): string
    {
        return $this->language;
    }

    /**
     * @return int|null
     */
    public function getArrivalTime(): ?int
    {
        return $this->arrival_time;
    }

    /**
     * @return int|null
     */
    public function getDepartureTime(): ?int
    {
        return $this->departure_time;
    }
    
    /**
     * @return Carbon|null
     */
    public function getCreatedAt(): ?Carbon
    {
        return $this->created_at;
    }

    public function getRoomId(): ?int
    {
        return $this->room_id;
    }
}
