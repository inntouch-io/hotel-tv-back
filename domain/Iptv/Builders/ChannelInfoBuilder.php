<?php
/**
 * Hotel-TV.
 *
 * @author  Mirfayz Nosirov
 * Created: 26.07.2022 / 10:16
 */

namespace Domain\Iptv\Builders;

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
}
