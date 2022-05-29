<?php

namespace Domain\Admins\Entities;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

/**
 * Class Admin
 * @package Domain\Admins\Entities
 *
 * @property int        $id
 * @property string     $full_name
 * @property string     $username
 * @property string     $password
 * @property string     $last_ip
 * @property int        $last_login
 * @property string     $role
 *
 * @property Collection $permissions
 */
class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

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
     * @return string
     */
    public function getRole(): string
    {
        return $this->role;
    }
}
