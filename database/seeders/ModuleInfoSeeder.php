<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ModuleInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('module_infos')->insert(
            [
                'id'         => 1,
                'module_id'  => 1,
                'locale'     => 'ru',
                'name'       => 'Об отеле',
                'created_at' => Carbon::now()
            ]
        );

        DB::table('module_infos')->insert(
            [
                'id'         => 2,
                'module_id'  => 1,
                'locale'     => 'en',
                'name'       => 'About hotel',
                'created_at' => Carbon::now()
            ]
        );

        DB::table('module_infos')->insert(
            [
                'id'         => 3,
                'module_id'  => 1,
                'locale'     => 'uz',
                'name'       => 'Mehmonxona haqida',
                'created_at' => Carbon::now()
            ]
        );

        DB::table('module_infos')->insert(
            [
                'id'         => 4,
                'module_id'  => 2,
                'locale'     => 'ru',
                'name'       => 'Сообщения',
                'created_at' => Carbon::now()
            ]
        );

        DB::table('module_infos')->insert(
            [
                'id'         => 5,
                'module_id'  => 2,
                'locale'     => 'en',
                'name'       => 'Message',
                'created_at' => Carbon::now()
            ]
        );

        DB::table('module_infos')->insert(
            [
                'id'         => 6,
                'module_id'  => 2,
                'locale'     => 'uz',
                'name'       => 'Xabar',
                'created_at' => Carbon::now()
            ]
        );

        DB::table('module_infos')->insert(
            [
                'id'         => 7,
                'module_id'  => 3,
                'locale'     => 'ru',
                'name'       => 'TV',
                'created_at' => Carbon::now()
            ]
        );

        DB::table('module_infos')->insert(
            [
                'id'         => 8,
                'module_id'  => 3,
                'locale'     => 'en',
                'name'       => 'TV',
                'created_at' => Carbon::now()
            ]
        );

        DB::table('module_infos')->insert(
            [
                'id'         => 9,
                'module_id'  => 3,
                'locale'     => 'uz',
                'name'       => 'TV',
                'created_at' => Carbon::now()
            ]
        );

        DB::table('module_infos')->insert(
            [
                'id'         => 10,
                'module_id'  => 4,
                'locale'     => 'ru',
                'name'       => 'Сервис',
                'created_at' => Carbon::now()
            ]
        );

        DB::table('module_infos')->insert(
            [
                'id'         => 11,
                'module_id'  => 5,
                'locale'     => 'ru',
                'name'       => 'Куда пойти',
                'created_at' => Carbon::now()
            ]
        );

        DB::table('module_infos')->insert(
            [
                'id'         => 12,
                'module_id'  => 6,
                'locale'     => 'ru',
                'name'       => 'Приложения',
                'created_at' => Carbon::now()
            ]
        );

        DB::table('module_infos')->insert(
            [
                'id'         => 13,
                'module_id'  => 7,
                'locale'     => 'uz',
                'name'       => 'Фильмы',
                'created_at' => Carbon::now()
            ]
        );

        DB::table('module_infos')->insert(
            [
                'id'         => 14,
                'module_id'  => 8,
                'locale'     => 'ru',
                'name'       => 'Язык',
                'created_at' => Carbon::now()
            ]
        );

        DB::table('module_infos')->insert(
            [
                'id'         => 15,
                'module_id'  => 9,
                'locale'     => 'ru',
                'name'       => 'HDMI',
                'created_at' => Carbon::now()
            ]
        );

        DB::table('module_infos')->insert(
            [
                'id'         => 16,
                'module_id'  => 10,
                'locale'     => 'ru',
                'name'       => 'USB',
                'created_at' => Carbon::now()
            ]
        );

        DB::table('module_infos')->insert(
            [
                'id'         => 17,
                'module_id'  => 11,
                'locale'     => 'ru',
                'name'       => 'Wi-Fi',
                'created_at' => Carbon::now()
            ]
        );
    }
}
