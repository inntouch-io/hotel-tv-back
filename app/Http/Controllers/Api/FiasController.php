<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 16.01.2023 / 13:36
 */

namespace App\Http\Controllers\Api;

use Domain\Rooms\Entities\Room;
use Domain\Rooms\Entities\User;
use Domain\Rooms\Entities\UserRoom;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

/**
 * Class FiasController
 * @package App\Http\Controllers\Api
 */
class FiasController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function resync(Request $request)
    {
        try {
            $guestData = $request->input('records');
            Log::info($guestData);

            $rooms = Room::query()->pluck('id', 'room_number')->toArray();

            foreach ($guestData as $data) {
                $responseType = substr($data, 0, 2);

                if ($responseType === "DS" || $responseType === "DE") {
                    continue;
                }

                if (isset($rooms[(int)get_link_record($data, 'RN')])) {
                    /** @var array $roomUsers */
                    $roomUsers = UserRoom::query()->where('room_id', '=', (int)$rooms[(int)get_link_record($data, 'RN')])
                        ->pluck('user_id')->toArray();
                } else {
                    continue;
                }

                $roomId = (int)$rooms[get_link_record($data, "RN")];

                if ($responseType === "GI") {
                    /** @var User $user */
                    $user = User::query()->firstOrCreate(
                        [
                            'guest_number' => (int)get_link_record($data, 'G#')
                        ],
                        [
                            'first_name'     => get_link_record($data, 'GF'),
                            'name'           => get_link_record($data, 'GN'),
                            'guest_language' => get_link_record($data, 'GL')
                        ]
                    );

                    if (count($roomUsers) !== 0) {
                        if (!in_array($user->getId(), $roomUsers)) {
                            UserRoom::query()->create(
                                [
                                    'room_id'        => $roomId,
                                    'user_id'        => $user->getId(),
                                    'arrival_time'   => (int)get_link_record($data, 'GA'),
                                    'departure_time' => (int)get_link_record($data, 'GD'),
                                    'room_status'    => 'booked'
                                ]
                            );
                        } else {
                            continue;
                        }
                    } else {
                        UserRoom::query()->create(
                            [
                                'room_id'        => $roomId,
                                'user_id'        => $user->getId(),
                                'arrival_time'   => (int)get_link_record($data, 'GA'),
                                'departure_time' => (int)get_link_record($data, 'GD'),
                                'room_status'    => 'booked'
                            ]
                        );
                    }
                }

                if ($responseType === "GO") {
                    if (count($roomUsers) === 0) {
                        continue;
                    }

                    $guestNumber = get_link_record($data, "G#");

                    if ($guestNumber !== false) {
                        /** @var User $user */
                        $user = User::query()->where('guest_number', '=', (int)$guestNumber)->first();

                        $userRoom = UserRoom::query()->where('user_id', '=', $user->getId())
                            ->where('room_id', '=', $roomId)
                            ->first();

                        if (!is_null($userRoom)) {
                            $userRoom->delete();
                        }
                    }
                }
            }

            return "good";
        } catch (Exception $exception) {
            Log::info($exception);
            return $exception->getMessage();
        }
    }

    public function guestIn(Request $request)
    {
        try {
            // Check for room_id from user_room tables
            // if you find it update it if you will not find it insert it

            $guestIn = $request->input('record'); // text

            // user data insert

            /** @var User $user */
            $user = User::query()->firstOrCreate(
                [
                    'guest_number' => (int)get_link_record($guestIn, 'G#')
                ],
                [
                    'first_name'     => get_link_record($guestIn, 'GF'),
                    'name'           => get_link_record($guestIn, 'GN'),
                    'guest_language' => get_link_record($guestIn, 'GL')
                ]
            );

            /** @var Room $room */
            $room = Room::query()->where('room_number', '=', (int)get_link_record($guestIn, 'RN'))->first();

            if (is_null($room)) {
                return "good";
            }

            /** @var array $roomUsers */
            $roomUsers = UserRoom::query()->where('room_id', '=', $room->getId())
                ->pluck('user_id')->toArray();

            if (count($roomUsers) !== 0) {
                if (!in_array($user->getId(), $roomUsers)) {
                    UserRoom::query()->create(
                        [
                            'room_id'        => $room->getId(),
                            'user_id'        => $user->getId(),
                            'arrival_time'   => (int)get_link_record($guestIn, 'GA'),
                            'departure_time' => (int)get_link_record($guestIn, 'GD'),
                            'room_status'    => 'booked'
                        ]
                    );
                } else {
                    return "good";
                }
            } else {
                UserRoom::query()->create(
                    [
                        'room_id'        => $room->getId(),
                        'user_id'        => $user->getId(),
                        'arrival_time'   => (int)get_link_record($guestIn, 'GA'),
                        'departure_time' => (int)get_link_record($guestIn, 'GD'),
                        'room_status'    => 'booked'
                    ]
                );
            }

            return "good";
        } catch (Exception $exception) {
            Log::info($exception);
            return $exception->getMessage();
        }
    }

    public function guestOut(Request $request)
    {
        try {
            // Check for room_id from user_room tables
            $guestOut = $request->input('record'); // text

            /** @var Room $room */
            $room = Room::query()->where('room_number', '=', (int)get_link_record($guestOut, 'RN'))->first();

            if (is_null($room)) {
                return "good";
            }

            $guestNumber = get_link_record($guestOut, "G#");

            if ($guestNumber !== false) {
                /** @var User $user */
                $user = User::query()->where('guest_number', '=', (int)$guestNumber)->first();

                $userRoom = UserRoom::query()->where('user_id', '=', $user->getId())
                    ->where('room_id', '=', $room->getId())
                    ->first();

                if (!is_null($userRoom)) {
                    $userRoom->delete();
                }
            }

            // if you find it make it free
            return "good";
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function guestCheck(Request $request)
    {
        try {
            $guestData = $request->input('record');

            User::query()->where('guest_number', '=', (int)get_link_record($guestData, "G#"))->update(
                [
                    'name'           => get_link_record($guestData, "GN"),
                    'first_name'     => get_link_record($guestData, "GF"),
                    'guest_language' => get_link_record($guestData, "GL")
                ]
            );

            return "good";

        } catch (Exception $exception) {
            Log::info($exception);
            return $exception->getMessage();
        }
    }
}
