<?php

namespace Database\Seeders;

use App\Models\GeoIP;
use App\Models\Request;
use App\Models\User;
use App\Models\UsersRequests;
use Exception;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use function randomDate;

class RequestsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $totalRequests = 700;

        $requests = [];

        try {
            DB::beginTransaction();

            for ($i = 0; $i < $totalRequests; $i++) {
                $request = Request::factory()->make();

                $requests[] = Request::firstOrCreate($request->toArray());
            }

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();

            throw $e;
        }

        $users = User::all();

        foreach ($requests as $request) {
            try {
                $user = $users->random();

                DB::beginTransaction();

                for ($i = 0; $i < rand(1, 10); $i++) {
                    $faker = Faker::create();
                    $ip = $faker->ipv4 ?? '';

                    $existingIP = GeoIP::where('ip', $ip)->first();
                    if (! $existingIP) {
                        $ipCountry = getCountryCode($ip);

                        $existingIP = GeoIP::create([
                            'ip' => $ip,
                            'country' => $ipCountry,
                        ]);
                    }

                    UsersRequests::create([
                        'user_id' => $user->id,
                        'request_id' => $request->id,
                        'created_at' => randomDate(),
                        'ip_id' => $existingIP->id,
                    ]);
                }

                DB::commit();
            } catch (Exception $e) {
                DB::rollBack();

                throw $e;
            }
        }
    }
}
