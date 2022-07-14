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
                'id'             => 1,
                'menu_id'        => 1,
                'image_id'       => 1,
                'is_visible'     => 1,
                'order_position' => 1,
            ]
        );

        MenuCard::query()->create(
            [
                'id'             => 2,
                'menu_id'        => 1,
                'image_id'       => 2,
                'is_visible'     => 1,
                'order_position' => 2,
            ]
        );

        MenuCard::query()->create(
            [
                'id'             => 3,
                'menu_id'        => 2,
                'image_id'       => 3,
                'is_visible'     => 1,
                'order_position' => 3,
            ]
        );
    }
}
