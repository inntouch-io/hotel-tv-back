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
                'module_slug'    => 'ob_otele',
                'module_name'    => 'Ob otele',
                'image_id'       => 1,
                'is_visible'     => 1,
                'order_position' => 1,
                'created_at'     => Carbon::now()
            ]
        );

        DB::table('modules')->insert(
            [
                'id'             => 2,
                'module_slug'    => 'service',
                'module_name'    => 'Service',
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
    }
}
