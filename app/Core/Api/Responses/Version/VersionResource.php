<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 17.08.2022 / 16:18
 */

namespace App\Core\Api\Responses\Version;

use App\Core\Api\Resources;
use Domain\AppVersions\Entities\AppVersion;

/**
 * Class VersionResource
 * @package App\Core\Api\Responses\Version
 */
class VersionResource extends Resources
{
    private static $APP_SYSTEM = 'appSystem';
    private static $APP_TYPE = 'appType';
    private static $APP_VERSION = 'appVersion';
    private static $APK_FILE = 'apkFile';

    /**
     * @param $request
     * @return array
     */
    public function toArray($request): array
    {
        /** @var AppVersion $this */

        return [
            self::$APP_SYSTEM  => $this->getAppSystem(),
            self::$APP_TYPE    => $this->getAppType(),
            self::$APP_VERSION => $this->getAppVersion(),
            self::$APK_FILE    => $this->getApkFileUrl(),
        ];
    }
}
