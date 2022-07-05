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
                'name'       => 'hotel',
                'created_at' => Carbon::now()
            ]
        );

        DB::table('images')->insert(
            [
                'id'         => 2,
                'path'       => 'images/modules/',
                'extension'  => 'png',
                'name'       => 'message',
                'created_at' => Carbon::now()
            ]
        );

        DB::table('images')->insert(
            [
                'id'         => 3,
                'path'       => 'images/modules/',
                'extension'  => 'png',
                'name'       => 'tv',
                'created_at' => Carbon::now()
            ]
        );

        DB::table('images')->insert(
            [
                'id'         => 4,
                'path'       => 'images/modules/',
                'extension'  => 'png',
                'name'       => 'service',
                'created_at' => Carbon::now()
            ]
        );

        DB::table('images')->insert(
            [
                'id'         => 5,
                'path'       => 'images/modules/',
                'extension'  => 'png',
                'name'       => 'where-to-go',
                'created_at' => Carbon::now()
            ]
        );

        DB::table('images')->insert(
            [
                'id'         => 6,
                'path'       => 'images/modules/',
                'extension'  => 'png',
                'name'       => 'application',
                'created_at' => Carbon::now()
            ]
        );

        DB::table('images')->insert(
            [
                'id'         => 7,
                'path'       => 'images/modules/',
                'extension'  => 'png',
                'name'       => 'films',
                'created_at' => Carbon::now()
            ]
        );

        DB::table('images')->insert(
            [
                'id'         => 8,
                'path'       => 'images/modules/',
                'extension'  => 'png',
                'name'       => 'language',
                'created_at' => Carbon::now()
            ]
        );

        DB::table('images')->insert(
            [
                'id'         => 9,
                'path'       => 'images/modules/',
                'extension'  => 'png',
                'name'       => 'hdmi',
                'created_at' => Carbon::now()
            ]
        );

        DB::table('images')->insert(
            [
                'id'         => 10,
                'path'       => 'images/modules/',
                'extension'  => 'png',
                'name'       => 'usb',
                'created_at' => Carbon::now()
            ]
        );

        DB::table('images')->insert(
            [
                'id'         => 11,
                'path'       => 'images/modules/',
                'extension'  => 'png',
                'name'       => 'wifi',
                'created_at' => Carbon::now()
            ]
        );

//        DB::table('images')->insert(
//            [
//                'id'         => 4,
//                'path'       => 'images/apps/',
//                'extension'  => 'png',
//                'name'       => "itv",
//                'created_at' => Carbon::now()
//            ]
//        );
//
//        DB::table('images')->insert(
//            [
//                'id'         => 5,
//                'path'       => 'images/apps/',
//                'extension'  => 'png',
//                'name'       => "youtube",
//                'created_at' => Carbon::now()
//            ]
//        );
    }
}
