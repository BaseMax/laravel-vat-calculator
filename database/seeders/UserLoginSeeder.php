<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserLogin;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserLoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        $users->each(function ($user) {
            $loginDate = Carbon::now()->subDays(rand(1, 90));

            if (rand(0, 15) > 2) {
                UserLogin::factory()->create([
                    'user_id' => $user->id,
                    'created_at' => $loginDate,
                    'updated_at' => $loginDate,
                ]);
            }
        });
    }
}
