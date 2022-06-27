<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 24.06.2022 / 16:23
 */

namespace Domain\Messages\Builders;

use Closure;
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

    public function takeBy(Closure $closure)
    {
        return $closure(Message::query())->first();
    }

    public function update(Message $message, int $imageId)
    {
        $message->update(
            [
                'image_id' => $imageId
            ]
        );
    }
}
