<?php

namespace App\Core\Api\Responses\Iptv;


use App\Core\Api\Collections;
use App\Core\StaticKeys;

/**
 * Class ChannelsCollection.php
 *
 * @package App\Core\Api\Responses\Iptv  *
 * @nickname <alphazet>
 * @author Otabek Davronbekov <davronbekov.otabek@gmail.com>
 *
 * Date: 26/07/22
 */
class ChannelsCollection extends Collections
{
    public function toArray($request)
    {
        return $this->collection->transform(function ($item){
            $image = $item->image ? $item->image->getUrl() : null;

            return [
                StaticKeys::$CHANNEL_ID => $item->getId(),
                StaticKeys::$CHANNEL_TITLE => $item->getName(),

                StaticKeys::$FILES => [
                    StaticKeys::$IMAGE_URL => $image,
                ]
            ];
        });
    }
}
