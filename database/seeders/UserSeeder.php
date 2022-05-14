<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                'id'         => 1,
                'full_name'  => 'Khusan',
                'created_at' => Carbon::now()
            ]
        );

        DB::table('users')->insert(
            [
                'id'         => 2,
                'full_name'  => 'Khasan',
                'created_at' => Carbon::now()
            ]
        );
    }
}
