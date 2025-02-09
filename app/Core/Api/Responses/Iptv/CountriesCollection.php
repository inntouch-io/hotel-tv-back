<?php

namespace App\Core\Api\Responses\Iptv;


use App\Core\Api\Collections;
use App\Core\StaticKeys;

/**
 * Class CountriesCollection.php
 *
 * @package App\Core\Api\Responses\Iptv  *
 * @nickname <alphazet>
 * @author Otabek Davronbekov <davronbekov.otabek@gmail.com>
 *
 * Date: 26/07/22
 */
class CountriesCollection extends Collections
{
    public function toArray($request)
    {
        return $this->collection->transform(function ($item) {
            $image = $item->image ? $item->image->getUrl() : null;

            return [
                StaticKeys::$COUNTRY_ID => $item->getId(),
                StaticKeys::$COUNTRY_TITLE => $item->getName(),

                StaticKeys::$FILES => [
                    StaticKeys::$IMAGE_URL => $image,
                ]
            ];
        });
    }
}
