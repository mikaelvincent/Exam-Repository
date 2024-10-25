<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * This seeder creates both registered and guest users.
     *
     * @return void
     */
    public function run()
    {
        // Create 10 registered users
        User::factory()
            ->registered()
            ->count(10)
            ->create();

        // Create 20 guest users
        User::factory()
            ->guest()
            ->count(20)
            ->create();
    }
}
