<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class UserRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_room')->insert(
            [
                'id'             => 1,
                'user_id'        => 1,
                'room_id'        => 1,
                'arrival_time'   => 1652524183,
                'departure_time' => 1659008673,
                'room_status'    => 'booked',
                'created_at'     => Carbon::now()
            ]
        );

        DB::table('user_room')->insert(
            [
                'id'             => 2,
                'user_id'        => 2,
                'room_id'        => 2,
                'arrival_time'   => 1652524183,
                'departure_time' => 1652524198,
                'room_status'    => 'booked',
                'created_at'     => Carbon::now()
            ]
        );

        DB::table('user_room')->insert(
            [
                'id'             => 3,
                'user_id'        => 2,
                'room_id'        => 1,
                'arrival_time'   => 1652524183,
                'departure_time' => 1652524198,
                'room_status'    => 'free',
                'created_at'     => Carbon::now()
            ]
        );

    }
}
