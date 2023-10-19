<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(adminsSeeder::class);
        // $this->call(bigbyorange_usrersSeeder::class);
        // $this->call(FablabUsersSeeder::class);
        // $this->call(ODCSeeder::class);
        // $this->call(CodingSchoolSeeder::class);
        // $this->call(activitiesSeeder::class);
        // $this->call(LocationSeeder::class);
    }
}
