<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        User::create([
            'name' => "first_admin",
            'email' => "admin1@mail.com",
            'password' => "password"
            ])->syncRoles('admin');

        User::create([
            'name' => "second_admin",
            'email' => "admin2@mail.com",
            'password' => "password"
            ])->syncRoles('admin');

        User::create([
            'name' => "operator",
            'email' => "operator@mail.com",
            'password' => "password"
        ])->syncRoles('operations');
        //
    }
}
