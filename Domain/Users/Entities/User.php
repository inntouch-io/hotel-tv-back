<?php

namespace Domain\Users\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * @package App\Models
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
}
