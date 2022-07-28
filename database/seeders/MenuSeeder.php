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
                'image_id' => 26,
                'type' => 'aboutMenu',
                'is_visible' => 1,
                'order_position' => 1,
                'category' => 'place'
            ]
        );

        Menu::query()->create(
            [
                'image_id' => 27,
                'type' => 'aboutMenu',
                'is_visible' => 1,
                'order_position' => 2,
                'category' => 'place'
            ]
        );

        Menu::query()->create(
            [
                'image_id' => 25,
                'type' => 'aboutMenu',
                'is_visible' => 1,
                'order_position' => 3,
                'category' => 'place'
            ]
        );

        Menu::query()->create(
            [
                'image_id' => 31,
                'type' => 'serviceMenu',
                'is_visible' => 1,
                'order_position' => 1,
                'category' => 'service'
            ]
        );

        Menu::query()->create(
            [
                'image_id' => 29,
                'type' => 'serviceMenu',
                'is_visible' => 1,
                'order_position' => 2,
                'category' => 'service'
            ]
        );

        Menu::query()->create(
            [
                'image_id' => 30,
                'type' => 'serviceMenu',
                'is_visible' => 1,
                'order_position' => 3,
                'category' => 'service'
            ]
        );

        Menu::query()->create(
            [
                'image_id' => 23,
                'type' => 'whereToGo',
                'is_visible' => 1,
                'order_position' => 1,
                'category' => 'place'
            ]
        );

        Menu::query()->create(
            [
                'image_id' => 24,
                'type' => 'whereToGo',
                'is_visible' => 1,
                'order_position' => 2,
                'category' => 'place'
            ]
        );

        Menu::query()->create(
            [
                'image_id' => 28,
                'type' => 'whereToGo',
                'is_visible' => 1,
                'order_position' => 3,
                'category' => 'place'
            ]
        );
    }
}
