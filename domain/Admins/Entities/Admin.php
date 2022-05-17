<?php

namespace Domain\Admins\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rules\Enum;

/**
 * Class Admin
 * @package Domain\Admins\Entities
 *
 * @property int    $id
 * @property string $full_name
 * @property string $username
 * @property string $password
 * @property string $last_ip
 * @property int    $last_login
 * @property enum   $role
 */
class Admin extends Model
{
    use HasFactory;

    protected $table = 'admins';
    protected $fillable = [
        'full_name',
        'username',
        'password',
        'last_ip',
        'last_login',
        'role'
    ];

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
    public function getFullName(): string
    {
        return $this->full_name;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getLastIp(): string
    {
        return $this->last_ip;
    }

    /**
     * @return int
     */
    public function getLastLogin(): int
    {
        return $this->last_login;
    }

    /**
     * @return Enum
     */
    public function getRole(): Enum
    {
        return $this->role;
    }
}
