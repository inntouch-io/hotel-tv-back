<?php

namespace App\Http\Controllers\Api;


use App\Core\Api\Responses\Information\InformationCardsCollection;
use App\Core\Api\Responses\Information\InformationListCollection;
use App\Core\Api\Validates\Information\GetInformationCardsRequest;
use App\Core\Api\Validates\Information\GetInformationListRequest;
use App\Core\StaticKeys;
use Domain\Menus\Services\MenuCardService;
use Domain\Menus\Services\MenuService;

/**
 * Class InformationController.php
 *
 * @package App\Http\Controllers\Api  *
 * @nickname <alphazet>
 * @author Otabek Davronbekov <davronbekov.otabek@gmail.com>
 *
 * Date: 20/07/22
 */
class InformationController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getList(GetInformationListRequest $request)
    {
        $request->validated();

        $menuService = MenuService::getInstance()->getItems($request, $this->getLanguage());

        $menuListCollection = new InformationListCollection($menuService);
        $menuListCollection->locale = $this->getLanguage();

        $this->setData($menuListCollection);

        $totalItems = $menuService->total();
        $itemsPerPage = $request->input('itemsPerPage', 18);

        $this->setMeta([
            StaticKeys::$ITEMS_PER_PAGE  => (int) $itemsPerPage,
            StaticKeys::$TOTAL_ITEMS => (int) $totalItems,
            StaticKeys::$CURRENT_PAGE => (int) $request->input('page', 1),
            StaticKeys::$TOTAL_PAGES => (int) ceil($totalItems / ($itemsPerPage ?: $totalItems))
        ]);

        return $this->composeData();
    }

    public function getCards(GetInformationCardsRequest $request)
    {
        $request->validated();

        $messageCardService = MenuCardService::getInstance()->getItems($request, $this->getLanguage());

        $menuCardsCollection = new InformationCardsCollection($messageCardService);
        $menuCardsCollection->locale = $this->getLanguage();

        $this->setData($menuCardsCollection);

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
