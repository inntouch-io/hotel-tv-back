<?php

namespace App\Core\Api\Responses\User;

use App\Core\Api\Resources;

/**
 * Class CheckOutResource
 *
 * @package App\Core\Api\Responses\User
 * @nickname <alphazet>
 *
 * Date: 13/02/25
 */
class CheckOutResource extends Resources
{
    private static $USER_ID = 'userId';
    private static $USER_NAME = 'userName';
    private static $ROOM_ID = 'roomId';
    private static $USER_PHONE = 'userPhoneNumber';
    private static $USER_PASSPORT = 'userPassport';
    private static $ARRIVAL_TIME = 'arrivalTime';
    private static $DEPARTURE_TIME = 'departureTime';
    private static $IS_EXPIRED = 'isExpired';

    public function toArray($request)
    {
        $user = $this->resource;

        $now = time();
        $arrivalTime = $user->arrival_time;
        $departureTime = $user->departure_time;
        $isExpired = $now >= $departureTime;

        return [
            self::$USER_ID => (int) $user->id,
            self::$USER_NAME => (string) "{$user->first_name} {$user->last_name}",
            self::$ROOM_ID => (int) $user->room_id,
            self::$USER_PHONE => (string) $user->telephone_number,
            self::$USER_PASSPORT => (string) $user->passport_number,
            self::$ARRIVAL_TIME => (string) date('d.m.Y H:i', $arrivalTime),
            self::$DEPARTURE_TIME => (string) date('d.m.Y H:i', $departureTime),
            self::$IS_EXPIRED => $isExpired,
        ];
    }
}
