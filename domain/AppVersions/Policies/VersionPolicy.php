<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 22.08.2022 / 15:54
 */

namespace Domain\AppVersions\Policies;

use Domain\Admins\Entities\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

/**
 * Class VersionPolicy
 * @package Domain\AppVersions\Policies
 */
class VersionPolicy
{
    use HandlesAuthorization;

    public function show(Admin $admin): bool
    {
        return $admin->getRole() === "su";
    }

    public function upgrade(Admin $admin): bool
    {
        return $admin->getRole() === "su";
    }
}
