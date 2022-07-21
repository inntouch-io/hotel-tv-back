<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 27.06.2022 / 15:29
 */

namespace Domain\Messages\Builders;

use Closure;
use Domain\Messages\DTO\MessageInfoDto;
use Domain\Messages\DTO\MessageInfoDto;
use Domain\Messages\Entities\MessageInfo;

class MessageInfoBuilder
{
    /**
     * @return MessageInfoBuilder
     */
    public static function getInstance(): MessageInfoBuilder
    {
        return new static();
    }

    public function takeBy(Closure $closure)
    {
        return $closure(MessageInfo::query())->first();
    }

    public function update(MessageInfo $messageInfo, MessageInfoDto $messageInfoDto)
    {
        $messageInfo->update(
            [
                'title'           => $messageInfoDto->getTitle(),
                'description'     => $messageInfoDto->getDescription(),
                'longDescription' => $messageInfoDto->getLongDescription()
            ]
        );
    }

    public function add(MessageInfoDto $messageInfoCreateDto)
    {
        return MessageInfo::query()->create(
            [
                'title'           => $messageInfoCreateDto->getTitle(),
                'description'     => $messageInfoCreateDto->getDescription(),
                'longDescription' => $messageInfoCreateDto->getLongDescription(),
                'locale'          => $messageInfoCreateDto->getLocale(),
                'message_id'      => $messageInfoCreateDto->getMessageId()
            ]
        );
    }
}
