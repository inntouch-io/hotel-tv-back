<?php

namespace Database\Seeders;

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
                ImageSeeder::class,
                ModuleSeeder::class,
                ModuleInfoSeeder::class,
                ApplicationSeeder::class,
                UserSeeder::class,
                RoomSeeder::class,
                UserRoomSeeder::class
            ]
        );
    }
}
