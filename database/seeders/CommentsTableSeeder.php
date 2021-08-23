<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'body' => Str::random(20),
            'commentable_id' => 1,
            'commentable_type' => null,
        ];
        DB::table('comments')->insert($data);
    }
}
