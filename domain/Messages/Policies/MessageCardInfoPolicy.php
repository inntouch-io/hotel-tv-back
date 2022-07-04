<?php

namespace Domain\Messages\Policies;

use Domain\Admins\Entities\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class MessageCardInfoPolicy
{
    use HandlesAuthorization;

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
