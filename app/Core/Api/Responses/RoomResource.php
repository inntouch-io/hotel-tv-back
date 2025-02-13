<?php

namespace App\Core\Api\Responses;


use App\Core\Api\Resources;
use App\Core\StaticKeys;

/**
 * Class RoomResource.php
 *
 * @package App\Core\Api\Responses  *
 * @nickname <alphazet>
 * @author Otabek Davronbekov <davronbekov.otabek@gmail.com>
 *
 * Date: 02/07/22
 */
class RoomResource extends Resources
{
    public function toArray($request)
    {
        return [
            StaticKeys::$ROOM_NUMBER => (string) $this->getRoomNumber(),
            StaticKeys::$DEVICE_ID => (string) $this->getDeviceId(),
            StaticKeys::$IP => (string) $this->getDeviceIp(),
            StaticKeys::$IS_VERIFIED => (bool) $this->getIsActive(),
            StaticKeys::$IS_ACTIVE => (bool) $this->getIsActive(),
        ];
    }
}
