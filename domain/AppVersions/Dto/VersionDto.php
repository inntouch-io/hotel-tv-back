<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 17.08.2022 / 10:27
 */

namespace Domain\AppVersions\Dto;

/**
 * Class VersionDto
 * @package Domain\AppVersions\Dto
 *
 * @property string      $app_version
 * @property string|null $apk_file
 */
class VersionDto
{
    /** @var string $app_version */
    protected string $app_version;

    /** @var string|null $apk_file */
    protected ?string $apk_file;

    public function __construct(string $app_version, string $apk_file = null)
    {
        $this->app_version = $app_version;
        $this->apk_file = $apk_file;
    }

    /**
     * @return string
     */
    public function getAppVersion(): string
    {
        return $this->app_version;
    }

    /**
     * @return string|null
     */
    public function getApkFile(): ?string
    {
        return $this->apk_file;
    }
}
