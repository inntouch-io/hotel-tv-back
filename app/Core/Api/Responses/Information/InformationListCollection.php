<?php

namespace App\Core\Api\Responses\Information;


use App\Core\Api\Collections;
use App\Core\StaticKeys;

/**
 * Class InformationListCollection.php
 *
 * @package App\Core\Api\Responses\Information  *
 * @nickname <alphazet>
 * @author Otabek Davronbekov <davronbekov.otabek@gmail.com>
 *
 * Date: 20/07/22
 */
class InformationListCollection extends Collections
{
    private static $INFO_ID = 'infoId';
    private static $INFO_TITLE = 'infoTitle';

    public function toArray($request)
    {
        return $this->collection->transform(function ($item){
            $image = $item->image ? $item->image->getUrl() : null;

            return [
                self::$INFO_ID => (int) $item->getId(),
                self::$INFO_TITLE => (string) $item->getTitle(),
                StaticKeys::$FILES => [
                    StaticKeys::$IMAGE_URL => $image,
                ]
            ];
        });
    }
}
