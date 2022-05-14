<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rooms')->insert(
            [
                'id'          => 1,
                'room_number' => '17',
                'device_id'   => '1asdasd717',
                'created_at'  => Carbon::now()
            ]
        );

        DB::table('rooms')->insert(
            [
                'id'          => 2,
                'room_number' => '18',
                'device_id'   => '1da71sadasfgasg7',
                'created_at'  => Carbon::now()
            ]
        );
    }
}
