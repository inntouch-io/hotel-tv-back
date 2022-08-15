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
                'name'           => 'Cinerama',
                'image_id'       => 16,
                'url'            => 'uz.turontelecom.cinerama',
                'apk_file'       => '/apkFiles/cinerama.apk',
                'is_visible'     => 1,
                'order_position' => 1,
                'created_at'     => Carbon::now()
            ]
        );

        DB::table('applications')->insert(
            [
                'id'             => 2,
                'name'           => 'iTV',
                'image_id'       => 17,
                'url'            => 'uz.i_tv.player',
                'apk_file'       => '/apkFiles/app-release.apk',
                'is_visible'     => 1,
                'order_position' => 2,
                'created_at'     => Carbon::now()
            ]
        );
    }
}
