<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserAttribute;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(20)->create();

        $users = User::all();
        foreach ($users as $user) {
            $userAttribute = UserAttribute::factory()->make();
            $userAttribute->age = rand(1, 99);
            $user->userAttribute()->save($userAttribute);
        }
    }
}
