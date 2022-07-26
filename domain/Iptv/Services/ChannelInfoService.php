<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 26.07.2022 / 10:16
 */

namespace Domain\Iptv\Services;

use Domain\Iptv\Builders\ChannelInfoBuilder;

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


}
