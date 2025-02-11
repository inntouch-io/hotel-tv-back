<?php

namespace Domain\Rooms\Services;


use App\Core\Services;
use Domain\Rooms\Builders\RoomBuilder;
use Domain\Rooms\DTO\RoomDto;
use Domain\Rooms\DTO\RoomStoreDto;
use Domain\Rooms\DTO\RoomUpdateDto;
use Domain\Rooms\Entities\Room;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use RuntimeException;

/**
 * Class RoomService.php
 *
 * @package Domain\Rooms\Services  *
 * @nickname <alphazet>
 * @author Otabek Davronbekov <davronbekov.otabek@gmail.com>
 *
 * Date: 02/07/22
 */
class RoomService extends Services
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return RoomService
     */
    public static function getInstance(): RoomService
    {
        return new static();
    }

    public function getItem(Request $request)
    {
        $roomDto = RoomDto::getInstance();
        $roomDto->setDeviceId($request->input('device-id'));

        return RoomBuilder::getInstance()->getItem($roomDto);
    }

    public function updateItem($room, Request $request)
    {
        $roomDto = RoomDto::getInstance();
        $roomDto->setDeviceIp($request->ip());

        return RoomBuilder::getInstance()->updateItem($room, $roomDto);
    }

    public function insertItem(Request $request)
    {
        $roomDto = RoomDto::getInstance();
        $roomDto->setDeviceIp($request->ip());
        $roomDto->setDeviceId($request->input('device-id'));
        $roomDto->setIsActive(0);

        return RoomBuilder::getInstance()->insertItem($roomDto);
    }

    public function getList()
    {
        return RoomBuilder::getInstance()->getList();
    }

    public function getById(int $id)
    {
        return RoomBuilder::getInstance()->getById($id);
    }

    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'roomNumber' => 'required|string',
                'deviceId'   => 'required|string',
                'isActive' => 'nullable|int',
                'max_volume' => 'required|integer|between:0,100',
                'roomStatus' => ['required', Rule::in('free', 'booked')],
                'categoryId' => 'required|int',
            ]
        );

        if ($this->exists($data['deviceId'])) {
            throw new RuntimeException('Duplicated device id');
        }

        $dto = new RoomStoreDto(
            $data['deviceId'],
            $request->ip(),
            $data['max_volume'],
            $data['categoryId'],
            $data['roomNumber'],
            $data['roomStatus'],
            isset($data['isActive']) ? 1 : 0,
        );

        return RoomBuilder::getInstance()->store($dto);
    }

    public function update(Room $room, Request $request)
    {
        $data = $request->validate(
            [
                'roomNumber' => 'required|string',
                'deviceId'   => 'required|string',
                'isActive'   => 'nullable|int',
                'max_volume' => 'required|integer|between:0,100',
                'roomStatus' => ['required', Rule::in('free', 'booked')],
                'categoryId' => 'required|int',
            ]
        );

        if ($this->exists($data['deviceId']) && $data['deviceId'] !== $room->getDeviceId()) {
            throw new RuntimeException('Duplicated device id');
        }

        RoomBuilder::getInstance()->update($room, new RoomUpdateDto(
            $data['deviceId'],
            $data['categoryId'],
            $data['max_volume'],
            $data['roomNumber'],
            $data['roomStatus'],
            isset($data['isActive']) ? 1 : 0,
        ));
    }

    /**
     * @param string $deviceId
     * @return bool
     */
    public function exists(string $deviceId): bool
    {
        return RoomBuilder::getInstance()->exists($deviceId);
    }
}
