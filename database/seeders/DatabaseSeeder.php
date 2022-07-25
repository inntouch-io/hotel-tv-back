<?php

namespace Database\Seeders;

use Domain\Messages\Entities\MessageInfo;
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
                UserSeeder::class,
                RoomSeeder::class,
                UserRoomSeeder::class,
                MessageSeeder::class,
                MessageInfoSeeder::class,
                MessageCardSeeder::class,
                MessageCardInfoSeeder::class,
                MenuSeeder::class,
                MenuCardSeeder::class,
                IptvChannelSeeder::class
            ]
        );
    }
}
