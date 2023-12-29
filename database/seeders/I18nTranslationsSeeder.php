<?php

namespace Database\Seeders;

use App\Models\I18n;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

function get_dic ($path) {
    $file = file_get_contents($path);
    $file = json_decode($file)->translation;
    return $file;
}

class I18nTranslationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $keys = I18n::all()->pluck('key')->toArray();

        $app_path = str_replace('\\', '/', app_path());
        $files = glob($app_path . '/../database/seeders/data/*.json');

        foreach($files as $file) {
            if (str_contains($file, 'i18n_keys.json')) continue;

            $dict = get_dic($file);
            $filename = pathinfo($file)['filename'];

            foreach($keys as &$key) {
                DB::table('i18n_translations')->insert([
                    'i18n_key' => $key,
                    'locale' => $filename,
                    'message' => $dict->{$key},
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
            }
        }
    }
}
