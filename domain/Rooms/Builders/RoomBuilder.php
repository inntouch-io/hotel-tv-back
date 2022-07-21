<?php

namespace Domain\Rooms\Builders;


use App\Core\Builders;
use Domain\Rooms\DTO\RoomDto;
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

    public function getItem(RoomDto $roomDto)
    {
        $item = Room::query()
            ->where('device_id', '=', $roomDto->getDeviceId());

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

            $room = Room::getInstance();

            $room->device_id = $roomDto->getDeviceId();
            $room->is_verified = $roomDto->getIsVerified();
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
                'device_id'   => $updateDto->getDeviceId(),
                'is_verified' => $updateDto->getIsVerified(),
            ]
        );
    }
}
