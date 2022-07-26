<?php

namespace App\Http\Controllers\Api;


use App\Core\Api\Responses\Iptv\ChannelResource;
use App\Core\Api\Responses\Iptv\ChannelsCollection;
use App\Core\Api\Validates\IptvChannels\ChannelDetailRequest;
use App\Core\Api\Validates\IptvChannels\ChannelsListRequest;
use App\Core\StaticKeys;
use Domain\Iptv\Services\ChannelService;

/**
 * Class IptvChannelsController.php
 *
 * @package App\Http\Controllers\Api  *
 * @nickname <alphazet>
 * @author Otabek Davronbekov <davronbekov.otabek@gmail.com>
 *
 * Date: 26/07/22
 */
class IptvChannelsController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getList(ChannelsListRequest $request)
    {
        $request->validated();

        $channels = ChannelService::getInstance()->getItems($request, $this->getLanguage());

        $channelsCollection = new ChannelsCollection($channels);
        $channelsCollection->locale = $this->getLanguage();

        $this->setData($channelsCollection);

        $totalItems = $channels->total();
        $itemsPerPage = $request->input('itemsPerPage', 18);

        $this->setMeta([
            StaticKeys::$ITEMS_PER_PAGE  => (int) $itemsPerPage,
            StaticKeys::$TOTAL_ITEMS => (int) $totalItems,
            StaticKeys::$CURRENT_PAGE => (int) $request->input('page', 1),
            StaticKeys::$TOTAL_PAGES => (int) ceil($totalItems / ($itemsPerPage ?: $totalItems))
        ]);

        return $this->composeData();
    }

    public function getDetail(ChannelDetailRequest $request)
    {
        $request->validated();

        $channels = ChannelService::getInstance()->getItem($request, $this->getLanguage());

        $channelResource = new ChannelResource($channels);
        $channelResource->locale = $this->getLanguage();

        $this->setData($channelResource);

        return $this->composeData();
    }
}
