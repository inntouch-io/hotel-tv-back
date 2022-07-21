<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 02.07.2022 / 14:27
 */

namespace Domain\Messages\Builders;

use Closure;
use Domain\Messages\DTO\MessageCardInfoDto;
use Domain\Messages\DTO\MessageCardInfoUpdateDto;
use Domain\Messages\Entities\MessageCardInfo;

/**
 * Class MessageCardInfoBuilder
 * @package Domain\Messages\Builders
 */
class MessageCardInfoBuilder
{
    /**
     * @return MessageCardInfoBuilder
     */
    public static function getInstance(): MessageCardInfoBuilder
    {
        return new static();
    }

    public function add(MessageCardInfoDto $cardInfoCreateDto)
    {
        return MessageCardInfo::query()->create(
            [
                'title'          => $cardInfoCreateDto->getTitle(),
                'description'    => $cardInfoCreateDto->getDescription(),
                'subDescription' => $cardInfoCreateDto->getSubDescription(),
                'locale'         => $cardInfoCreateDto->getLocale(),
                'card_id'        => $cardInfoCreateDto->getCardId()
            ]
        );
    }

    public function getById(Closure $closure)
    {
        return $closure(MessageCardInfo::query())->first();
    }

    public function update(MessageCardInfo $cardInfo, MessageCardInfoDto $cardInfoDto)
    {
        $cardInfo->update(
            [
                'title'          => $cardInfoDto->getTitle(),
                'description'    => $cardInfoDto->getDescription(),
                'subDescription' => $cardInfoDto->getSubDescription()
            ]
        );
    }
}
