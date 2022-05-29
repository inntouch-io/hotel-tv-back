<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 29.05.2022 / 13:38
 */

namespace Domain\Admins\Builders;

use Illuminate\Support\Facades\Hash;

/**
 * Class AdminBuilder
 * @package Domain\Admins\Builders
 */
class AdminBuilder
{
    /**
     * @return AdminBuilder
     */
    public static function getInstance(): AdminBuilder
    {
        return new static();
    }

    /**
     * @param string $fullName
     * @return void
     */
    public function update(string $fullName)
    {
        admin()->update(
            [
                'full_name' => $fullName
            ]
        );
    }

    /**
     * @param string $currentPassword
     * @return bool
     */
    public function checkCurrentPassword(string $currentPassword): bool
    {
        return Hash::check($currentPassword, admin()->getPassword());
    }

    /**
     * @param string $newPassword
     * @return void
     */
    public function updatePassword(string $newPassword)
    {
        admin()->update(
            [
                'password' => Hash::make($newPassword)
            ]
        );
    }
}
