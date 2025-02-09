<?php

/**
 * Hotel-TV.
 *
 * @author Farrux Orziyev
 * Created: 07.02.2025 / 10:16
 */

namespace Domain\Iptv\Services;

use Domain\Iptv\Builders\ChannelInfoBuilder;
use Domain\Iptv\Builders\CountryInfoBuilder;
use Domain\Iptv\Dto\ChannelInfoDto;
use Domain\Iptv\Dto\CountryInfoDto;
use Domain\Iptv\Entities\IptvChannelInfo;
use Domain\Iptv\Entities\IptvCountryInfo;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

/**
 * Class CountryInfoService
 * @package Domain\Iptv\Services
 */
class CountryInfoService
{
    protected CountryInfoBuilder $builder;

    /**
     * @param CountryInfoBuilder $builder
     */
    public function __construct(CountryInfoBuilder $builder)
    {
        $this->builder = $builder;
    }

    /**
     * @return CountryInfoService
     */
    public static function getInstance(): CountryInfoService
    {
        return new static(CountryInfoBuilder::getInstance());
    }

    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'title'  => 'required|string',
                'locale' => 'required|in:' . implode(',', array_keys(config('app.locales'))),
            ]
        );

        return $this->builder->store(new CountryInfoDto(
            $data['title'],
            $data['locale'],
            (int)$request->query('countryId')
        ));
    }

    public function update(IptvCountryInfo $info, Request $request)
    {
        $data = $request->validate(
            [
                'title' => 'required|string'
            ]
        );

        $this->builder->update($info, new CountryInfoDto(
            $data['title']
        ));
    }

    public function getById(int $id)
    {
        return $this->builder->takeBy(function (Builder $builder) use ($id) {
            return $builder->whereKey($id);
        });
    }
}
