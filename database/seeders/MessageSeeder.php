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
                'image_id' => 4
            ]
        );

        Message::query()->create(
            [
                'image_id' => 5
            ]
        );
    }
}
