<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserProgress;
use App\Models\User;

class UserProgressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * This seeder creates user progress records.
     *
     * @return void
     */
    public function run()
    {
        // Fetch all users
        $users = User::all();

        foreach ($users as $user) {
            // Each user has between 0 to 20 progress records
            $progressCount = random_int(0, 20);
            
            UserProgress::factory()
                ->count($progressCount)
                ->for($user)
                ->create();
        }
    }
}
