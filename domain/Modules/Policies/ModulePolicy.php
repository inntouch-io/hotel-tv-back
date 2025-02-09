<?php

/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 24.05.2022 / 14:39
 */

namespace Domain\Modules\Policies;

use Domain\Admins\Entities\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

/**
 * Class ModulePolicy
 * @package Domain\Modules\Policies
 */
class ModulePolicy
{
    use HandlesAuthorization;

    const CATALOG = 'modules';

    public function index(Admin $admin): bool
    {
        return $admin->getRole() === "su";
    }

    public function create(Admin $admin): bool
    {
        return $admin->getRole() === "su";
    }

    public function store(Admin $admin): bool
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

    public function delete(Admin $admin): bool
    {
        return $admin->getRole() === "su";
    }

    public function sortingList(Admin $admin): bool
    {
        return $admin->getRole() === "su";
    }

    public function sorting(Admin $admin): bool
    {
        return $admin->getRole() === "su";
    }
}
