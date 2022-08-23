<?php

namespace Database\Seeders;

use Domain\Gallery\Entities\Gallery;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gallery::query()->create(
            [
                'image_id'       => 34,
                'is_visible'     => 1,
                'order_position' => 1
            ]
        );

        Gallery::query()->create(
            [
                'image_id'       => 35,
                'is_visible'     => 1,
                'order_position' => 2
            ]
        );

        Gallery::query()->create(
            [
                'image_id'       => 36,
                'is_visible'     => 1,
                'order_position' => 3
            ]
        );
    }
}
