<?php

namespace Database\Seeders;

use Domain\AppVersions\Entities\AppVersion;
use Illuminate\Database\Seeder;

class AppVersionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AppVersion::query()->create(
            [
                'app_system' => 'android',
                'app_type' => 'tv',
                'app_version' => '100',
                'apk_file' => '/apkFiles/cinerama.apk'
            ]
        );
    }
}
