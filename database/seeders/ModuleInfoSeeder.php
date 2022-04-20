<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModuleInfoSeeder extends Seeder
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
                'id' => 1,
                'module_id' => 1,
                'locale' => 'ru',
                'name' => 'Об отеле'
            ]
        );

        DB::table('module_infos')->insert(
            [
                'id' => 2,
                'module_id' => 1,
                'locale' => 'en',
                'name' => 'About hotel'
            ]
        );

        DB::table('module_infos')->insert(
            [
                'id' => 3,
                'module_id' => 1,
                'locale' => 'uz',
                'name' => 'Mehmonxona haqida'
            ]
        );
    }
}
