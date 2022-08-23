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
                'module_id'  => 4,
                'locale'     => 'en',
                'name'       => 'Сервис',
                'created_at' => Carbon::now()
            ]
        );

        DB::table('module_infos')->insert(
            [
                'id'         => 12,
                'module_id'  => 4,
                'locale'     => 'uz',
                'name'       => 'Сервис',
                'created_at' => Carbon::now()
            ]
        );

        DB::table('module_infos')->insert(
            [
                'id'         => 13,
                'module_id'  => 5,
                'locale'     => 'ru',
                'name'       => 'Куда пойти',
                'created_at' => Carbon::now()
            ]
        );

        DB::table('module_infos')->insert(
            [
                'id'         => 14,
                'module_id'  => 5,
                'locale'     => 'en',
                'name'       => 'Куда пойти',
                'created_at' => Carbon::now()
            ]
        );

        DB::table('module_infos')->insert(
            [
                'id'         => 15,
                'module_id'  => 5,
                'locale'     => 'uz',
                'name'       => 'Куда пойти',
                'created_at' => Carbon::now()
            ]
        );

        DB::table('module_infos')->insert(
            [
                'id'         => 16,
                'module_id'  => 6,
                'locale'     => 'ru',
                'name'       => 'Приложения',
                'created_at' => Carbon::now()
            ]
        );

        DB::table('module_infos')->insert(
            [
                'id'         => 17,
                'module_id'  => 6,
                'locale'     => 'en',
                'name'       => 'Приложения',
                'created_at' => Carbon::now()
            ]
        );

        DB::table('module_infos')->insert(
            [
                'id'         => 18,
                'module_id'  => 6,
                'locale'     => 'uz',
                'name'       => 'Приложения',
                'created_at' => Carbon::now()
            ]
        );

        DB::table('module_infos')->insert(
            [
                'id'         => 19,
                'module_id'  => 7,
                'locale'     => 'ru',
                'name'       => 'Фильмы',
                'created_at' => Carbon::now()
            ]
        );

        DB::table('module_infos')->insert(
            [
                'id'         => 20,
                'module_id'  => 7,
                'locale'     => 'en',
                'name'       => 'Фильмы',
                'created_at' => Carbon::now()
            ]
        );

        DB::table('module_infos')->insert(
            [
                'id'         => 21,
                'module_id'  => 7,
                'locale'     => 'uz',
                'name'       => 'Фильмы',
                'created_at' => Carbon::now()
            ]
        );

        DB::table('module_infos')->insert(
            [
                'id'         => 22,
                'module_id'  => 8,
                'locale'     => 'ru',
                'name'       => 'Язык',
                'created_at' => Carbon::now()
            ]
        );

        DB::table('module_infos')->insert(
            [
                'id'         => 23,
                'module_id'  => 8,
                'locale'     => 'en',
                'name'       => 'Язык',
                'created_at' => Carbon::now()
            ]
        );

        DB::table('module_infos')->insert(
            [
                'id'         => 24,
                'module_id'  => 8,
                'locale'     => 'uz',
                'name'       => 'Язык',
                'created_at' => Carbon::now()
            ]
        );

        DB::table('module_infos')->insert(
            [
                'id'         => 25,
                'module_id'  => 9,
                'locale'     => 'ru',
                'name'       => 'HDMI',
                'created_at' => Carbon::now()
            ]
        );

        DB::table('module_infos')->insert(
            [
                'id'         => 26,
                'module_id'  => 9,
                'locale'     => 'en',
                'name'       => 'HDMI',
                'created_at' => Carbon::now()
            ]
        );

        DB::table('module_infos')->insert(
            [
                'id'         => 27,
                'module_id'  => 9,
                'locale'     => 'uz',
                'name'       => 'HDMI',
                'created_at' => Carbon::now()
            ]
        );

        DB::table('module_infos')->insert(
            [
                'id'         => 28,
                'module_id'  => 10,
                'locale'     => 'ru',
                'name'       => 'USB',
                'created_at' => Carbon::now()
            ]
        );

        DB::table('module_infos')->insert(
            [
                'id'         => 29,
                'module_id'  => 10,
                'locale'     => 'en',
                'name'       => 'USB',
                'created_at' => Carbon::now()
            ]
        );

        DB::table('module_infos')->insert(
            [
                'id'         => 30,
                'module_id'  => 10,
                'locale'     => 'uz',
                'name'       => 'USB',
                'created_at' => Carbon::now()
            ]
        );

        DB::table('module_infos')->insert(
            [
                'id'         => 31,
                'module_id'  => 11,
                'locale'     => 'ru',
                'name'       => 'Wi-Fi',
                'created_at' => Carbon::now()
            ]
        );

        DB::table('module_infos')->insert(
            [
                'id'         => 32,
                'module_id'  => 11,
                'locale'     => 'en',
                'name'       => 'Wi-Fi',
                'created_at' => Carbon::now()
            ]
        );

        DB::table('module_infos')->insert(
            [
                'id'         => 33,
                'module_id'  => 11,
                'locale'     => 'uz',
                'name'       => 'Wi-Fi',
                'created_at' => Carbon::now()
            ]
        );

        DB::table('module_infos')->insert(
            [
                'id'         => 34,
                'module_id'  => 12,
                'locale'     => 'ru',
                'name'       => 'Youtube',
                'created_at' => Carbon::now()
            ]
        );

        DB::table('module_infos')->insert(
            [
                'id'         => 35,
                'module_id'  => 12,
                'locale'     => 'en',
                'name'       => 'Youtube',
                'created_at' => Carbon::now()
            ]
        );

        DB::table('module_infos')->insert(
            [
                'id'         => 36,
                'module_id'  => 12,
                'locale'     => 'uz',
                'name'       => 'Youtube',
                'created_at' => Carbon::now()
            ]
        );
    }
}
