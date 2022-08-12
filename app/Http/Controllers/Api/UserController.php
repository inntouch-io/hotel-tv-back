<?php

namespace App\Http\Controllers\Api;


use App\Core\Api\Responses\User\UserInfoResource;
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

    public function getInfo(Request $request) {
        $room = $request->user();

        $userInfoResource = new UserInfoResource($room);
        $userInfoResource->locale = $this->getLanguage();

        $this->setData($userInfoResource);

        return $this->composeData();
    }
}
