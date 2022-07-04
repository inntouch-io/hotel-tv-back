<?php

namespace App\Core\Api\Responses\ThirdParty;


use App\Core\Api\Collections;
use App\Core\StaticKeys;

/**
 * Class ApplicationsCollection.php
 *
 * @package App\Core\Api\Responses\ThirdParty  *
 * @nickname <alphazet>
 * @author Otabek Davronbekov <davronbekov.otabek@gmail.com>
 *
 * Date: 04/07/22
 */
class ApplicationsCollection extends Collections
{
    private static $APPLICATION_ID = 'applicationId';
    private static $APPLICATION_NAME = 'applicationName';
    private static $APPLICATION_URL = 'applicationUrl';

    public function toArray($request)
    {
        return $this->collection->transform(function ($item){
            $image = $item->image ? $item->image->getUrl() : null;

            return [
                self::$APPLICATION_ID => (int) $item->getId(),
                self::$APPLICATION_NAME => (string) $item->getName(),
                self::$APPLICATION_URL => (string) $item->getUrl(),
                StaticKeys::$FILES => [
                    StaticKeys::$IMAGE_URL => $image,
                ]
            ];
        });
    }
}
