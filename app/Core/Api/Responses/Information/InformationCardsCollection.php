<?php

namespace App\Core\Api\Responses\Information;


use App\Core\Api\Collections;
use App\Core\StaticKeys;

/**
 * Class InformationCardsCollection.php
 *
 * @package App\Core\Api\Responses\Information  *
 * @nickname <alphazet>
 * @author Otabek Davronbekov <davronbekov.otabek@gmail.com>
 *
 * Date: 20/07/22
 */
class InformationCardsCollection extends Collections
{
    private static $CARD_ID = 'cardId';
    private static $CARD_TITLE = 'cardTitle';
    private static $CARD_DESCRIPTION = 'cardDescription';
    private static $CARD_LONG_DESCRIPTION = 'cardSubDescription';

    public function toArray($request)
    {
        return $this->collection->transform(function ($item){
            $image = $item->image ? $item->image->getUrl() : null;

            return [
                self::$CARD_ID => (int) $item->getId(),
                self::$CARD_TITLE => (string) $item->getTitle(),
                self::$CARD_DESCRIPTION => (string) $item->getDescription(),
                self::$CARD_LONG_DESCRIPTION => (string) $item->getSubDescription(),

                StaticKeys::$FILES => [
                    StaticKeys::$IMAGE_URL => $image,
                ]
            ];
        });
    }
}
