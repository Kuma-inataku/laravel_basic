<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class VideosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'title' => Str::random(10),
            'url' =>  'https//'.Str::random(10).'com',
        ];
        DB::table('videos')->insert($data);
    }
}
