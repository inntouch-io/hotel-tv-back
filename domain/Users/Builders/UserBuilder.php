<?php

/**
 * Hotel-alphazet.
 *
 * @author  Mirfayz Nosirov
 * Created: 29.08.2023 / 17:26
 */

namespace Domain\Users\Builders;

use App\Core\Builders;
use Closure;
use Domain\Rooms\Entities\Room;
use Domain\Rooms\Entities\RoomHistory;
use Domain\Users\Entities\User;
use Domain\Users\DTO\UserDto;
use Exception;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use RuntimeException;

/**
 * Class UserBuilder
 * @package Domain\Rooms\Builders
 */
class UserBuilder extends Builders
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return UserBuilder
     */
    public static function getInstance(): UserBuilder
    {
        return new static();
    }

    public function getById(int $id)
    {
        return User::query()->whereKey($id)->first();
    }

    public function getList()
    {
        return User::query()->orderByDesc('id')->get();
    }

    public function store(UserDto $userDto): ?User
    {
        try {

            DB::beginTransaction();

            /** @var Room $room */
            $room = Room::query()->whereKey((int)$userDto->getRoomId())->where('is_active', '=', 1)->first();

            if (is_null($room) || $room->getRoomStatus() === 'booked') {
                throw new RuntimeException('Room not found or booked!', 400);
            }

            /** @var User $user */
            $user = User::query()->create(
                [
                    'first_name'       => $userDto->getFirstName(),
                    'last_name'        => $userDto->getLastName(),
                    'telephone_number' => $userDto->getTelephoneNumber(),
                    'passport_number'  => $userDto->getPassportNumber(),
                    'language'         => $userDto->getLanguage(),
                    'arrival_time'     => $userDto->getArrivalTime(),
                    'departure_time'   => $userDto->getDepartureTime(),
                    'room_id'          => $userDto->getRoomId()
                ]
            );

            RoomHistory::query()->create(
                [
                    'user_id' => $user->getId(),
                    'room_id' => (int)$userDto->getRoomId(),
                    'status'  => 'arrive',
                    'time'    => $user->getArrivalTime()
                ]
            );

            $room->room_status = 'booked';
            $room->save();

            DB::commit();

            return $user;
        } catch (Exception $exception) {
            DB::rollBack();

            throw new RuntimeException($exception->getMessage());
        }
    }

    public function update(User $user, UserDto $userDto)
    {
        try {
            DB::beginTransaction();

            if (!is_null($user->getRoomId()) && $user->getRoomId() !== $userDto->getRoomId()) {
                if (!$this->exists((int)$userDto->getRoomId())) {
                    throw new RuntimeException('Room not found or booked!', 400);
                }

                RoomHistory::query()->insert(
                    [
                        [
                            'user_id' => $user->getId(),
                            'room_id' => $user->getRoomId(),
                            'status'  => 'departure',
                            'time'    => time(),
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now()
                        ],
                        [
                            'user_id' => $user->getId(),
                            'room_id' => $userDto->getRoomId(),
                            'status'  => 'arrive',
                            'time'    => $userDto->getArrivalTime(),
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now()
                        ]
                    ]
                );

                Room::query()->whereKey($user->getRoomId())->update(['room_status' => 'free']);
                Room::query()->whereKey($userDto->getRoomId())->update(['room_status' => 'booked']);
            } elseif (is_null($user->getRoomId())) {
                if (!$this->exists((int)$userDto->getRoomId())) {
                    throw new RuntimeException('Room not found or booked!', 400);
                }

                Room::query()->whereKey($userDto->getRoomId())->update(['room_status' => 'booked']);
            }

            $user->update(
                [
                    'first_name'       => $userDto->getFirstName(),
                    'last_name'        => $userDto->getLastName(),
                    'telephone_number' => $userDto->getTelephoneNumber(),
                    'passport_number'  => $userDto->getPassportNumber(),
                    'language'         => $userDto->getLanguage(),
                    'arrival_time'     => $userDto->getArrivalTime(),
                    'departure_time'   => $userDto->getDepartureTime(),
                    'room_id'          => $userDto->getRoomId()
                ]
            );


            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();

            throw new RuntimeException($exception->getMessage());
        }
    }

    public function delete(Closure $closure)
    {
        $closure(User::query())->delete();
    }

    /**
     * @param int $roomId
     * @return bool
     */
    public function exists(int $roomId): bool
    {
        return Room::query()
            ->whereKey($roomId)
            ->where('room_status', '=', 'free')
            ->where('is_active', '=', 1)
            ->exists();
    }
}
