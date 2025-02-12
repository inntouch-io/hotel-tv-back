<?php

namespace App\Http\Controllers\Api;

use App\Core\Api\Responses\RoomResource;
use App\Core\Api\Validates\Auth\RegisterDeviceIdRequest;
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

    public function registerDeviceId(RegisterDeviceIdRequest $request)
    {
        $request->validated();

        // $room = RoomService::getInstance()->getItem($request);
        // if (is_null($room)) {
        //     $room = RoomService::getInstance()->insertItem($request);
        //     RoomService::getInstance()->updateItem($room, $request);
        // }

        // $roomResource = new RoomResource($room);
        // $roomResource->locale = $this->getLanguage();

        $responseData = [
            'roomNumber' => "123",
            'deviceId'   => $request->input('device-id'),
            'ip'         => $request->ip(),
            'isVerified' => true
        ];

        $this->setData($responseData);

        return $this->composeData();
    }
}
