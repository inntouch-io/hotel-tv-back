<?php

namespace Database\Seeders;

use Domain\Messages\Entities\MessageCardInfo;
use Illuminate\Database\Seeder;

class MessageCardInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MessageCardInfo::query()->create(
            [
                'title'          => 'Yevropa nonushtasi',
                'description'    => "Evropa nonushtasi (bulochka, dudlangan kolbasa, pishloq, sariyog ', sabzavotli salat, qaynatilgan tuxum, zaytun)",
                'subDescription' => '60 000 UZS',
                'card_id'        => '1',
                'locale'         => 'uz',
            ]
        );

        MessageCardInfo::query()->create(
            [
                'title'          => 'Европейский завтрак',
                'description'    => 'Европейский завтрак (булочка,  колбаса копчёная, сыр, масло сливочное, салат овощной, яйцо вареное, оливки) ',
                'subDescription' => '60 000 UZS',
                'card_id'        => '1',
                'locale'         => 'ru',
            ]
        );

        MessageCardInfo::query()->create(
            [
                'title'          => 'European breakfast',
                'description'    => 'European breakfast (bun, smoked sausage, cheese, butter, vegetable salad, boiled egg, olives)',
                'subDescription' => '60 000 UZS',
                'card_id'        => '1',
                'locale'         => 'en',
            ]
        );

        MessageCardInfo::query()->create(
            [
                'title'          => 'Fransuz nonushtasi',
                'description'    => "Fransuz nonushtasi (bulochka, dudlangan kolbasa, pishloq, sariyog ', sabzavotli salat, qaynatilgan tuxum, zaytun)",
                'subDescription' => '70 000 UZS',
                'card_id'        => '2',
                'locale'         => 'uz',
            ]
        );

        MessageCardInfo::query()->create(
            [
                'title'          => 'Французкий завтрак',
                'description'    => 'Французкий завтрак (булочка,  колбаса копчёная, сыр, масло сливочное, салат овощной, яйцо вареное, оливки) ',
                'subDescription' => '70 000 UZS',
                'card_id'        => '2',
                'locale'         => 'ru',
            ]
        );

        MessageCardInfo::query()->create(
            [
                'title'          => 'French breakfast',
                'description'    => 'French breakfast (bun, smoked sausage, cheese, butter, vegetable salad, boiled egg, olives)',
                'subDescription' => '70 000 UZS',
                'card_id'        => '2',
                'locale'         => 'en',
            ]
        );

        MessageCardInfo::query()->create(
            [
                'title'          => 'Asal bilan pancakes',
                'description'    => "Evropa nonushtasi (bulochka, dudlangan kolbasa, pishloq, sariyog ', sabzavotli salat, qaynatilgan tuxum, zaytun)",
                'subDescription' => '40 000 UZS',
                'card_id'        => '3',
                'locale'         => 'uz',
            ]
        );

        MessageCardInfo::query()->create(
            [
                'title'          => 'Блины с медом',
                'description'    => 'Европейский завтрак (булочка,  колбаса копчёная, сыр, масло сливочное, салат овощной, яйцо вареное, оливки) ',
                'subDescription' => '40 000 UZS',
                'card_id'        => '3',
                'locale'         => 'ru',
            ]
        );

        MessageCardInfo::query()->create(
            [
                'title'          => 'Pancakes with honey',
                'description'    => 'European breakfast (bun, smoked sausage, cheese, butter, vegetable salad, boiled egg, olives)',
                'subDescription' => '40 000 UZS',
                'card_id'        => '3',
                'locale'         => 'en',
            ]
        );
    }
}
