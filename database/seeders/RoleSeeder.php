<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $admin = Role::create([
            "name" => "admin"
        ]);
        $creator = Role::create([
            "name" => "creator"
        ]);

        $userAdmin = User::create([
            "name" => "ArabMann",
            "email" => "atirtaadrianta@gmail.com",
            "password" => bcrypt("12345678"),
            "role_id" => 1
        ]);
    }
}
