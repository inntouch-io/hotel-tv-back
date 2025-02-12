<?php

namespace Database\Seeders;

use Domain\Rooms\Entities\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::query()->create(
            [
                'first_name'       => 'Mirfayz',
                'last_name'        => 'Nosirov',
                'telephone_number' => '+998936820017',
                'passport_number'  => 'AB8882211',
                'language'         => 'uz',
                'arrival_time'     => 1694139647,
                'departure_time'   => 1694312447,
                'room_id'          => 1
            ]
        );
    }
}
