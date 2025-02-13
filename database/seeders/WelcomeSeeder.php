<?php

namespace Database\Seeders;

use Domain\Welcome\Entities\Welcome;
use Illuminate\Database\Seeder;

class WelcomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Welcome::query()->create(
            [
                'title' => "Hurmatli mijoz",
                'text' => "Bizning mehmonxonamizda golishni tanlaganingizdan xursandmiz. Sini samimiy kutib olamiz va biz bilan bo'lgan vaqtingiz maroqli va qulay o'tishiga ishonamiz. Agar sizning qulayligingiz uchun qo'shimcha xizmat kerak bo'la, iltimos, qabulxonamizbilan bog laning.",
                'slogan' => 'We Arel HILTON We Are HOSPITALTY',
                'language' => 'uz',
            ]
        );
    }
}
