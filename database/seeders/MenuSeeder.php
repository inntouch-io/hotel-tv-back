<?php

namespace Database\Seeders;

use Domain\Menus\Entities\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Menu::query()->create(
            [
                'image_id' => 1,
                'type' => 'serviceMenu',
                'is_visible' => 1,
                'order_position' => 1,
                'category' => 'place'
            ]
        );

        Menu::query()->create(
            [
                'image_id' => 2,
                'type' => 'serviceMenu',
                'is_visible' => 0,
                'order_position' => 2,
                'category' => 'service'
            ]
        );

        Menu::query()->create(
            [
                'image_id' => 3,
                'type' => 'whereToGo',
                'is_visible' => 1,
                'order_position' => 3,
                'category' => 'place'
            ]
        );
    }
}
