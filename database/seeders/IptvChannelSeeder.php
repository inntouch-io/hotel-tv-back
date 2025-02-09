<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Domain\Iptv\Entities\IptvChannel;
use Illuminate\Database\Seeder;

class IptvChannelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        IptvChannel::query()->create(
            [
                'slug'           => 'uzbekistan',
                'title'          => 'O\'zbekiston',
                'stream_url'     => 'https://api.itv.uz/hls/iptv/1001/index.m3u8?type=live&traffic=&token=alphazet',
                'is_visible'     => 1,
                'order_position' => 1,
                'image_id'       => 12,
                'country_id'     => 1,
                'created_at'     => Carbon::now()
            ]
        );

        IptvChannel::query()->create(
            [
                'slug'           => 'my5',
                'title'          => 'MY5',
                'stream_url'     => 'https://api.itv.uz/hls/iptv/1091/index.m3u8?type=live&traffic=&token=alphazet',
                'is_visible'     => 1,
                'order_position' => 2,
                'country_id'     => 1,
                'image_id'       => 14,
                'created_at'     => Carbon::now()
            ]
        );

        IptvChannel::query()->create(
            [
                'slug'           => 'sevimli',
                'title'          => 'Sevimli',
                'stream_url'     => 'https://api.itv.uz/hls/iptv/1056/index.m3u8?type=live&traffic=&token=alphazet',
                'is_visible'     => 1,
                'order_position' => 3,
                'image_id'       => 13,
                'country_id'     => 1,
                'created_at'     => Carbon::now()
            ]
        );

        IptvChannel::query()->create(
            [
                'slug'           => 'yoshlar',
                'title'          => 'Yoshlar',
                'stream_url'     => 'https://api.itv.uz/hls/iptv/1002/index.m3u8?type=live&traffic=&token=alphazet',
                'is_visible'     => 1,
                'order_position' => 4,
                'image_id'       => 15,
                'country_id'     => 1,
                'created_at'     => Carbon::now()
            ]
        );

        IptvChannel::query()->create(
            [
                'slug'           => 'kinoteatr',
                'title'          => 'Kinoteatr',
                'stream_url'     => 'https://api.itv.uz/hls/iptv/1009/index.m3u8?type=live&traffic=&token=alphazet',
                'is_visible'     => 1,
                'order_position' => 5,
                'image_id'       => 32,
                'country_id'     => 1,
                'created_at'     => Carbon::now()
            ]
        );
    }
}
