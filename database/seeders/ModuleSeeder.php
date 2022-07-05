<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modules')->insert(
            [
                'id'             => 1,
                'module_slug'    => 'about-hotel',
                'module_name'    => 'About hotel',
                'image_id'       => 1,
                'is_visible'     => 1,
                'order_position' => 1,
                'created_at'     => Carbon::now()
            ]
        );

        DB::table('modules')->insert(
            [
                'id'             => 2,
                'module_slug'    => 'message',
                'module_name'    => 'Message',
                'image_id'       => 2,
                'is_visible'     => 1,
                'order_position' => 2,
                'created_at'     => Carbon::now()
            ]
        );

        DB::table('modules')->insert(
            [
                'id'             => 3,
                'module_slug'    => 'tv',
                'module_name'    => 'TV',
                'image_id'       => 3,
                'is_visible'     => 1,
                'order_position' => 3,
                'created_at'     => Carbon::now()
            ]
        );

        DB::table('modules')->insert(
            [
                'id'             => 4,
                'module_slug'    => 'service',
                'module_name'    => 'Service',
                'image_id'       => 4,
                'is_visible'     => 1,
                'order_position' => 4,
                'created_at'     => Carbon::now()
            ]
        );

        DB::table('modules')->insert(
            [
                'id'             => 5,
                'module_slug'    => 'where-to-go',
                'module_name'    => 'Where to go',
                'image_id'       => 5,
                'is_visible'     => 1,
                'order_position' => 5,
                'created_at'     => Carbon::now()
            ]
        );

        DB::table('modules')->insert(
            [
                'id'             => 6,
                'module_slug'    => 'application',
                'module_name'    => 'Application',
                'image_id'       => 6,
                'is_visible'     => 1,
                'order_position' => 6,
                'created_at'     => Carbon::now()
            ]
        );

        DB::table('modules')->insert(
            [
                'id'             => 7,
                'module_slug'    => 'films',
                'module_name'    => 'Films',
                'image_id'       => 7,
                'is_visible'     => 1,
                'order_position' => 7,
                'created_at'     => Carbon::now()
            ]
        );

        DB::table('modules')->insert(
            [
                'id'             => 8,
                'module_slug'    => 'language',
                'module_name'    => 'Language',
                'image_id'       => 8,
                'is_visible'     => 1,
                'order_position' => 8,
                'created_at'     => Carbon::now()
            ]
        );

        DB::table('modules')->insert(
            [
                'id'             => 9,
                'module_slug'    => 'hdmi',
                'module_name'    => 'HDMI',
                'image_id'       => 9,
                'is_visible'     => 1,
                'order_position' => 9,
                'created_at'     => Carbon::now()
            ]
        );

        DB::table('modules')->insert(
            [
                'id'             => 10,
                'module_slug'    => 'usb',
                'module_name'    => 'USB',
                'image_id'       => 10,
                'is_visible'     => 1,
                'order_position' => 10,
                'created_at'     => Carbon::now()
            ]
        );

        DB::table('modules')->insert(
            [
                'id'             => 11,
                'module_slug'    => 'wi-fi',
                'module_name'    => 'Wi-Fi',
                'image_id'       => 11,
                'is_visible'     => 1,
                'order_position' => 11,
                'created_at'     => Carbon::now()
            ]
        );
    }
}
