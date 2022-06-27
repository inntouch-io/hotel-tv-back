<?php

namespace Domain\Messages\Policies;

use Domain\Admins\Entities\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class MessageInfoPolicy
{
    use HandlesAuthorization;

    public function edit(Admin $admin): bool
    {
        return in_array($admin->getRole(), ["su", "moderator"]);
    }

    public function update(Admin $admin): bool
    {
        return in_array($admin->getRole(), ["su", "moderator"]);
    }
}
