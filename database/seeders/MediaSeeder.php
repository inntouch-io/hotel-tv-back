<?php

namespace Database\Seeders;

use Domain\Media\Entities\Media;
use Illuminate\Database\Seeder;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Media::query()->create(
            [
                'path'      => 'media/logo/',
                'name'      => 'logo',
                'extension' => 'png',
                'category'  => 'logo'
            ]
        );

        Media::query()->create(
            [
                'path'      => 'media/background/',
                'name'      => 'background',
                'extension' => 'jpg',
                'category'  => 'background'
            ]
        );

        Media::query()->create(
            [
                'path'      => 'media/screenSaver/',
                'name'      => 'screenSaver',
                'extension' => 'mp4',
                'category'  => 'screenSaver'
            ]
        );
    }
}
