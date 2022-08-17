<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 16.08.2022 / 11:12
 */

namespace Domain\AppVersions\Services;

use Domain\AppVersions\Builders\VersionBuilder;
use Domain\AppVersions\Dto\VersionDto;
use Domain\AppVersions\Entities\AppVersion;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

/**
 * Class VersionService
 * @package Domain\AppVersions\Services
 */
class VersionService
{
    protected VersionBuilder $builder;

    /**
     * @param VersionBuilder $builder
     */
    public function __construct(VersionBuilder $builder)
    {
        $this->builder = $builder;
    }

    /**
     * @return VersionService
     */
    public static function getInstance(): VersionService
    {
        return new static(VersionBuilder::getInstance());
    }

    public function show()
    {
        return $this->builder->show();
    }

    public function getById(int $id)
    {
        return $this->builder->takeBy(function (Builder $builder) use ($id) {
            return $builder->whereKey($id);
        });
    }

    public function update(AppVersion $version, Request $request)
    {
        $data = $request->validate(
            [
                'app_version' => 'required|string',
                'apk_file'    => 'nullable'
            ]
        );

        $apkName = null;
        $extension = null;
        if (isset($data['apk_file'])) {
            $extension = $request->file('apk_file')->getClientOriginalExtension();
            $apkName = md5(time());

            $request->file('apk_file')->storeAs("public/versions", $apkName . '.' . $extension);
        }

        $this->builder->update($version, new VersionDto(
            $data['app_version'],
            !is_null($apkName) ? "/storage/versions/{$apkName}.{$extension}" : $version->getApkFile()
        ));
    }
}
