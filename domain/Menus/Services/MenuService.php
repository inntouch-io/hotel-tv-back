<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 06.07.2022 / 12:21
 */

namespace Domain\Menus\Services;

use Domain\Menus\Builders\MenuBuilder;
use Illuminate\Database\Eloquent\Builder;
use function Symfony\Component\String\b;

/**
 * Class MenuService
 * @package Domain\Menus\Services
 */
class MenuService
{
    protected MenuBuilder $builder;

    /**
     * @param MenuBuilder $builder
     */
    public function __construct(MenuBuilder $builder)
    {
        $this->builder = $builder;
    }

    /**
     * @return $this
     */
    public static function getInstance(): MenuService
    {
        return new static(MenuBuilder::getInstance());
    }

    public function list()
    {
        return $this->builder->list(function (Builder $builder) {
            return $builder->with(['image', 'infos'])->orderBy('order_position');
        });
    }
}
