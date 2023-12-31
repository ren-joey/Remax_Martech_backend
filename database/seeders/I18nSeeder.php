<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Utils\Helpers;

class I18nSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $app_path = str_replace('\\', '/', app_path());
        $keys = Helpers::get_json(
            $app_path . '/../database/seeders/i18n/i18n_keys.json'
        );

        foreach ($keys as &$key) {
            DB::table('i18n')->insert([
                'key' => $key,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
