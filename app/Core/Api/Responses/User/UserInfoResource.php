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
        $user = $this->user;

        return [
            self::$USER_ID => (int) $user->id,
            self::$USER_NAME => (string) "{$user->first_name} {$user->last_name}",
            StaticKeys::$ROOM_ID => (int) $this->getId(),
            self::$MAX_VOLUME => (int) $this->getMaxVolume(),
            self::$ARRIVAL_TIME => [
                StaticKeys::$DATA => (string) date('d.m.Y', $user->arrival_time),
                StaticKeys::$TIME => (string) date('H:i', $user->arrival_time),
            ],
            self::$DEPARTURE_TIME => [
                StaticKeys::$DATA => (string) date('d.m.Y', $user->departure_time),
                StaticKeys::$TIME => (string) date('H:i', $user->departure_time),
            ],
        ];
    }
}
