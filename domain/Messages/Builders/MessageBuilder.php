<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 24.06.2022 / 16:23
 */

namespace Domain\Messages\Builders;

use Closure;
use Domain\Messages\DTO\MessageDto;
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

    public function update(Message $message, MessageDto $dto)
    {
        $message->update(
            [
                'image_id'   => $dto->getImageId(),
                'is_visible' => $dto->getIsVisible(),
                'category'   => $dto->getCategory()
            ]
        );
    }

    public function store(MessageDto $dto)
    {
        return Message::query()->create(
            [
                'image_id'       => $dto->getImageId(),
                'is_visible'     => $dto->getIsVisible(),
                'category'       => $dto->getCategory(),
                'order_position' => $dto->getOrderPosition()
            ]
        );
    }
}
