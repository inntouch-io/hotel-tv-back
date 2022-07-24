<?php

namespace Domain\Messages\Policies;

use Domain\Admins\Entities\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class MessagePolicy
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

    public function sortingList(Admin $admin): bool
    {
        return in_array($admin->getRole(), ["su", "moderator"]);
    }

    public function sorting(Admin $admin): bool
    {
        return in_array($admin->getRole(), ["su", "moderator"]);
    }
}
