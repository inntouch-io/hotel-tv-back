<?php

namespace App\Http\Controllers\Api\ThirdParty;

use App\Core\Api\Responses\ThirdParty\WeatherResource;
use App\Http\Controllers\Api\ApiController;
use Illuminate\Support\Facades\Cache;
use function dd;

/**
 * Class WeatherController.php
 *
 * @package App\Core\Api\Responses\ThirdParty  *
 * @nickname <alphazet>
 * @author Otabek Davronbekov <davronbekov.otabek@gmail.com>
 *
 * Date: 04/07/22
 */
class WeatherController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getToday()
    {
        $data = Cache::get('get_weather_today');
        if(is_null($data)){
            $data = get_weather_today();
            if(is_null($data)){
                return $this->composeData();
            }

            Cache::add('get_weather_today', $data, 3600); //1h
        }

        $weatherResource = new WeatherResource($data);
        $weatherResource->locale = $this->getLanguage();

        $this->setData($weatherResource);
        return $this->composeData();
    }
}
