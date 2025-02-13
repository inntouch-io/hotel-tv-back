<?php

namespace Domain\Rooms\Builders;


use App\Core\Builders;
use Closure;
use Domain\Rooms\DTO\RoomDto;
use Domain\Rooms\DTO\RoomStoreDto;
use Domain\Rooms\DTO\RoomUpdateDto;
use Domain\Rooms\Entities\Room;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class RoomBuilder.php
 *
 * @package Domain\Rooms\Builders  *
 * @nickname <alphazet>
 * @author Otabek Davronbekov <davronbekov.otabek@gmail.com>
 *
 * Date: 02/07/22
 */
class RoomBuilder extends Builders
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return RoomBuilder
     */
    public static function getInstance(): RoomBuilder
    {
        return new static();
    }

    /**
     * @param Closure $closure
     * @return Room|null
     */
    public function takeBy(Closure $closure): ?Room
    {
        return $closure(Room::query())->first();
    }

    public function getItem(RoomDto $roomDto)
    {
        $item = Room::query()->where('device_id', '=', $roomDto->getDeviceId());

        return $item->first();
    }

    public function updateItem($room, RoomDto $roomDto)
    {
        try {

            DB::beginTransaction();

            /** @var Room $room */

            $room->device_ip = $roomDto->getDeviceIp();

            $room->save(); //save

            DB::commit();

            return true;
        } catch (Exception $exception) {
            DB::rollBack();

            return false;
        }
    }

    public function insertItem(RoomDto $roomDto)
    {
        try {

            DB::beginTransaction();

            $room = new Room();

            $room->device_id = $roomDto->getDeviceId();
            $room->is_active = $roomDto->getIsActive();
            $room->device_ip = $roomDto->getDeviceIp();

            $room->save(); //save

            DB::commit();

            return $room;
        } catch (Exception $exception) {
            DB::rollBack();

            return null;
        }
    }

    public function getList()
    {
        return Room::query()->orderByDesc('id')->get();
    }

    public function getById(int $id)
    {
        return Room::query()->whereKey($id)->first();
    }

    /**
     * @param string $deviceId
     * @return bool
     */
    public function exists(string $deviceId): bool
    {
        return Room::query()->where('device_id', '=', $deviceId)->exists();
    }

    public function update(Room $room, RoomUpdateDto $updateDto)
    {
        $room->update(
            [
                'room_number' => $updateDto->getRoomNumber(),
                'room_status' => $updateDto->getRoomStatus(),
                'device_id'   => $updateDto->getDeviceId(),
                'category_id' => $updateDto->getCategoryId(),
                'is_active'   => $updateDto->getIsActive(),
                'max_volume'  => $updateDto->getMaxVolume()
            ]
        );
    }

    public function store(RoomStoreDto $dto)
    {
        return Room::query()->create([
            'room_number' => $dto->getRoomNumber(),
            'device_id'   => $dto->getDeviceId(),
            'device_ip'   => $dto->getDeviceIp(),
            'is_active'   => $dto->getIsActive(),
            'max_volume'  => $dto->getMaxVolume(),
            'room_status' => $dto->getRoomStatus(),
            'category_id' => $dto->getCategoryId()
        ]);
    }
}
