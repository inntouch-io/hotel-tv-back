<?php

namespace Domain\Rooms\Services;


use App\Core\Services;
use Domain\Rooms\Builders\RoomBuilder;
use Domain\Rooms\DTO\RoomDto;
use Domain\Rooms\DTO\RoomUpdateDto;
use Domain\Rooms\Entities\Room;
use Illuminate\Http\Request;
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
        $roomDto->setIsVerified(0);

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

    public function update(Room $room, Request $request)
    {
        $data = $request->validate(
            [
                'roomNumber' => 'required|string',
                'deviceId'   => 'required|string',
                'isVerified' => 'nullable|int',
                'max_volume' => 'required|integer|between:0,100'
            ]
        );

        if ($this->exists($data['deviceId']) && $data['deviceId'] !== $room->getDeviceId()) {
            throw new RuntimeException('Duplicated device id');
        }

        RoomBuilder::getInstance()->update($room, new RoomUpdateDto(
            $data['deviceId'],
            $data['max_volume'],
            $data['roomNumber'],
            isset($data['isVerified']) ? 1 : 0,

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
