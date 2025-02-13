<?php

namespace App\Http\Controllers\Api;

use App\Core\Api\Responses\User\CheckOutResource;
use App\Core\Api\Responses\User\UserInfoResource;
use App\Core\Api\Responses\User\WelcomeResource;
use Domain\Rooms\Services\RoomService;
use Domain\Users\Entities\User;
use Domain\Users\Services\UserService;
use Domain\Welcome\Services\WelcomeService;
use Exception;
use Illuminate\Http\Request;

/**
 * Class UserController.php
 *
 * @package App\Http\Controllers\Api  *
 * @nickname <alphazet>
 * @author Otabek Davronbekov <davronbekov.otabek@gmail.com>
 *
 * Date: 22/07/22
 */
class UserController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getInfo(Request $request)
    {
        try {
            /** @var Room $room */
            $room = RoomService::getInstance()->getItem($request);
            if (!$room) {
                return response()->json(['message' => 'Room not found'], 404);
            }

            $userInfoResource = new UserInfoResource($room);
            $userInfoResource->locale = $this->getLanguage();

            $this->setData($userInfoResource);

            return $this->composeData();
        } catch (Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 500);
        }
    }

    public function welcome(Request $request)
    {
        try {
            $userId = $request->input('user_id');

            /** @var User $user */
            $user = UserService::getInstance()->getById($userId);

            if (is_null($user)) {
                return response()->json(['message' => 'Пользователь не найден'], 404);
            }

            $welcome = WelcomeService::getInstance()->getByLanguage($user->language);

            $welcomeResource = new WelcomeResource($welcome);
            $welcomeResource->user_name = "{$user->first_name} {$user->last_name}";

            $this->setData($welcomeResource);

            return $this->composeData();
        } catch (Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 500);
        }
    }
}
