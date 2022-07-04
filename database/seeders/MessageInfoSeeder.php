<?php

namespace Database\Seeders;

use Domain\Messages\Entities\MessageInfo;
use Illuminate\Database\Seeder;

class MessageInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MessageInfo::query()->create(
            [
                'title'           => 'Message uz 1',
                'description'     => 'Description uz 1',
                'longDescription' => 'Long description uz 1',
                'locale'          => 'uz',
                'message_id'      => 1
            ]
        );

        MessageInfo::query()->create(
            [
                'title'           => 'Message ru 1',
                'description'     => 'Description ru 1',
                'longDescription' => 'Long description ru 1',
                'locale'          => 'ru',
                'message_id'      => 1
            ]
        );

        MessageInfo::query()->create(
            [
                'title'           => 'Message en 1',
                'description'     => 'Description en 1',
                'longDescription' => 'Long description en 1',
                'locale'          => 'en',
                'message_id'      => 1
            ]
        );

        MessageInfo::query()->create(
            [
                'title'           => 'Message uz 2',
                'description'     => 'Description uz 2',
                'longDescription' => 'Long description uz 2',
                'locale'          => 'uz',
                'message_id'      => 2
            ]
        );

        MessageInfo::query()->create(
            [
                'title'           => 'Message ru 2',
                'description'     => 'Description ru 2',
                'longDescription' => 'Long description ru 2',
                'locale'          => 'ru',
                'message_id'      => 2
            ]
        );

        MessageInfo::query()->create(
            [
                'title'           => 'Message en 2',
                'description'     => 'Description en 2',
                'longDescription' => 'Long description en 2',
                'locale'          => 'en',
                'message_id'      => 2
            ]
        );
    }
}
