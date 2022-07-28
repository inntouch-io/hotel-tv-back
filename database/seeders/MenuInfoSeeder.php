<?php

namespace Database\Seeders;

use Domain\Menus\Entities\MenuInfo;
use Illuminate\Database\Seeder;

class MenuInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MenuInfo::query()->create(
            [
                'menu_id' => 1,
                'title'   => 'Restoran',
                'locale'  => 'uz',
            ]
        );

        MenuInfo::query()->create(
            [
                'menu_id' => 1,
                'title'   => 'Ресторан',
                'locale'  => 'ru',
            ]
        );

        MenuInfo::query()->create(
            [
                'menu_id' => 1,
                'title'   => 'Restaurant',
                'locale'  => 'en',
            ]
        );

        MenuInfo::query()->create(
            [
                'menu_id' => 2,
                'title'   => '“Qizil sharsharalari - soya” sayohati',
                'locale'  => 'uz',
            ]
        );

        MenuInfo::query()->create(
            [
                'menu_id' => 2,
                'title'   => 'Тур “Водопады Qizil - Soy”',
                'locale'  => 'ru',
            ]
        );

        MenuInfo::query()->create(
            [
                'menu_id' => 2,
                'title'   => 'Tour “Waterfalls Qizil - Soy”',
                'locale'  => 'en',
            ]
        );

        MenuInfo::query()->create(
            [
                'menu_id' => 3,
                'title'   => 'Golf',
                'locale'  => 'uz',
            ]
        );

        MenuInfo::query()->create(
            [
                'menu_id' => 3,
                'title'   => 'Гольф',
                'locale'  => 'ru',
            ]
        );

        MenuInfo::query()->create(
            [
                'menu_id' => 3,
                'title'   => 'Golf',
                'locale'  => 'en',
            ]
        );

        MenuInfo::query()->create(
            [
                'menu_id' => 4,
                'title'   => 'Ovqatga buyurtma bering',
                'locale'  => 'uz',
            ]
        );

        MenuInfo::query()->create(
            [
                'menu_id' => 4,
                'title'   => 'Заказать еду',
                'locale'  => 'ru',
            ]
        );

        MenuInfo::query()->create(
            [
                'menu_id' => 4,
                'title'   => 'Order food',
                'locale'  => 'en',
            ]
        );

        MenuInfo::query()->create(
            [
                'menu_id' => 5,
                'title'   => 'Xonani tozalash',
                'locale'  => 'uz',
            ]
        );

        MenuInfo::query()->create(
            [
                'menu_id' => 5,
                'title'   => 'Уборка номера',
                'locale'  => 'ru',
            ]
        );

        MenuInfo::query()->create(
            [
                'menu_id' => 5,
                'title'   => 'Room cleaning',
                'locale'  => 'en',
            ]
        );

        MenuInfo::query()->create(
            [
                'menu_id' => 6,
                'title'   => 'Konsyerj qongirogi',
                'locale'  => 'uz',
            ]
        );

        MenuInfo::query()->create(
            [
                'menu_id' => 6,
                'title'   => 'Вызов консьержа',
                'locale'  => 'ru',
            ]
        );

        MenuInfo::query()->create(
            [
                'menu_id' => 6,
                'title'   => 'Concierge call',
                'locale'  => 'en',
            ]
        );

        MenuInfo::query()->create(
            [
                'menu_id' => 7,
                'title'   => 'Akvapark',
                'locale'  => 'uz',
            ]
        );

        MenuInfo::query()->create(
            [
                'menu_id' => 7,
                'title'   => 'Аквапарк',
                'locale'  => 'ru',
            ]
        );

        MenuInfo::query()->create(
            [
                'menu_id' => 7,
                'title'   => 'Aquapark',
                'locale'  => 'en',
            ]
        );

        MenuInfo::query()->create(
            [
                'menu_id' => 8,
                'title'   => 'Akvarium',
                'locale'  => 'uz',
            ]
        );

        MenuInfo::query()->create(
            [
                'menu_id' => 8,
                'title'   => 'Аквариум',
                'locale'  => 'ru',
            ]
        );

        MenuInfo::query()->create(
            [
                'menu_id' => 8,
                'title'   => 'Aquarium',
                'locale'  => 'en',
            ]
        );

        MenuInfo::query()->create(
            [
                'menu_id' => 9,
                'title'   => 'Teatr',
                'locale'  => 'uz',
            ]
        );

        MenuInfo::query()->create(
            [
                'menu_id' => 9,
                'title'   => 'Театр',
                'locale'  => 'ru',
            ]
        );

        MenuInfo::query()->create(
            [
                'menu_id' => 9,
                'title'   => 'Theater',
                'locale'  => 'en',
            ]
        );
    }
}
