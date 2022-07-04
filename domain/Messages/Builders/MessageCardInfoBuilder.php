<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 02.07.2022 / 14:27
 */

namespace Domain\Messages\Builders;

use Closure;
use Domain\Messages\DTO\MessageCardInfoCreateDto;
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

    public function add(MessageCardInfoCreateDto $cardInfoCreateDto)
    {
        return MessageCardInfo::query()->create(
            [
                'title'          => $cardInfoCreateDto->getTitle(),
                'description'    => $cardInfoCreateDto->getDescription(),
                'subDescription' => $cardInfoCreateDto->getSubDescription(),
                'lang'           => $cardInfoCreateDto->getLang(),
                'card_id'        => $cardInfoCreateDto->getCardId()
            ]
        );
    }

    public function getById(Closure $closure)
    {
        return $closure(MessageCardInfo::query())->first();
    }

    public function update(MessageCardInfo $cardInfo, MessageCardInfoUpdateDto $cardInfoUpdateDto)
    {
        $cardInfo->update(
            [
                'title'          => $cardInfoUpdateDto->getTitle(),
                'description'    => $cardInfoUpdateDto->getDescription(),
                'subDescription' => $cardInfoUpdateDto->getSubDescription()
            ]
        );
    }
}
