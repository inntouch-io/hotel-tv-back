<?php

namespace Database\Seeders;

use Domain\Admins\Entities\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert(
            [
                'id'         => 1,
                'full_name'  => 'Otabek Davronbekov',
                'username'   => 'alphazet',
                'password'   => Hash::make('superpassword'),
                'last_ip'    => '0.0.0.0',
                'last_login' => 0,
                'role'       => 'su',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        // DB::table('admins')->insert(
        //     [
        //         'id'         => 2,
        //         'full_name'  => 'Mirfayz Nasirov',
        //         'username'   => 'nasirov0017',
        //         'password'   => Hash::make('superpassword'),
        //         'last_ip'    => '0.0.0.0',
        //         'last_login' => 0,
        //         'role'       => 'su',
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ]
        // );

        Admin::query()->insert(
            [
                'id'         => 2,
                'full_name'  => 'Orziyev Farrux',
                'username'   => 'farrux',
                'password'   => Hash::make('superpassword'),
                'last_ip'    => '0.0.0.0',
                'last_login' => 0,
                'role'       => 'su',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );
    }
}
