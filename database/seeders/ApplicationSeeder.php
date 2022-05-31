<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('applications')->insert(
            [
                'id'             => 1,
                'name'           => 'YouTube',
                'image_id'       => 4,
                'url'            => 'https://www.youtube.com',
                'is_visible'     => 1,
                'order_position' => 1,
                'created_at'     => Carbon::now()
            ]
        );

        DB::table('applications')->insert(
            [
                'id'             => 2,
                'name'           => 'iTV',
                'image_id'       => 5,
                'url'            => 'https://itv.uz',
                'is_visible'     => 1,
                'order_position' => 2,
                'created_at'     => Carbon::now()
            ]
        );
    }
}
