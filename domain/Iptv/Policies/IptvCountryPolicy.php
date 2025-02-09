<?php

namespace Domain\Iptv\Policies;

use Domain\Admins\Entities\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class IptvCountryPolicy
{
    use HandlesAuthorization;

    public function index(Admin $admin): bool
    {
        return in_array($admin->getRole(), ['su', 'moderator']);
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
        return in_array($admin->getRole(), ['su', 'moderator']);
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
