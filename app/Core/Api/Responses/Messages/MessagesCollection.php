<?php

namespace App\Core\Api\Responses\Messages;


use App\Core\Api\Collections;
use App\Core\StaticKeys;

/**
 * Class MessagesCollection.php
 *
 * @package App\Core\Api\Responses\Messages  *
 * @nickname <alphazet>
 * @author Otabek Davronbekov <davronbekov.otabek@gmail.com>
 *
 * Date: 06/07/22
 */
class MessagesCollection extends Collections
{
    private static $MESSAGE_ID = 'messageId';
    private static $MESSAGE_TITLE = 'messageTitle';
    private static $MESSAGE_DESCRIPTION = 'messageDescription';
    private static $MESSAGE_LONG_DESCRIPTION = 'messageLongDescription';

    public function toArray($request)
    {
        return $this->collection->transform(function ($item){
            $image = $item->image ? $item->image->getUrl() : null;

            return [
                self::$MESSAGE_ID => (int) $item->getId(),
                self::$MESSAGE_TITLE => (string) $item->getTitle(),
                self::$MESSAGE_DESCRIPTION => (string) $item->getDescription(),
                self::$MESSAGE_LONG_DESCRIPTION => (string) $item->getLongDescription(),

                StaticKeys::$FILES => [
                    StaticKeys::$IMAGE_URL => $image,
                ]
            ];
        });
    }
}
