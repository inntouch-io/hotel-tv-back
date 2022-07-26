<?php

namespace App\Core\Api\Validates\IptvChannels;


use App\Core\Validates;

/**
 * Class ChannelDetailRequest.php
 *
 * @package App\Core\Api\Validates\IptvChannels  *
 * @nickname <alphazet>
 * @author Otabek Davronbekov <davronbekov.otabek@gmail.com>
 *
 * Date: 26/07/22
 */
class ChannelDetailRequest extends Validates
{
    public function rules()
    {
        return [
            'channelId' => 'required',
        ];
    }
}
