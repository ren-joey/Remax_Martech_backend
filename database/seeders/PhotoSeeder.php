<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Utils\Helpers;

class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $app_path = str_replace('\\', '/', app_path());
        $photos = Helpers::get_json($app_path . '/../database/seeders/data/photos.json');

        foreach($photos as &$photo) {
            $pathinfo = pathinfo($photo);

            DB::table('assets')->insert([
                'key' => $pathinfo['filename'],
                'src' => Storage::url('photo/' . $photo),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
