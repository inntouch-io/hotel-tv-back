<?php

namespace Domain\Modules\Resources;


use App\Core\Api\Collections;
use App\Core\StaticKeys;

/**
 * Class ModulesCollection.php
 *
 * @package Domain\Modules\Resources  *
 * @nickname <alphazet>
 * @author Otabek Davronbekov <davronbekov.otabek@gmail.com>
 *
 * Date: 25/05/22
 */
class ModulesCollection extends Collections
{
    private static $MODULE_ID = 'moduleId';
    private static $MODULE_NAME = 'moduleName';

    public function toArray($request)
    {
        return $this->collection->transform(function ($item){
            return [
                self::$MODULE_ID => $item->getId(),
                self::$MODULE_NAME => $item->getName(),

                StaticKeys::$FILES => [
                    StaticKeys::$IMAGE_URL => $item->image->getUrl(),
                ]
            ];
        });
    }
}
