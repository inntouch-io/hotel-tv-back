<?php

namespace Database\Seeders;

use Domain\Iptv\Entities\IptvChannelInfo;
use Illuminate\Database\Seeder;

class IptvChannelInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        IptvChannelInfo::query()->create(
            [
                'title'      => 'O\'zbekiston',
                'locale'     => 'uz',
                'channel_id' => 1,
            ]
        );

        IptvChannelInfo::query()->create(
            [
                'title'      => 'Ўзбекистон',
                'locale'     => 'ru',
                'channel_id' => 1,
            ]
        );

        IptvChannelInfo::query()->create(
            [
                'title'      => 'Uzbekistan',
                'locale'     => 'en',
                'channel_id' => 1,
            ]
        );

        IptvChannelInfo::query()->create(
            [
                'title'      => 'MY5',
                'locale'     => 'uz',
                'channel_id' => 2,
            ]
        );

        IptvChannelInfo::query()->create(
            [
                'title'      => 'MY5',
                'locale'     => 'ru',
                'channel_id' => 2,
            ]
        );

        IptvChannelInfo::query()->create(
            [
                'title'      => 'MY5',
                'locale'     => 'en',
                'channel_id' => 2,
            ]
        );

        IptvChannelInfo::query()->create(
            [
                'title'      => 'Sevimli',
                'locale'     => 'uz',
                'channel_id' => 3,
            ]
        );

        IptvChannelInfo::query()->create(
            [
                'title'      => 'Sevimli',
                'locale'     => 'ru',
                'channel_id' => 3,
            ]
        );

        IptvChannelInfo::query()->create(
            [
                'title'      => 'Sevimli',
                'locale'     => 'en',
                'channel_id' => 3,
            ]
        );

        IptvChannelInfo::query()->create(
            [
                'title'      => 'Yoshlar',
                'locale'     => 'uz',
                'channel_id' => 4,
            ]
        );

        IptvChannelInfo::query()->create(
            [
                'title'      => 'Yoshlar',
                'locale'     => 'ru',
                'channel_id' => 4,
            ]
        );

        IptvChannelInfo::query()->create(
            [
                'title'      => 'Yoshlar',
                'locale'     => 'en',
                'channel_id' => 4,
            ]
        );
    }
}
