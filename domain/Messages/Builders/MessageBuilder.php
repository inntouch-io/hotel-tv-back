<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 24.06.2022 / 16:23
 */

namespace Domain\Messages\Builders;

use Closure;
use Domain\Messages\DTO\MessageCreateDto;
use Domain\Messages\DTO\MessageUpdateDto;
use Domain\Messages\Entities\Message;

/**
 * Class MessageBuilder
 * @package Domain\Messages\Builders
 */
class MessageBuilder
{
    /**
     * @return MessageBuilder
     */
    public static function getInstance(): MessageBuilder
    {
        return new static();
    }

    public function list(Closure $closure)
    {
        return $closure(Message::query())->get();
    }

    public function getItems(Closure $closure, $itemsPerPage = 18)
    {
        return $closure(Message::query())->paginate($itemsPerPage);
    }

    public function takeBy(Closure $closure)
    {
        return $closure(Message::query())->first();
    }

    public function update(Message $message, MessageUpdateDto $updateDto)
    {
        $message->update(
            [
                'image_id'   => $updateDto->getImageId(),
                'is_visible' => $updateDto->getIsVisible()
            ]
        );
    }

    public function store(MessageCreateDto $createDto)
    {
        return Message::query()->create(
            [
                'image_id'       => $createDto->getImageId(),
                'is_visible'     => $createDto->getIsVisible(),
                'order_position' => $createDto->getOrderPosition()
            ]
        );
    }
}
