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
                'lang'            => 'uz',
                'message_id'      => 1
            ]
        );

        MessageInfo::query()->create(
            [
                'title'           => 'Message ru 1',
                'description'     => 'Description ru 1',
                'longDescription' => 'Long description ru 1',
                'lang'            => 'ru',
                'message_id'      => 1
            ]
        );

        MessageInfo::query()->create(
            [
                'title'           => 'Message en 1',
                'description'     => 'Description en 1',
                'longDescription' => 'Long description en 1',
                'lang'            => 'en',
                'message_id'      => 1
            ]
        );

        MessageInfo::query()->create(
            [
                'title'           => 'Message uz 2',
                'description'     => 'Description uz 2',
                'longDescription' => 'Long description uz 2',
                'lang'            => 'uz',
                'message_id'      => 2
            ]
        );

        MessageInfo::query()->create(
            [
                'title'           => 'Message ru 2',
                'description'     => 'Description ru 2',
                'longDescription' => 'Long description ru 2',
                'lang'            => 'ru',
                'message_id'      => 2
            ]
        );

        MessageInfo::query()->create(
            [
                'title'           => 'Message en 2',
                'description'     => 'Description en 2',
                'longDescription' => 'Long description en 2',
                'lang'            => 'en',
                'message_id'      => 2
            ]
        );
    }
}
