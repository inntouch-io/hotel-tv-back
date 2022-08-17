<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 16.08.2022 / 11:32
 */

namespace Domain\AppVersions\Builders;

use Closure;
use Domain\AppVersions\Dto\VersionDto;
use Domain\AppVersions\Entities\AppVersion;

/**
 * Class VersionBuilder
 * @package Domain\AppVersions\Builders
 */
class VersionBuilder
{
    /**
     * @return VersionBuilder
     */
    public static function getInstance(): VersionBuilder
    {
        return new static();
    }

    public function show()
    {
        return AppVersion::query()->first();
    }

    public function takeBy(Closure $closure)
    {
        return $closure(AppVersion::query())->first();
    }

    public function update(AppVersion $version, VersionDto $dto)
    {
        $version->update(
            [
                'app_version' => $dto->getAppVersion(),
                'apk_file'    => $dto->getApkFile()
            ]
        );
    }
}
