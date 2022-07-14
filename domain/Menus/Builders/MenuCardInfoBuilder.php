<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 14.07.2022 / 15:52
 */

namespace Domain\Menus\Builders;

/**
 * Class MenuCardInfoBuilder
 * @package Domain\Menus\Builders
 */
class MenuCardInfoBuilder
{
    /**
     * @return MenuCardInfoBuilder
     */
    public static function getInstance(): MenuCardInfoBuilder
    {
        return new static();
    }
}
