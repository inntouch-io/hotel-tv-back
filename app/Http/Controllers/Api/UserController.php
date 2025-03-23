<?php

namespace App\Http\Controllers\Api;

use App\Core\Api\Responses\User\UserInfoResource;
use App\Core\Api\Responses\User\WelcomeResource;
use Domain\Users\Entities\User;
use Domain\Users\Services\UserService;
use Domain\Welcome\Services\WelcomeService;
use Exception;
use Illuminate\Http\JsonResponse;
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

    /**
     * @return JsonResponse
     */
    public function getInfo(): JsonResponse
    {
        try {
            $room = auth()->user();

            $userInfoResource = new UserInfoResource($room);
            $userInfoResource->locale = $this->getLanguage();

            $this->setData($userInfoResource);

            return $this->composeData();
        } catch (Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 500);
        }
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function welcome(Request $request): JsonResponse
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
