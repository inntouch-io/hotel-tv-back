<?php

namespace App\Http\Controllers\Api;


use App\Core\Api\Responses\Messages\MessageCardsCollection;
use App\Core\Api\Responses\Messages\MessagesCollection;
use App\Core\Api\Validates\Messages\GetMessageCardsRequest;
use App\Core\Api\Validates\Messages\GetMessagesListRequest;
use App\Core\StaticKeys;
use Domain\Messages\Services\MessageCardService;
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

        $totalItems = $messageService->total();
        $itemsPerPage = $request->input('itemsPerPage', 18);

        $this->setMeta([
            StaticKeys::$ITEMS_PER_PAGE  => (int) $itemsPerPage,
            StaticKeys::$TOTAL_ITEMS => (int) $totalItems,
            StaticKeys::$CURRENT_PAGE => (int) $request->input('page', 1),
            StaticKeys::$TOTAL_PAGES => (int) ceil($totalItems / ($itemsPerPage ?: $totalItems))
        ]);

        return $this->composeData();
    }

    public function getCards(GetMessageCardsRequest $request)
    {
        $request->validated();

        $messageCardService = MessageCardService::getInstance()->getItems($request, $this->getLanguage());

        $messageCardsCollection = new MessageCardsCollection($messageCardService);
        $messageCardsCollection->locale = $this->getLanguage();

        $this->setData($messageCardsCollection);

        $totalItems = $messageCardService->total();
        $itemsPerPage = $request->input('itemsPerPage', 18);

        $this->setMeta([
            StaticKeys::$ITEMS_PER_PAGE  => (int) $itemsPerPage,
            StaticKeys::$TOTAL_ITEMS => (int) $totalItems,
            StaticKeys::$CURRENT_PAGE => (int) $request->input('page', 1),
            StaticKeys::$TOTAL_PAGES => (int) ceil($totalItems / ($itemsPerPage ?: $totalItems))
        ]);

        return $this->composeData();
    }
}
