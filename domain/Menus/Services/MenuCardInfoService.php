<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 14.07.2022 / 15:54
 */

namespace Domain\Menus\Services;

use Domain\Menus\Builders\MenuCardInfoBuilder;

/**
 * Class MenuCardInfoService
 * @package Domain\Menus\Services
 */
class MenuCardInfoService
{
    protected MenuCardInfoBuilder $builder;

    /**
     * @param MenuCardInfoBuilder $builder
     */
    public function __construct(MenuCardInfoBuilder $builder)
    {
        $this->builder = $builder;
    }


}
