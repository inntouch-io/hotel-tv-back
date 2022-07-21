<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 14.07.2022 / 15:52
 */

namespace Domain\Menus\Builders;

use Closure;
use Domain\Menus\DTO\MenuCardInfoDto;
use Domain\Menus\DTO\MenuCardInfoUpdateDto;
use Domain\Menus\Entities\MenuCardInfo;

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

    public function store(MenuCardInfoDto $dto)
    {
        MenuCardInfo::query()->create(
            [
                'card_id'        => $dto->getCardId(),
                'title'          => $dto->getTitle(),
                'description'    => $dto->getDescription(),
                'subDescription' => $dto->getSubDescription(),
                'locale'         => $dto->getLocale()
            ]
        );
    }

    public function takeBy(Closure $closure)
    {
        return $closure(MenuCardInfo::query())->first();
    }

    public function update(MenuCardInfo $info, MenuCardInfoDto $dto)
    {
        $info->update(
            [
                'title'          => $dto->getTitle(),
                'description'    => $dto->getDescription(),
                'subDescription' => $dto->getSubDescription(),
            ]
        );
    }
}
