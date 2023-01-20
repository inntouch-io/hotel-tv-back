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
                'id'             => 1,
                'first_name'     => 'Denis',
                'name'           => 'Ivanov',
                'guest_number'   => 1018,
                'guest_language' => 'en',
                'created_at'     => Carbon::now()
            ]
        );

        DB::table('users')->insert(
            [
                'id'             => 2,
                'first_name'     => 'Anvar',
                'name'           => 'Qosimov',
                'guest_number'   => 1019,
                'guest_language' => 'ru',
                'created_at'     => Carbon::now()
            ]
        );
    }
}
