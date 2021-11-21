<?php

namespace Database\Seeders;

use App\Models\UserAttribute;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserAttributesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::get();

        foreach($users as $user){
            $names = explode(' ', $user->name);
            $lastName = $names[0];
            $firstName = $names[1];
            DB::table('userattribute')->insert([
                'last_name' => $lastName,
                'fisrt_name' => $firstName,
            ]);
        }
    }
}
