<?php

/**
 * Hotel-alphazet.
 *
 * @author  Mirfayz Nosirov
 * Created: 29.08.2023 / 14:38
 */

namespace Domain\Users\Policies;

use Domain\Admins\Entities\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function index(Admin $admin): bool
    {
        return in_array($admin->getRole(), ["su", "moderator"]);
    }

    public function create(Admin $admin): bool
    {
        return in_array($admin->getRole(), ["su", "moderator"]);
    }

    public function store(Admin $admin): bool
    {
        return in_array($admin->getRole(), ["su", "moderator"]);
    }

    public function edit(Admin $admin): bool
    {
        return in_array($admin->getRole(), ["su", "moderator"]);
    }

    public function update(Admin $admin): bool
    {
        return in_array($admin->getRole(), ["su", "moderator"]);
    }

    public function delete(Admin $admin): bool
    {
        return in_array($admin->getRole(), ["su", "moderator"]);
    }
}
