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
                'stream_url'     => 'asdasdsadasdasdas',
                'is_visible'     => 1,
                'order_position' => 1,
                'image_id'       => 2,
                'created_at'     => Carbon::now()
            ]
        );

        IptvChannel::query()->create(
            [
                'slug'           => 'my5',
                'title'          => 'MY5',
                'stream_url'     => 'asdasdsadasdasdas',
                'is_visible'     => 1,
                'order_position' => 2,
                'image_id'       => 3,
                'created_at'     => Carbon::now()
            ]
        );

        IptvChannel::query()->create(
            [
                'slug'           => 'sevimli',
                'title'          => 'Sevimli',
                'stream_url'     => 'asdasdsadasdasdas',
                'is_visible'     => 1,
                'order_position' => 3,
                'image_id'       => 4,
                'created_at'     => Carbon::now()
            ]
        );

        IptvChannel::query()->create(
            [
                'slug'           => 'yoshlar',
                'title'          => 'Yoshlar',
                'stream_url'     => 'asdasdsadasdasdas',
                'is_visible'     => 1,
                'order_position' => 4,
                'image_id'       => 1,
                'created_at'     => Carbon::now()
            ]
        );
    }
}
