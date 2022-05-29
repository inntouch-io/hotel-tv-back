<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 29.05.2022 / 13:38
 */

namespace Domain\Admins\Builders;

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
}
