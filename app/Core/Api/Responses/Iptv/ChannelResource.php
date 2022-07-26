<?php

namespace App\Core\Api\Responses\Iptv;


use App\Core\Api\Resources;
use App\Core\StaticKeys;

/**
 * Class ChannelResource.php
 *
 * @package App\Core\Api\Responses\Iptv  *
 * @nickname <alphazet>
 * @author Otabek Davronbekov <davronbekov.otabek@gmail.com>
 *
 * Date: 26/07/22
 */
class ChannelResource extends Resources
{
    private static $STREAM_URL = 'streamUrl';

    public function toArray($request)
    {
        $image = $this->image ? $this->image->getUrl() : null;

        return [
            StaticKeys::$CHANNEL_ID => $this->getId(),
            StaticKeys::$CHANNEL_TITLE => $this->getName(),

            StaticKeys::$FILES => [
                StaticKeys::$IMAGE_URL => $image,
                self::$STREAM_URL => $this->getStreamUrl(),
            ]
        ];
    }
}
