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
                'title'          => 'MessageCardInfo uz 1',
                'description'    => 'MessageCardInfo desc uz 1',
                'subDescription' => 'MessageCardInfo sub desc uz 1',
                'card_id'        => '1',
                'locale'         => 'uz',
            ]
        );

        MessageCardInfo::query()->create(
            [
                'title'          => 'MessageCardInfo ru 1',
                'description'    => 'MessageCardInfo desc ru 1',
                'subDescription' => 'MessageCardInfo sub desc ru 1',
                'card_id'        => '1',
                'locale'         => 'ru',
            ]
        );

        MessageCardInfo::query()->create(
            [
                'title'          => 'MessageCardInfo en 1',
                'description'    => 'MessageCardInfo desc en 1',
                'subDescription' => 'MessageCardInfo sub desc en 1',
                'card_id'        => '1',
                'locale'         => 'en',
            ]
        );
    }
}
