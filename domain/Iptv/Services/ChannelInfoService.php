<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 26.07.2022 / 10:16
 */

namespace Domain\Iptv\Services;

use Domain\Iptv\Builders\ChannelInfoBuilder;
use Domain\Iptv\Dto\ChannelInfoDto;
use Domain\Iptv\Entities\IptvChannelInfo;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

/**
 * Class ChannelInfoService
 * @package Domain\Iptv\Services
 */
class ChannelInfoService
{
    protected ChannelInfoBuilder $builder;

    /**
     * @param ChannelInfoBuilder $builder
     */
    public function __construct(ChannelInfoBuilder $builder)
    {
        $this->builder = $builder;
    }

    /**
     * @return ChannelInfoService
     */
    public static function getInstance(): ChannelInfoService
    {
        return new static(ChannelInfoBuilder::getInstance());
    }

    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'title'  => 'required|string',
                'locale' => 'required|in:' . implode(',', array_keys(config('app.locales'))),
            ]
        );

        return $this->builder->store(new ChannelInfoDto(
            $data['title'],
            $data['locale'],
            (int)$request->query('channel_id')
        ));
    }

    public function update(IptvChannelInfo $info, Request $request)
    {
        $data = $request->validate(
            [
                'title' => 'required|string'
            ]
        );

        $this->builder->update($info, new ChannelInfoDto(
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
