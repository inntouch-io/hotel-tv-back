<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
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
                'id' => 1,
                'module_slug' => 'service',
                'module_name' => 'Service',
                'module_icon' => '/images/service.png',
                'status' => 1,
                'order_position' => 0
            ]
        );
    }
}
