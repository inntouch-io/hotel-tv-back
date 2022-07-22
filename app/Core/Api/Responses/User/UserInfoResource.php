<?php

namespace App\Core\Api\Responses\User;


use App\Core\Api\Resources;
use App\Core\StaticKeys;

/**
 * Class UserInfoResource.php
 *
 * @package App\Core\Api\Responses\User  *
 * @nickname <alphazet>
 * @author Otabek Davronbekov <davronbekov.otabek@gmail.com>
 *
 * Date: 22/07/22
 */
class UserInfoResource extends Resources
{
    private static $USER_ID = 'userId';
    private static $USER_NAME = 'userName';
    private static $ARRIVAL_TIME = 'arrivalTime';
    private static $DEPARTURE_TIME = 'departureTime';

    public function toArray($request)
    {
        $user = $this->users();
        $userRoom = $this->userRoom();

        return [
            self::$USER_ID => $user->getId(),
            self::$USER_NAME => $user->getFullName(),
            StaticKeys::$ROOM_ID => $userRoom->getRoomId(),
            self::$ARRIVAL_TIME => date('d.m.Y', $userRoom->getArrivalTime()),
            self::$DEPARTURE_TIME => date('d.m.Y', $userRoom->getDepartureTime()),
        ];
    }
}
