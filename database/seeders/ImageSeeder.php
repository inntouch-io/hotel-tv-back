<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert(
            [
                'id'         => 1,
                'path'       => 'images/modules/',
                'extension'  => 'png',
                'name'       => 'service',
                'created_at' => Carbon::now()
            ]
        );

        DB::table('images')->insert(
            [
                'id'         => 2,
                'path'       => 'images/apps/',
                'extension'  => 'png',
                'name'       => "itv",
                'created_at' => Carbon::now()
            ]
        );

        DB::table('images')->insert(
            [
                'id'         => 3,
                'path'       => 'images/apps/',
                'extension'  => 'png',
                'name'       => "youtube",
                'created_at' => Carbon::now()
            ]
        );
    }
}
