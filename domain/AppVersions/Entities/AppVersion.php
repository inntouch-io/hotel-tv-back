<?php

namespace Domain\AppVersions\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AppVersion
 * @package Domain\AppVersions\Entities
 *
 * @property int    $id
 * @property string $app_system
 * @property string $app_type
 * @property string $app_version
 * @property string $apk_file
 */
class AppVersion extends Model
{
    use HasFactory;

    protected $table = "app_versions";
    protected $fillable = [
        'app_system',
        'app_type',
        'app_version',
        'apk_file'
    ];

    // Getters

    /**
     * @return string
     */
    public function getAppSystem(): string
    {
        return $this->app_system;
    }

    /**
     * @return string
     */
    public function getAppType(): string
    {
        return $this->app_type;
    }

    /**
     * @return string
     */
    public function getAppVersion(): string
    {
        return $this->app_version;
    }

    /**
     * @return string
     */
    public function getApkFile(): string
    {
        return $this->apk_file;
    }

    public function getApkFileUrl()
    {
        return url($this->getApkFile());
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
}
