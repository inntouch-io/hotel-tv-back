<?php

namespace Domain\Images\Entities;

use App\Core\Entities;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Image
 * @package App\domain\Images\Entities
 *
 * @property int    $id
 * @property string $path
 * @property string $extension
 * @property string $name
 */
class Image extends Entities
{
    use HasFactory;

    protected $table = 'images';
    protected $fillable = [
        'path',
        'extension',
        'name'
    ];

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return url($this->getFullPath());
    }

    /**
     * @return string
     */
    public function getFullPath(): string
    {
        return $this->getPath() . $this->getName() . '.' . $this->getExtension();
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
    public function getName(): string
    {
        return $this->name;
    }
}
