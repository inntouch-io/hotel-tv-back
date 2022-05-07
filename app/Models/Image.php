<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Image
 * @package App\Models
 *
 * @property int    $id
 * @property string $path
 * @property string $extension
 * @property string $hash
 */
class Image extends Model
{
    use HasFactory;

    protected $table = 'images';
    protected $fillable = [
        'path',
        'extension',
        'hash'
    ];

    /**
     * @return string
     */
    public function getFullPath(): string
    {
        return $this->getPath() . '.' . $this->getExtension();
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
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @return string
     */
    public function getExtension(): string
    {
        return $this->extension;
    }

    /**
     * @return string
     */
    public function getHash(): string
    {
        return $this->hash;
    }
}
