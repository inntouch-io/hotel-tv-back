<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 26.07.2022 / 10:16
 */

namespace Domain\Iptv\Builders;

use Closure;
use Domain\Iptv\Dto\ChannelInfoDto;
use Domain\Iptv\Entities\IptvChannelInfo;

/**
 * Class ChannelInfoBuilder
 * @package Domain\Iptv\Builders
 */
class ChannelInfoBuilder
{
    /**
     * @return ChannelInfoBuilder
     */
    public static function getInstance(): ChannelInfoBuilder
    {
        return new static();
    }

    public function store(ChannelInfoDto $dto)
    {
        return IptvChannelInfo::query()->create(
            [
                'title'      => $dto->getTitle(),
                'locale'     => $dto->getLocale(),
                'channel_id' => $dto->getChannelId()
            ]
        );
    }

    public function update(IptvChannelInfo $info, ChannelInfoDto $dto)
    {
        $info->update(
            [
                'title' => $dto->getTitle()
            ]
        );
    }

    public function takeBy(Closure $closure)
    {
        return $closure(IptvChannelInfo::query())->first();
    }
}
