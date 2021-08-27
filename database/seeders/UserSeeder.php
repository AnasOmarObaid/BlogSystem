<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create users

        $users = ['anas', 'omar', 'osama'];
        foreach ($users as $index=>$user) {
            DB::table('users')->insert([
                'id' => $index+1, 
                'username' => $user,
                'full_name' => Str::random(10),
                'email' => $user . '@gmail.com',
                'password' => Hash::make('12364qq'),
            ]);
        }
    }
}
