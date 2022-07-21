<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
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
                'device_id'   => 'test1',
                'device_ip'   => '10.36.105.35',
                'created_at'  => Carbon::now()
            ]
        );

        DB::table('rooms')->insert(
            [
                'id'          => 2,
                'room_number' => '18',
                'device_id'   => 'test2',
                'device_ip'   => '10.36.105.40',
                'created_at'  => Carbon::now()
            ]
        );
    }
}
