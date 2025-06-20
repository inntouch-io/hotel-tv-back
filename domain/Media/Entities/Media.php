<?php

namespace Domain\Media\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Media
 * @package Domain\Media\Entities
 *
 * @property int    $id
 * @property string $path
 * @property string $name
 * @property string $extension
 * @property string $category
 */
class Media extends Model
{
    use HasFactory;

    protected $table = 'media';
    protected $fillable = [
        'path',
        'name',
        'extension',
        'category'
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
    public function getName(): string
    {
        return $this->name;
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
    public function getCategory(): string
    {
        return $this->category;
    }
}
