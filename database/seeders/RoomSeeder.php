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
                'room_status' => 'free',
                'category_id' => '1',
                'device_id'   => 'test1',
                'device_ip'   => '10.36.105.35',
                'is_active' => 0,
                'created_at'  => Carbon::now()
            ]
        );

        DB::table('rooms')->insert(
            [
                'id'          => 2,
                'room_number' => '18',
                'room_status' => 'free',
                'category_id' => '1',
                'device_id'   => 'test2',
                'device_ip'   => '10.36.105.40',
                'is_active' => 1,
                'created_at'  => Carbon::now()
            ]
        );

        DB::table('rooms')->insert(
            [
                'id'          => 3,
                'room_number' => '77',
                'room_status' => 'free',
                'category_id' => '1',
                'device_id'   => 'test',
                'device_ip'   => '10.36.105.66',
                'is_active' => 1,
                'created_at'  => Carbon::now()
            ]
        );
    }
}
