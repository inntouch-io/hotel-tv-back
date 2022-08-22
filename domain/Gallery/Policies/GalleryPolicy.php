<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 22.08.2022 / 15:50
 */

namespace Domain\Gallery\Policies;

use Domain\Admins\Entities\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

/**
 * Class GalleryPolicy
 * @package Domain\Gallery\Policies
 */
class GalleryPolicy
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
}
