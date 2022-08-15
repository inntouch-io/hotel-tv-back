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

        DB::table('images')->insert(
            [
                'id'         => 12,
                'path'       => 'images/channels/',
                'extension'  => 'png',
                'name'       => "uzbekistan",
                'created_at' => Carbon::now()
            ]
        );

        DB::table('images')->insert(
            [
                'id'         => 13,
                'path'       => 'images/channels/',
                'extension'  => 'png',
                'name'       => "sevimli",
                'created_at' => Carbon::now()
            ]
        );

        DB::table('images')->insert(
            [
                'id'         => 14,
                'path'       => 'images/channels/',
                'extension'  => 'png',
                'name'       => "my5",
                'created_at' => Carbon::now()
            ]
        );

        DB::table('images')->insert(
            [
                'id'         => 15,
                'path'       => 'images/channels/',
                'extension'  => 'png',
                'name'       => "yoshlar",
                'created_at' => Carbon::now()
            ]
        );

        DB::table('images')->insert(
            [
                'id'         => 16,
                'path'       => 'images/applications/',
                'extension'  => 'png',
                'name'       => "cinerama",
                'created_at' => Carbon::now()
            ]
        );

        DB::table('images')->insert(
            [
                'id'         => 17,
                'path'       => 'images/applications/',
                'extension'  => 'png',
                'name'       => "itv",
                'created_at' => Carbon::now()
            ]
        );

        DB::table('images')->insert(
            [
                'id'         => 18,
                'path'       => 'images/messages/',
                'extension'  => 'png',
                'name'       => "breakfast",
                'created_at' => Carbon::now()
            ]
        );

        DB::table('images')->insert(
            [
                'id'         => 19,
                'path'       => 'images/messages/',
                'extension'  => 'png',
                'name'       => "nightShow",
                'created_at' => Carbon::now()
            ]
        );

        DB::table('images')->insert(
            [
                'id'         => 20,
                'path'       => 'images/messageCards/',
                'extension'  => 'png',
                'name'       => "euroBreakfast",
                'created_at' => Carbon::now()
            ]
        );

        DB::table('images')->insert(
            [
                'id'         => 21,
                'path'       => 'images/messageCards/',
                'extension'  => 'png',
                'name'       => "franceBreakfast",
                'created_at' => Carbon::now()
            ]
        );

        DB::table('images')->insert(
            [
                'id'         => 22,
                'path'       => 'images/messageCards/',
                'extension'  => 'png',
                'name'       => "russianBreakfast",
                'created_at' => Carbon::now()
            ]
        );

        DB::table('images')->insert(
            [
                'id'         => 23,
                'path'       => 'images/menus/',
                'extension'  => 'png',
                'name'       => "akvapark",
                'created_at' => Carbon::now()
            ]
        );

        DB::table('images')->insert(
            [
                'id'         => 24,
                'path'       => 'images/menus/',
                'extension'  => 'png',
                'name'       => "akvarium",
                'created_at' => Carbon::now()
            ]
        );

        DB::table('images')->insert(
            [
                'id'         => 25,
                'path'       => 'images/menus/',
                'extension'  => 'png',
                'name'       => "golf",
                'created_at' => Carbon::now()
            ]
        );

        DB::table('images')->insert(
            [
                'id'         => 26,
                'path'       => 'images/menus/',
                'extension'  => 'png',
                'name'       => "restoran",
                'created_at' => Carbon::now()
            ]
        );

        DB::table('images')->insert(
            [
                'id'         => 27,
                'path'       => 'images/menus/',
                'extension'  => 'png',
                'name'       => "soy",
                'created_at' => Carbon::now()
            ]
        );

        DB::table('images')->insert(
            [
                'id'         => 28,
                'path'       => 'images/menus/',
                'extension'  => 'png',
                'name'       => "teatr",
                'created_at' => Carbon::now()
            ]
        );

        DB::table('images')->insert(
            [
                'id'         => 29,
                'path'       => 'images/menus/',
                'extension'  => 'png',
                'name'       => "uborka",
                'created_at' => Carbon::now()
            ]
        );

        DB::table('images')->insert(
            [
                'id'         => 30,
                'path'       => 'images/menus/',
                'extension'  => 'png',
                'name'       => "vizov",
                'created_at' => Carbon::now()
            ]
        );

        DB::table('images')->insert(
            [
                'id'         => 31,
                'path'       => 'images/menus/',
                'extension'  => 'png',
                'name'       => "yeda",
                'created_at' => Carbon::now()
            ]
        );

        DB::table('images')->insert(
            [
                'id'         => 32,
                'path'       => 'images/channels/',
                'extension'  => 'png',
                'name'       => "kinoteatr",
                'created_at' => Carbon::now()
            ]
        );
    }
}
