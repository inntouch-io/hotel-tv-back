<?php

namespace Database\Seeders;

use Domain\Menus\Entities\MenuCardInfo;
use Illuminate\Database\Seeder;

class MenuCardInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MenuCardInfo::query()->create(
            [
                'title'          => 'Restoran',
                'description'    => 'Restoran',
                'subDescription' => 'Restoran',
                'card_id'        => 1,
                'locale'         => 'uz',
            ]
        );

        MenuCardInfo::query()->create(
            [
                'title'          => 'Ресторан',
                'description'    => 'Ресторан',
                'subDescription' => 'Ресторан',
                'card_id'        => 1,
                'locale'         => 'ru',
            ]
        );

        MenuCardInfo::query()->create(
            [
                'title'          => 'Restaurant',
                'description'    => 'Restaurant',
                'subDescription' => 'Restaurant',
                'card_id'        => 1,
                'locale'         => 'en',
            ]
        );

        MenuCardInfo::query()->create(
            [
                'title'          => '“Qizil sharsharalari - soya” sayohati',
                'description'    => '“Qizil sharsharalari - soya” sayohati',
                'subDescription' => '“Qizil sharsharalari - soya” sayohati',
                'card_id'        => 2,
                'locale'         => 'uz',
            ]
        );

        MenuCardInfo::query()->create(
            [
                'title'          => 'Тур “Водопады Qizil - Soy”',
                'description'    => 'Тур “Водопады Qizil - Soy”',
                'subDescription' => 'Тур “Водопады Qizil - Soy”',
                'card_id'        => 2,
                'locale'         => 'ru',
            ]
        );

        MenuCardInfo::query()->create(
            [
                'title'          => 'Tour “Waterfalls Qizil - Soy”',
                'description'    => 'Tour “Waterfalls Qizil - Soy”',
                'subDescription' => 'Tour “Waterfalls Qizil - Soy”',
                'card_id'        => 2,
                'locale'         => 'en',
            ]
        );

        MenuCardInfo::query()->create(
            [
                'title'          => 'Golf',
                'description'    => 'Golf',
                'subDescription' => 'Golf',
                'card_id'        => 3,
                'locale'         => 'uz',
            ]
        );

        MenuCardInfo::query()->create(
            [
                'title'          => 'Гольф',
                'description'    => 'Гольф',
                'subDescription' => 'Гольф',
                'card_id'        => 3,
                'locale'         => 'ru',
            ]
        );

        MenuCardInfo::query()->create(
            [
                'title'          => 'Golf',
                'description'    => 'Golf',
                'subDescription' => 'Golf',
                'card_id'        => 3,
                'locale'         => 'en',
            ]
        );

        MenuCardInfo::query()->create(
            [
                'title'          => 'Ovqatga buyurtma bering',
                'description'    => 'Ovqatga buyurtma bering',
                'subDescription' => 'Ovqatga buyurtma bering',
                'card_id'        => 4,
                'locale'         => 'uz',
            ]
        );

        MenuCardInfo::query()->create(
            [
                'title'          => 'Заказать еду',
                'description'    => 'Заказать еду',
                'subDescription' => 'Заказать еду',
                'card_id'        => 4,
                'locale'         => 'ru',
            ]
        );

        MenuCardInfo::query()->create(
            [
                'title'          => 'Order food',
                'description'    => 'Order food',
                'subDescription' => 'Order food',
                'card_id'        => 4,
                'locale'         => 'en',
            ]
        );

        MenuCardInfo::query()->create(
            [
                'title'          => 'Xonani tozalash',
                'description'    => 'Xonani tozalash',
                'subDescription' => 'Xonani tozalash',
                'card_id'        => 5,
                'locale'         => 'uz',
            ]
        );

        MenuCardInfo::query()->create(
            [
                'title'          => 'Уборка номера',
                'description'    => 'Уборка номера',
                'subDescription' => 'Уборка номера',
                'card_id'        => 5,
                'locale'         => 'ru',
            ]
        );

        MenuCardInfo::query()->create(
            [
                'title'          => 'Room cleaning',
                'description'    => 'Room cleaning',
                'subDescription' => 'Room cleaning',
                'card_id'        => 5,
                'locale'         => 'en',
            ]
        );

        MenuCardInfo::query()->create(
            [
                'title'          => 'Konsyerj qongirogi',
                'description'    => 'Konsyerj qongirogi',
                'subDescription' => 'Konsyerj qongirogi',
                'card_id'        => 6,
                'locale'         => 'uz',
            ]
        );

        MenuCardInfo::query()->create(
            [
                'title'          => 'Вызов консьержа',
                'description'    => 'Вызов консьержа',
                'subDescription' => 'Вызов консьержа',
                'card_id'        => 6,
                'locale'         => 'ru',
            ]
        );

        MenuCardInfo::query()->create(
            [
                'title'          => 'Concierge call',
                'description'    => 'Concierge call',
                'subDescription' => 'Concierge call',
                'card_id'        => 6,
                'locale'         => 'en',
            ]
        );

        MenuCardInfo::query()->create(
            [
                'title'          => 'Akvapark',
                'description'    => 'Akvapark',
                'subDescription' => 'Akvapark',
                'card_id'        => 7,
                'locale'         => 'uz',
            ]
        );

        MenuCardInfo::query()->create(
            [
                'title'          => 'Аквапарк',
                'description'    => 'Аквапарк',
                'subDescription' => 'Аквапарк',
                'card_id'        => 7,
                'locale'         => 'ru',
            ]
        );

        MenuCardInfo::query()->create(
            [
                'title'          => 'Aquapark',
                'description'    => 'Aquapark',
                'subDescription' => 'Aquapark',
                'card_id'        => 7,
                'locale'         => 'en',
            ]
        );

        MenuCardInfo::query()->create(
            [
                'title'          => 'Akvarium',
                'description'    => 'Akvarium',
                'subDescription' => 'Akvarium',
                'card_id'        => 8,
                'locale'         => 'uz',
            ]
        );

        MenuCardInfo::query()->create(
            [
                'title'          => 'Аквариум',
                'description'    => 'Аквариум',
                'subDescription' => 'Аквариум',
                'card_id'        => 8,
                'locale'         => 'ru',
            ]
        );

        MenuCardInfo::query()->create(
            [
                'title'          => 'Aquarium',
                'description'    => 'Aquarium',
                'subDescription' => 'Aquarium',
                'card_id'        => 8,
                'locale'         => 'en',
            ]
        );

        MenuCardInfo::query()->create(
            [
                'title'          => 'Teatr',
                'description'    => 'Teatr',
                'subDescription' => 'Teatr',
                'card_id'        => 9,
                'locale'         => 'uz',
            ]
        );

        MenuCardInfo::query()->create(
            [
                'title'          => 'Театр',
                'description'    => 'Театр',
                'subDescription' => 'Театр',
                'card_id'        => 9,
                'locale'         => 'ru',
            ]
        );

        MenuCardInfo::query()->create(
            [
                'title'          => 'Theater',
                'description'    => 'Theater',
                'subDescription' => 'Theater',
                'card_id'        => 9,
                'locale'         => 'en',
            ]
        );
    }
}
