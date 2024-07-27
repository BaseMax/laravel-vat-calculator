<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (User::count() !== 0) {
            return;
        }

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'is_admin' => UserRole::ADMIN()->value,
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'is_admin' => UserRole::USER()->value,
            'password' => Hash::make('password'),
        ]);

        User::factory(40)->create();
    }
}
