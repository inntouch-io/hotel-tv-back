<?php

namespace App\Core\Api\Responses\ThirdParty;


use App\Core\Api\Resources;

/**
 * Class WeatherResource.php
 *
 * @package App\Core\Api\Responses\ThirdParty  *
 * @nickname <alphazet>
 * @author Otabek Davronbekov <davronbekov.otabek@gmail.com>
 *
 * Date: 04/07/22
 */
class WeatherResource extends Resources
{

    private static $CITY = 'city';
    private static $COUNTRY = 'country';
    private static $TEMPERATURE = 'temperature';
    private static $WEATHER_INFO = 'weatherInfo';

    public function toArray($request)
    {
        return [
            self::$TEMPERATURE => $this->main,
            self::$WEATHER_INFO => $this->weather,
            self::$COUNTRY => $this->sys->country,
            self::$CITY => $this->name,
        ];
    }
}
