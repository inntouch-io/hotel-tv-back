<?php

namespace App\Core\Api\Responses\User;


use App\Core\Api\Resources;
use App\Core\StaticKeys;
use Domain\Rooms\Entities\Room;

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
    private static string $USER_ID = 'userId';
    private static string $USER_NAME = 'userName';
    private static string $MAX_VOLUME = 'maxVolume';
    private static string $ROOM_NUMBER = 'roomNumber';
    private static string $ARRIVAL_TIME = 'arrivalTime';
    private static string $DEPARTURE_TIME = 'departureTime';

    public function toArray($request): array
    {
        /** @var Room $room */
        $room = $this;
        $user = $room->user;

        return [
            self::$USER_ID => optional($user)->id,
            self::$USER_NAME => is_null($user) ? null : "{$user->first_name} {$user->last_name}",
            StaticKeys::$ROOM_ID => $room->getId(),
            self::$MAX_VOLUME => $room->getMaxVolume(),
            self::$ROOM_NUMBER => $room->getRoomNumber(),
            self::$ARRIVAL_TIME => [
                StaticKeys::$DATA => is_null($user) ? null : date('d.m.Y', $user->arrival_time),
                StaticKeys::$TIME => is_null($user) ? null : date('H:i', $user->arrival_time),
            ],
            self::$DEPARTURE_TIME => [
                StaticKeys::$DATA => is_null($user) ? null : date('d.m.Y', $user->departure_time),
                StaticKeys::$TIME => is_null($user) ? null : date('H:i', $user->departure_time),
            ],
        ];
    }
}
