<?php

namespace Domain\Rooms\Entities;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class RoomCategory
 * @package Domain\Rooms\Entities
 *
 * @property int        $id
 * @property string     $name
 *
 * @property Collection $rooms
 */
class RoomCategory extends Model
{
    use HasFactory;

    protected $table = 'room_categories';
    protected $fillable = [
        'name'
    ];

    // Relations

    /**
     * @return HasMany
     */
    public function rooms(): HasMany
    {
        return $this->hasMany(Room::class, 'category_id', 'id');
    }

    // Getters

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
