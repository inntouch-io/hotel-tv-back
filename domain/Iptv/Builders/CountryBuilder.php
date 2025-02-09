<?php

/**
 * Hotel-TV.
 *
 * @author  Farrux Orziyev
 * Created: 01.02.2025 / 14:16
 */

namespace Domain\Iptv\Builders;

use Closure;
use Domain\Iptv\Dto\CountryDto;
use Domain\Iptv\Entities\IptvCountry;

/**
 * Class CountryBuilder
 * @package Domain\Iptv\Builders
 */
class CountryBuilder
{
    /**
     * @return CountryBuilder
     */
    public static function getInstance(): CountryBuilder
    {
        return new static();
    }

    public function list(Closure $closure)
    {
        return $closure(IptvCountry::query())->get();
    }

    public function getItems(Closure $closure, $itemsPerPage)
    {
        return $closure(IptvCountry::query())->paginate($itemsPerPage);
    }

    public function takeBy(Closure $closure)
    {
        return $closure(IptvCountry::query())->first();
    }

    public function exists(Closure $closure)
    {
        return $closure(IptvCountry::query())->exists();
    }

    public function store(CountryDto $dto)
    {
        return IptvCountry::query()->create(
            [
                'title'          => $dto->getTitle(),
                'image_id'       => $dto->getImageId(),
                'is_visible'     => $dto->getIsVisible(),
                'order_position' => $dto->getOrderPosition()
            ]
        );
    }

    public function update(IptvCountry $country, CountryDto $dto)
    {
        $country->update(
            [
                'title'      => $dto->getTitle(),
                'image_id'   => $dto->getImageId(),
                'is_visible' => $dto->getIsVisible()
            ]
        );
    }
}
