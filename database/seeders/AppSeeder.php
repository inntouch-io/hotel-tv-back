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
        DB::table('module_infos')->insert(
            [
                'id'         => 1,
                'name'       => 'YouTube',
                'image'      => '',
                'url'        => '',
                'created_at' => Carbon::now()
            ]
        );
    }
}
