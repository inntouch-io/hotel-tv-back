<?php

namespace Database\Seeders;

use Domain\Messages\Entities\Message;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Message::query()->create(
            [
                'image_id'       => 18,
                'is_visible'     => 1,
                'order_position' => 1,
                'category'       => 'food'
            ]
        );

        Message::query()->create(
            [
                'image_id'       => 19,
                'is_visible'     => 1,
                'order_position' => 2,
                'category'       => 'event'
            ]
        );
    }
}
