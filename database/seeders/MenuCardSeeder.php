<?php

namespace Database\Seeders;

use Domain\Menus\Entities\MenuCard;
use Illuminate\Database\Seeder;

class MenuCardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MenuCard::query()->create(
            [
                'menu_id'        => 1,
                'image_id'       => 26,
                'is_visible'     => 1,
                'order_position' => 1,
            ]
        );

        MenuCard::query()->create(
            [
                'menu_id'        => 2,
                'image_id'       => 27,
                'is_visible'     => 1,
                'order_position' => 1,
            ]
        );

        MenuCard::query()->create(
            [
                'menu_id'        => 3,
                'image_id'       => 25,
                'is_visible'     => 1,
                'order_position' => 1,
            ]
        );

        MenuCard::query()->create(
            [
                'menu_id'        => 4,
                'image_id'       => 31,
                'is_visible'     => 1,
                'order_position' => 1,
            ]
        );

        MenuCard::query()->create(
            [
                'menu_id'        => 5,
                'image_id'       => 29,
                'is_visible'     => 1,
                'order_position' => 1,
            ]
        );

        MenuCard::query()->create(
            [
                'menu_id'        => 6,
                'image_id'       => 30,
                'is_visible'     => 1,
                'order_position' => 1,
            ]
        );

        MenuCard::query()->create(
            [
                'menu_id'        => 7,
                'image_id'       => 23,
                'is_visible'     => 1,
                'order_position' => 1,
            ]
        );

        MenuCard::query()->create(
            [
                'menu_id'        => 8,
                'image_id'       => 24,
                'is_visible'     => 1,
                'order_position' => 1,
            ]
        );

        MenuCard::query()->create(
            [
                'menu_id'        => 9,
                'image_id'       => 28,
                'is_visible'     => 1,
                'order_position' => 1,
            ]
        );
    }
}
