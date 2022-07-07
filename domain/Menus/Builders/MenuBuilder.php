<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 06.07.2022 / 12:21
 */

namespace Domain\Menus\Builders;

use Closure;
use Domain\Menus\Entities\Menu;

/**
 * Class MenuBuilder
 * @package Domain\Menus\Builders
 */
class MenuBuilder
{
    /**
     * @return MenuBuilder
     */
    public static function getInstance(): MenuBuilder
    {
        return new static();
    }

    public function list(Closure $closure)
    {
        return $closure(Menu::query())->get();
    }
}
