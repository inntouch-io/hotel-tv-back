<?php

namespace App\Http\Controllers\Api;


use App\Core\Api\Responses\Iptv\ChannelResource;
use App\Core\Api\Responses\Iptv\ChannelsCollection;
use App\Core\Api\Responses\Iptv\CountriesCollection;
use App\Core\Api\Validates\IptvChannels\ChannelDetailRequest;
use App\Core\Api\Validates\IptvChannels\ChannelsListRequest;
use App\Core\Api\Validates\IptvCountries\CountriesListRequest;
use App\Core\StaticKeys;
use Domain\Iptv\Services\ChannelService;
use Domain\Iptv\Services\CountryService;

/**
 * Class IptvCountriesController.php
 *
 * @package App\Http\Controllers\Api  *
 * @nickname <alphazet>
 * @author Farrux Orziyev <davronbekov.otabek@gmail.com>
 *
 * Date: 07/02/25
 */
class IptvCountriesController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getCountries(CountriesListRequest $request)
    {
        $request->validated();

        $countries = CountryService::getInstance()->getItems($request, $this->getLanguage());

        $countriesCollection = new CountriesCollection($countries);
        $countriesCollection->locale = $this->getLanguage();

        $this->setData($countriesCollection);

        return $this->composeData();
    }
}
