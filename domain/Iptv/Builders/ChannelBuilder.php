<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 25.07.2022 / 14:16
 */

namespace Domain\Iptv\Builders;

use Closure;
use Domain\Iptv\Dto\ChannelDto;
use Domain\Iptv\Entities\IptvChannel;

/**
 * Class ChannelBuilder
 * @package Domain\Iptv\Builders
 */
class ChannelBuilder
{
    /**
     * @return ChannelBuilder
     */
    public static function getInstance(): ChannelBuilder
    {
        return new static();
    }

    public function list(Closure $closure)
    {
        return $closure(IptvChannel::query())->get();
    }

    public function takeBy(Closure $closure)
    {
        return $closure(IptvChannel::query())->first();
    }

    public function exists(Closure $closure)
    {
        return $closure(IptvChannel::query())->exists();
    }

    public function store(ChannelDto $dto)
    {
        return IptvChannel::query()->create(
            [
                'title'          => $dto->getTitle(),
                'slug'           => $dto->getSlug(),
                'stream_url'     => $dto->getStreamUrl(),
                'image_id'       => $dto->getImageId(),
                'is_visible'     => $dto->getIsVisible(),
                'order_position' => $dto->getOrderPosition()
            ]
        );
    }

    public function update(IptvChannel $channel, ChannelDto $dto)
    {
        $channel->update(
            [
                'title'      => $dto->getTitle(),
                'slug'       => $dto->getSlug(),
                'stream_url' => $dto->getStreamUrl(),
                'image_id'   => $dto->getImageId(),
                'is_visible' => $dto->getIsVisible()
            ]
        );
    }
}
