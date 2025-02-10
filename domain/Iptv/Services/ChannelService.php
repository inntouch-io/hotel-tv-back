<?php

/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 25.07.2022 / 14:16
 */

namespace Domain\Iptv\Services;

use Domain\Images\Entities\Image;
use Domain\Images\Services\ImageService;
use Domain\Iptv\Builders\ChannelBuilder;
use Domain\Iptv\Dto\ChannelDto;
use Domain\Iptv\Entities\IptvChannel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use RuntimeException;

/**
 * Class ChannelService
 * @package Domain\Iptv\Services
 */
class ChannelService
{
    const CATALOG = 'channels';

    protected ChannelBuilder $builder;

    /**
     * @param ChannelBuilder $builder
     */
    public function __construct(ChannelBuilder $builder)
    {
        $this->builder = $builder;
    }

    /**
     * @return ChannelService
     */
    public static function getInstance(): ChannelService
    {
        return new static(ChannelBuilder::getInstance());
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
        $countryId = $request->input('countryId');

        return $this->builder->getItems(function (Builder $builder) use ($language, $countryId) {
            return $builder
                ->join('iptv_channel_infos', 'iptv_channel_infos.channel_id', '=', 'iptv_channels.id')
                ->where('iptv_channel_infos.locale', '=', $language)
                ->where('iptv_channels.is_visible', '=', 1)
                ->when(!empty($countryId) && $countryId != 1, function ($query) use ($countryId) {
                    return $query->where('iptv_channels.country_id', '=', $countryId);
                })
                ->orderBy('iptv_channels.order_position', 'asc')
                ->select([
                    'iptv_channels.*',
                    'iptv_channel_infos.title as name',
                ])
                ->distinct();
        }, $itemsPerPage);
    }

    public function getItem(Request $request, $language)
    {
        return $this->builder->takeBy(function (Builder $builder) use ($request, $language) {
            return $builder
                ->where('iptv_channels.id', '=', $request->input('channelId'))
                ->join('iptv_channel_infos', 'iptv_channel_infos.channel_id', '=', 'iptv_channels.id')
                ->where('iptv_channel_infos.locale', '=', $language)
                ->where('iptv_channels.is_visible', '=', 1)
                ->orderBy('iptv_channels.order_position', 'asc')
                ->select([
                    'iptv_channels.*',
                    'iptv_channel_infos.title as name',
                ])
                ->distinct();
        });
    }

    public function store(Request $request)
    {
        $data = $this->validator($request);

        $country_id = (int) $data['country_id'];
        if (!isset($country_id) || empty($country_id)) {
            return redirect()->back()->withErrors('Country is required');
        }

        $slug = string_to_slug($data['title']);

        /** @var bool $channelExists */
        $channelExists = $this->builder->exists(function (Builder $builder) use ($slug) {
            return $builder->where('slug', '=', $slug);
        });

        if ($channelExists) {
            throw new RuntimeException('Title of channel exists');
        }

        if (isset($data['image'])) {
            /** @var Image $image */
            $image = ImageService::getInstance()->upload($request, self::CATALOG);
        } else {
            throw new RuntimeException('Image not found');
        }

        $channel = $this->builder->takeBy(function (Builder $builder) {
            return $builder->latest('order_position');
        });

        $order_position = !is_null($channel) ? ($channel['order_position'] + 1) : 1;

        $this->builder->store(new ChannelDto(
            $data['title'],
            $slug,
            $data['stream_url'],
            $country_id,
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

    public function update(IptvChannel $channel, Request $request)
    {
        $data = $this->validator($request);

        $country_id = (int) $data['country_id'];
        if (!isset($country_id) || empty($country_id)) {
            return redirect()->back()->withErrors('Country is required');
        }

        $slug = string_to_slug($data['title']);

        /** @var bool $channelExists */
        $channelExists = $this->builder->exists(function (Builder $builder) use ($slug) {
            return $builder->where('slug', '=', $slug);
        });

        if ($channelExists && ($channel->getSlug() !== $slug)) {
            throw new RuntimeException('Title of channel exists');
        }
        $imageId = $channel->getImageId();

        if (isset($data['image'])) {
            /** @var Image $image */
            $image = ImageService::getInstance()->upload($request, self::CATALOG);

            $imageId = $image->getId();
        }

        $this->builder->update($channel, new ChannelDto(
            $data['title'],
            $slug,
            $data['stream_url'],
            $country_id,
            $imageId,
            isset($data['isVisible']) ? 1 : 0,
        ));
    }

    /**
     * @param array $channels
     * @return void
     */
    public function sorting(array $channels = [])
    {
        foreach ($channels as $index => $data) {
            IptvChannel::query()->whereKey($data['id'])->update(
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
            'stream_url' => 'required|string',
            'isVisible'  => 'nullable|int',
            'country_id' => 'required|int'
        ];

        if ($request->route()->getName() === 'admin.iptv.channel.store') {
            $rules['image'] = 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
        } elseif ($request->route()->getName() === 'admin.iptv.channel.update') {
            $rules['image'] = 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
        }

        return $request->validate($rules);
    }
}
