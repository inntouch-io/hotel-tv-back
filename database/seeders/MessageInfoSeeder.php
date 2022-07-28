<?php

namespace Database\Seeders;

use Domain\Messages\Entities\MessageInfo;
use Illuminate\Database\Seeder;

class MessageInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MessageInfo::query()->create(
            [
                'title'           => "Xayrli tong! \n Vohidov Jahongir Tahirovich",
                'description'     => "Quvvatlanish vaqti keldi, bizni ajoyib kun kutmoqda",
                'longDescription' => "Restoranda nonushta \n 8:00 dan 11:00 gacha beriladi",
                'locale'          => 'uz',
                'message_id'      => 1
            ]
        );

        MessageInfo::query()->create(
            [
                'title'           => "Доброе утро! \n Вахидов Жахонгир Тахирович",
                'description'     => 'Пора подзарядиться, впереди нас ждет фантастический день',
                'longDescription' => "Завтрак в ресторане подают \n с 8:00 до 11:00",
                'locale'          => 'ru',
                'message_id'      => 1
            ]
        );

        MessageInfo::query()->create(
            [
                'title'           => "Good morning! \n Vakhidov Jahongir Takhirovich",
                'description'     => "Its time to recharge, we have a fantastic day ahead of us",
                "longDescription" => "Breakfast at the restaurant is served \n from 8:00 to 11:00",
                'locale'          => 'en',
                'message_id'      => 1
            ]
        );

        MessageInfo::query()->create(
            [
                'title'           => "Bugun dasturda \n “Olov bilan raqs” kechki shou",
                'description'     => "Avanes Musanche Capito baleti shousi Bugun olov yoqadi!",
                'longDescription' => "Jadval \n 8:00 dan 11:00 gacha",
                'locale'          => 'uz',
                'message_id'      => 2
            ]
        );

        MessageInfo::query()->create(
            [
                'title'           => "Сегодня в программе \n Вечернее шоу “Танцы с огнем”",
                'description'     => "Шоу Балет “Аванес Мусанче Капито” Cегодня даст огня!",
                'longDescription' => "Расписание \n с 8:00 до 11:00",
                'locale'          => 'ru',
                'message_id'      => 2
            ]
        );

        MessageInfo::query()->create(
            [
                'title'           => "Today in the program \n Evening show “Dancing with Fire”",
                'description'     => "Show Ballet “Avanes Musanche Capito” Today will give fire!",
                'longDescription' => "Schedule \n from 8:00 to 11:00",
                'locale'          => 'en',
                'message_id'      => 2
            ]
        );
    }
}
