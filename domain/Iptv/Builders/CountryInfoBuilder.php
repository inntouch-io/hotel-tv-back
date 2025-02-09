<?php

/**
 * Hotel-TV.
 *
 * @author  Farrux Orziyev
 * Created: 07.02.2025 / 10:16
 */

namespace Domain\Iptv\Builders;

use Closure;
use Domain\Iptv\Dto\ChannelInfoDto;
use Domain\Iptv\Dto\CountryInfoDto;
use Domain\Iptv\Entities\IptvChannelInfo;
use Domain\Iptv\Entities\IptvCountryInfo;

/**
 * Class CountryInfoBuilder
 * @package Domain\Iptv\Builders
 */
class CountryInfoBuilder
{
    /**
     * @return CountryInfoBuilder
     */
    public static function getInstance(): CountryInfoBuilder
    {
        return new static();
    }

    public function store(CountryInfoDto $dto)
    {
        return IptvCountryInfo::query()->create(
            [
                'title'      => $dto->getTitle(),
                'locale'     => $dto->getLocale(),
                'country_id' => $dto->getCountryId()
            ]
        );
    }

    public function update(IptvCountryInfo $info, CountryInfoDto $dto)
    {
        $info->update(
            [
                'title' => $dto->getTitle()
            ]
        );
    }

    public function takeBy(Closure $closure)
    {
        return $closure(IptvCountryInfo::query())->first();
    }
}
