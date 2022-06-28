<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 28.06.2022 / 15:47
 */

namespace Domain\Messages\Builders;

use Closure;
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

    public function list(Closure $closure)
    {
        return $closure(MessageCard::query())->get();
    }
}
