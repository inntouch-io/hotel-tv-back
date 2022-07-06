<?php

namespace Domain\Menus\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Menu
 * @package Domain\Menus\Entities
 *
 * @property int    $id
 * @property int    $image_id
 * @property string $type
 * @property int    $is_visible
 * @property int    $order_position
 */
class Menu extends Model
{
    use HasFactory;

    protected $table = 'menus';
    protected $fillable = [
        'image_id',
        'type',
        'is_visible',
        'order_position'
    ];

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
    public function getImageId(): int
    {
        return $this->image_id;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return int
     */
    public function getIsVisible(): int
    {
        return $this->is_visible;
    }

    /**
     * @return int
     */
    public function getOrderPosition(): int
    {
        return $this->order_position;
    }
}
