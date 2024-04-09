<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::where('name', 'admin')->first();
        $userRole = Role::where('name', 'user')->first();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@test.net',
            // 'password' => Hash::make('password'),
        ])->roles()->attach($adminRole);

        User::factory()->create([
            'name' => 'User',
            'email' => 'user@test.net',
            // 'password' => Hash::make('password'),
        ])->roles()->attach($userRole);
    }
}
