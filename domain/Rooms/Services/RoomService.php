<?php

namespace Domain\Rooms\Services;


use App\Core\Services;
use Domain\Rooms\Builders\RoomBuilder;
use Domain\Rooms\DTO\RoomDto;
use Illuminate\Http\Request;

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
}
