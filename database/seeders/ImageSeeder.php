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
                'path'       => 'images/modules/service',
                'extension'  => 'png',
                'hash'       => md5('images/modules/service'),
                'created_at' => Carbon::now()
            ]
        );

        DB::table('images')->insert(
            [
                'id'         => 2,
                'path'       => 'images/apps/itv',
                'extension'  => 'png',
                'hash'       => md5('images/apps/itv'),
                'created_at' => Carbon::now()
            ]
        );

        DB::table('images')->insert(
            [
                'id'         => 3,
                'path'       => 'images/apps/youtube',
                'extension'  => 'png',
                'hash'       => md5('images/apps/youtube'),
                'created_at' => Carbon::now()
            ]
        );
    }
}
