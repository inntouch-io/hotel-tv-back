<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 24.05.2022 / 14:39
 */

namespace Domain\Applications\Policies;

use Domain\Admins\Entities\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

/**
 * Class ApplicationPolicy
 * @package Domain\Applications\Policies
 */
class ApplicationPolicy
{
    use HandlesAuthorization;

    const CATALOG = 'applications';

    public function index(Admin $admin): bool
    {
        return $admin->getRole() === "su";
    }

    public function edit(Admin $admin): bool
    {
        return $admin->getRole() === "su";
    }

    public function update(Admin $admin): bool
    {
        return $admin->getRole() === "su";
    }
}


