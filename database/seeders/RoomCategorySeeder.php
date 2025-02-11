<?php

namespace Database\Seeders;

use Domain\Rooms\Entities\RoomCategory;
use Illuminate\Database\Seeder;

class RoomCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RoomCategory::query()->create(
            [
                'name' => 'Lux'
            ]
        );

        RoomCategory::query()->create(
            [
                'name' => 'Comfort'
            ]
        );

        RoomCategory::query()->create(
            [
                'name' => 'Standart'
            ]
        );
    }
}
