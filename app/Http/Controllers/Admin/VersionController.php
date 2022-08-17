<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 16.08.2022 / 10:59
 */

namespace App\Http\Controllers\Admin;

use Domain\AppVersions\Entities\AppVersion;
use Domain\AppVersions\Services\VersionService;
use Illuminate\Http\Request;
use RuntimeException;

/**
 * Class VersionController
 * @package App\Http\Controllers\Admin
 */
class VersionController extends AdminController
{
    /**
     * VersionController constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function show()
    {
        $version = VersionService::getInstance()->show();

        return view(
            'version.show',
            [
                'version' => $version
            ]
        );
    }

    public function upgrade(Request $request)
    {
        /** @var AppVersion|null $version */
        $version = VersionService::getInstance()->getById((int)$request->query('id'));

        if (is_null($version)) {
            throw new RuntimeException('Version not found!');
        }

        VersionService::getInstance()->update($version, $request);

        return redirect()->route('admin.version.show')
            ->with('success', 'Successfully added');
    }
}

