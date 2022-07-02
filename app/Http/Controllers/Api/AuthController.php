<?php

namespace App\Http\Controllers\Api;


use App\Core\Api\Exceptions\NotFoundException;
use App\Core\Api\Responses\RoomResource;
use App\Core\Api\Validates\Auth\CheckDeviceIdValidate;
use App\Core\Api\Validates\Auth\RegisterDeviceIdValidate;
use Domain\Rooms\Services\RoomService;

/**
 * Class AuthController.php
 *
 * @package App\Http\Controllers\Api  *
 * @nickname <alphazet>
 * @author Otabek Davronbekov <davronbekov.otabek@gmail.com>
 *
 * Date: 02/07/22
 */
class AuthController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function registerDeviceId(RegisterDeviceIdValidate $request)
    {
        $request->validated();

        $room = RoomService::getInstance()->insertItem($request);

        $roomResource = new RoomResource($room);
        $roomResource->locale = $this->getLanguage();

        $this->setData($roomResource);

        return $this->composeData();
    }

    public function checkDeviceId(CheckDeviceIdValidate $request)
    {
        $request->validated();

        $room = $roomService = RoomService::getInstance()->getItem($request);
        if(is_null($room)){
            return new NotFoundException('Device not found!');
        }

        RoomService::getInstance()->updateItem($room, $request);

        $roomResource = new RoomResource($room);
        $roomResource->locale = $this->getLanguage();

        $this->setData($roomResource);

        return $this->composeData();
    }
}
