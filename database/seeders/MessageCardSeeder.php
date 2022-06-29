<?php

namespace Database\Seeders;

use Domain\Messages\Entities\MessageCard;
use Illuminate\Database\Seeder;

class MessageCardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MessageCard::query()->create(
            [
                'message_id'     => 1,
                'image_id'       => 1,
                'is_visible'     => 1,
                'order_position' => 1
            ]
        );

        MessageCard::query()->create(
            [
                'message_id'     => 1,
                'image_id'       => 2,
                'is_visible'     => 1,
                'order_position' => 2
            ]
        );

        MessageCard::query()->create(
            [
                'message_id'     => 2,
                'image_id'       => 1,
                'is_visible'     => 1,
                'order_position' => 3
            ]
        );

        MessageCard::query()->create(
            [
                'message_id'     => 2,
                'image_id'       => 2,
                'is_visible'     => 1,
                'order_position' => 4
            ]
        );
    }
}
