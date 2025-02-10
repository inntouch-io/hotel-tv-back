<?php

/**
 * Hotel-TV.
 *
 * @author  Orziyev Farrux
 * Created: 01.02.2025 / 14:16
 */

namespace Domain\Iptv\Services;

use Domain\Images\Services\ImageService;
use Domain\Iptv\Builders\CountryBuilder;
use Domain\Iptv\Dto\CountryDto;
use Domain\Iptv\Entities\IptvCountry;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use RuntimeException;

/**
 * Class CountryService
 * @package Domain\Iptv\Services
 */
class CountryService
{
    const CATALOG = 'countries';

    protected CountryBuilder $builder;

    /**
     * @param CountryBuilder $builder
     */
    public function __construct(CountryBuilder $builder)
    {
        $this->builder = $builder;
    }

    /**
     * @return CountryService
     */
    public static function getInstance(): CountryService
    {
        return new static(CountryBuilder::getInstance());
    }

    public function list()
    {
        return $this->builder->list(function (Builder $builder) {
            return $builder->with('infos', 'image')
                ->orderBy('order_position');
        });
    }

    public function getItems(Request $request, $language = 'ru')
    {
        $itemsPerPage = $request->input('itemsPerPage', 18);

        return $this->builder->getItems(function (Builder $builder) use ($request, $language) {
            return $builder
                ->join('iptv_country_infos', 'iptv_country_infos.country_id', '=', 'iptv_countries.id')
                ->where('iptv_country_infos.locale', '=', $language)
                ->where('iptv_countries.is_visible', '=', 1)
                ->orderBy('iptv_countries.order_position', 'asc')
                ->select([
                    'iptv_countries.*',
                    'iptv_country_infos.title as name',
                ])
                ->distinct();
        }, $itemsPerPage);
    }

    // public function getItem(Request $request, $language)
    // {
    //     return $this->builder->takeBy(function (Builder $builder) use ($request, $language) {
    //         return $builder
    //             ->where('iptv_channels.id', '=', $request->input('channelId'))
    //             ->join('iptv_channel_infos', 'iptv_channel_infos.channel_id', '=', 'iptv_channels.id')
    //             ->where('iptv_channel_infos.locale', '=', $language)
    //             ->where('iptv_channels.is_visible', '=', 1)
    //             ->orderBy('iptv_channels.order_position', 'asc')
    //             ->select([
    //                 'iptv_channels.*',
    //                 'iptv_channel_infos.title as name',
    //             ])
    //             ->distinct();
    //     });
    // }

    public function store(Request $request)
    {
        $data = $this->validator($request);

        if (isset($data['image'])) {
            /** @var Image $image */
            $image = ImageService::getInstance()->upload($request, self::CATALOG);
        } else {
            throw new RuntimeException('Image not found');
        }

        $country = $this->builder->takeBy(function (Builder $builder) {
            return $builder->latest('order_position');
        });

        $order_position = !is_null($country) ? ($country['order_position'] + 1) : 1;

        $this->builder->store(new CountryDto(
            $data['title'],
            $image->getId(),
            isset($data['isVisible']) ? 1 : 0,
            $order_position
        ));
    }

    public function getById(int $id)
    {
        return $this->builder->takeBy(function (Builder $builder) use ($id) {
            return $builder->whereKey($id)->with('image');
        });
    }

    public function getWithInfos(int $id)
    {
        return $this->builder->takeBy(function (Builder $builder) use ($id) {
            return $builder->whereKey($id)->with('infos');
        });
    }

    public function update(IptvCountry $country, Request $request)
    {
        $data = $this->validator($request);

        $imageId = $country->getImageId();

        if (isset($data['image'])) {
            /** @var Image $image */
            $image = ImageService::getInstance()->upload($request, self::CATALOG);

            $imageId = $image->getId();
        }

        $this->builder->update($country, new CountryDto(
            $data['title'],
            $imageId,
            isset($data['isVisible']) ? 1 : 0,
        ));
    }

    /**
     * @param array $countries
     * @return void
     */
    public function sorting(array $countries = [])
    {
        foreach ($countries as $index => $data) {
            IptvCountry::query()->whereKey($data['id'])->update(
                [
                    'order_position' => ($index + 1)
                ]
            );
        }
    }




    // Validation

    /**
     * @param Request $request
     * @return array
     */
    public function validator(Request $request): array
    {
        $rules = [
            'title'      => 'required|string',
            'isVisible'  => 'nullable|int'
        ];

        if ($request->route()->getName() === 'admin.iptv.country.store') {
            $rules['image'] = 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
        } elseif ($request->route()->getName() === 'admin.iptv.country.update') {
            $rules['image'] = 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
        }

        return $request->validate($rules);
    }
}
