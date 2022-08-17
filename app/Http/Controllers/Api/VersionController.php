<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 17.08.2022 / 16:04
 */

namespace App\Http\Controllers\Api;

use App\Core\Api\Responses\Version\VersionResource;
use Domain\AppVersions\Entities\AppVersion;
use Domain\AppVersions\Services\VersionService;
use Illuminate\Http\Request;

/**
 * Class VersionController
 * @package App\Http\Controllers\Api
 */
class VersionController extends ApiController
{
    /**
     *  VersionController constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function check(Request $request)
    {
        /** @var AppVersion $version */
        $version = VersionService::getInstance()->show();

        if ((int)$request->query('version') >= (int)$version->getAppVersion()) {
            $this->setMessage('Текущая версия является последней версией');
        } else {
            $this->setCode(203);
            $this->setMessage('Срок действия версии истек');

            $versionCollection = new VersionResource($version);

            $this->setData($versionCollection);
        }

        return $this->composeData();
    }
}
