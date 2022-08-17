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
    private static $MAX_VOLUME = 'maxVolume';
    private static $ARRIVAL_TIME = 'arrivalTime';
    private static $DEPARTURE_TIME = 'departureTime';

    public function toArray($request)
    {
        $user = $this->users();
        $userRoom = $this->userRoom();

        return [
            self::$USER_ID => (int) $user->getId(),
            self::$USER_NAME => (string) $user->getFullName(),
            StaticKeys::$ROOM_ID => (int) $userRoom->getRoomId(),
            self::$MAX_VOLUME => (int) $this->getMaxVolume(),
            self::$ARRIVAL_TIME => [
                StaticKeys::$DATA => (string) date('d.m.Y', $userRoom->getArrivalTime()),
                StaticKeys::$TIME => (string) date('H:i', $userRoom->getArrivalTime()),
            ],
            self::$DEPARTURE_TIME => [
                StaticKeys::$DATA => (string) date('d.m.Y', $userRoom->getDepartureTime()),
                StaticKeys::$TIME => (string) date('H:i', $userRoom->getDepartureTime()),
            ],
        ];
    }
}
