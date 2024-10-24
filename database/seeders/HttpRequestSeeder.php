<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HttpRequest;
use App\Models\User;

class HttpRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * This seeder creates HTTP request records for each user.
     *
     * @return void
     */
    public function run()
    {
        // Fetch all users
        $users = User::all();

        foreach ($users as $user) {
            // Each user has between 10 to 30 HTTP requests
            $requestCount = random_int(10, 30);
            
            HttpRequest::factory()
                ->count($requestCount)
                ->for($user)
                ->create();
        }
    }
}
