<?php

namespace App\Http\Controllers\Api;


use App\Core\Api\Responses\Messages\MessagesCollection;
use App\Core\Api\Validates\Messages\GetMessagesListRequest;
use Domain\Messages\Services\MessageService;

/**
 * Class MessagesController.php
 *
 * @package App\Http\Controllers\Api  *
 * @nickname <alphazet>
 * @author Otabek Davronbekov <davronbekov.otabek@gmail.com>
 *
 * Date: 06/07/22
 */
class MessagesController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getList(GetMessagesListRequest $request)
    {
        $request->validated();

        $messageService = MessageService::getInstance()->getItems($request, $this->getLanguage());

        $messageCollection = new MessagesCollection($messageService);
        $messageCollection->locale = $this->getLanguage();

        $this->setData($messageCollection);

        return $this->composeData();
    }
}
