<?php

/**
 * Hotel-alphazet.
 *
 * @author  Mirfayz Nosirov
 * Created: 29.08.2023 / 14:50
 */

namespace Domain\Users\Services;

use App\Core\Services;
use Domain\Rooms\Entities\RoomHistory;
use Domain\Users\Entities\User;
use Domain\Users\Builders\UserBuilder;
use Domain\Users\DTO\UserDto;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;

/**
 * Class UserService
 * @package Domain\Users\Services
 */
class UserService extends Services
{
    /**
     * @return UserService
     */
    public static function getInstance(): UserService
    {
        return new static();
    }

    public function getList()
    {
        return UserBuilder::getInstance()->getList();
    }

    public function getById(int $id)
    {
        return UserBuilder::getInstance()->getById($id);
    }

    public function getByRoomId(int $roomId)
    {
        return UserBuilder::getInstance()->getByRoomId($roomId);
    }

    /**
     * @param UserDto $userDto
     * @return User|null
     */
    public function store(UserDto $userDto): ?User
    {
        $userDto->setArrivalTime(Carbon::parse($userDto->getArrivalTime())->timestamp);
        $userDto->setDepartureTime(Carbon::parse($userDto->getDepartureTime())->timestamp);

        return UserBuilder::getInstance()->store($userDto);
    }

    public function update(User $user, UserDto $userDto)
    {
        $userDto->setArrivalTime(Carbon::parse($userDto->getArrivalTime())->timestamp);
        $userDto->setDepartureTime(Carbon::parse($userDto->getDepartureTime())->timestamp);

        UserBuilder::getInstance()->update($user, $userDto);
    }

    public function delete(int $id)
    {
        UserBuilder::getInstance()->delete(function (Builder $builder) use ($id) {
            RoomHistory::where('user_id', $id)->delete();
            return $builder->whereKey($id);
        });
    }
}
