<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

function get_dic_keys ($path) {
    $file = file_get_contents($path);
    $keys = json_decode($file);
    return $keys;
}

class I18nSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $app_path = str_replace('\\', '/', app_path());
        $keys = get_dic_keys($app_path . '/../database/seeders/data/i18n_keys.json');

        foreach ($keys as &$key) {
            DB::table('i18n')->insert([
                'key' => $key,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
