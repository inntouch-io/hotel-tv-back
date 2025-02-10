<?php

namespace Database\Seeders;

use Domain\Foods\Entities\FoodCategory;
use Domain\Foods\Entities\FoodSubCategory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(
            [
                AdminSeeder::class,
                ImageSeeder::class,
                ModuleSeeder::class,
                ModuleInfoSeeder::class,
                ApplicationSeeder::class,
                MessageSeeder::class,
                MessageInfoSeeder::class,
                MessageCardSeeder::class,
                MessageCardInfoSeeder::class,
                MenuSeeder::class,
                MenuInfoSeeder::class,
                MenuCardSeeder::class,
                MenuCardInfoSeeder::class,
                IptvCountrySeeder::class,
                IptvCountryInfoSeeder::class,
                IptvChannelSeeder::class,
                IptvChannelInfoSeeder::class,
                AppVersionSeeder::class,
                GallerySeeder::class,
                MediaSeeder::class,
                RoomSeeder::class,
                UserSeeder::class
            ]
        );
    }
}
