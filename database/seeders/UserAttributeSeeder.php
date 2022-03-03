<?php

namespace Database\Seeders;

use App\Models\UserAttribute;
use Illuminate\Database\Seeder;

class UserAttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserAttribute::factory(20)->create();
    }
}
