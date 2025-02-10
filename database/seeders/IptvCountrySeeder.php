<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Domain\Iptv\Entities\IptvCountry;
use Illuminate\Database\Seeder;

class IptvCountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        IptvCountry::query()->create(
            [
                'title'          => 'China',
                'is_visible'     => 1,
                'order_position' => 1,
                'image_id'       => 12,
                'created_at'     => Carbon::now()
            ]
        );

        IptvCountry::query()->create(
            [
                'title'          => 'Uzbekistan',
                'is_visible'     => 1,
                'order_position' => 2,
                'image_id'       => 14,
                'created_at'     => Carbon::now()
            ]
        );
    }
}
