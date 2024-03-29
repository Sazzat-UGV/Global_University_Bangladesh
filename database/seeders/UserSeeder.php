<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //create Admin
        $adminRoleId = Role::where('role_slug', 'admin')->first()->id;
        User::Create([
            'role_id' => $adminRoleId,
            'name' => 'Esrat Jahan Akhi',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin@gmail.com'),
            'is_deleteable' => false,
            'remember_token' => Str::random(10),
        ]);

        //create Manager
        $managerRoleId = Role::where('role_slug', 'manager')->first()->id;
        User::Create([
            'role_id' => $managerRoleId,
            'name' => 'Prome Akon',
            'email' => 'manager@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('manager@gmail.com'),
            'remember_token' => Str::random(10),
        ]);
    }
}
