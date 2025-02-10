<?php

namespace Database\Seeders;

use Domain\Iptv\Entities\IptvCountryInfo;
use Illuminate\Database\Seeder;

class IptvCountryInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        IptvCountryInfo::query()->create(
            [
                'title'      => 'Xitoy',
                'locale'     => 'uz',
                'country_id' => 1,
            ]
        );

        IptvCountryInfo::query()->create(
            [
                'title'      => 'Kitay ru',
                'locale'     => 'ru',
                'country_id' => 1,
            ]
        );

        IptvCountryInfo::query()->create(
            [
                'title'      => 'China',
                'locale'     => 'en',
                'country_id' => 1,
            ]
        );

        IptvCountryInfo::query()->create(
            [
                'title'      => 'test uz',
                'locale'     => 'uz',
                'country_id' => 2,
            ]
        );

        IptvCountryInfo::query()->create(
            [
                'title'      => 'test ru',
                'locale'     => 'ru',
                'country_id' => 2,
            ]
        );

        IptvCountryInfo::query()->create(
            [
                'title'      => 'test en',
                'locale'     => 'en',
                'country_id' => 2,
            ]
        );
    }
}
