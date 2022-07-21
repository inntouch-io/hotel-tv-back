<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 28.06.2022 / 15:47
 */

namespace Domain\Messages\Builders;

use Closure;
use Domain\Messages\DTO\MessageCardDto;
use Domain\Messages\DTO\MessageCardUpdateDto;
use Domain\Messages\Entities\MessageCard;

/**
 * Class MessageCardBuilder
 * @package Domain\Messages\Builders
 */
class MessageCardBuilder
{
    /**
     * @return MessageCardBuilder
     */
    public static function getInstance(): MessageCardBuilder
    {
        return new static();
    }

    public function store(MessageCardDto $messageCardDto)
    {
        MessageCard::query()->create(
            [
                'image_id'       => $messageCardDto->getImageId(),
                'is_visible'     => $messageCardDto->getIsVisible(),
                'order_position' => $messageCardDto->getOrderPosition(),
                'message_id'     => $messageCardDto->getMessageId()
            ]
        );
    }

    public function getItems(Closure $closure, $itemsPerPage = 18)
    {
        return $closure(MessageCard::query())->paginate($itemsPerPage);
    }

    public function getById(Closure $closure)
    {
        return $closure(MessageCard::query())->first();
    }

    public function getWithInfos(Closure $closure)
    {
        return $closure(MessageCard::query())->first();
    }

    public function update(MessageCard $card, MessageCardDto $dto)
    {
        $card->update(
            [
                'image_id'   => $dto->getImageId(),
                'is_visible' => $dto->getIsVisible()
            ]
        );
    }
}
