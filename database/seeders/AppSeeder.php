<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class AppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('apps')->insert(
            [
                'id'             => 1,
                'name'           => 'YouTube',
                'image_id'       => 3,
                'url'            => 'https://www.youtube.com',
                'status'         => 1,
                'order_position' => 1,
                'created_at'     => Carbon::now()
            ]
        );

        DB::table('apps')->insert(
            [
                'id'             => 2,
                'name'           => 'iTV',
                'image_id'       => 2,
                'url'            => 'https://itv.uz',
                'status'         => 1,
                'order_position' => 2,
                'created_at'     => Carbon::now()
            ]
        );
    }
}
