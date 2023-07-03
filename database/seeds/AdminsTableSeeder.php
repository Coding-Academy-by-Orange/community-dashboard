<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'fname' => 'admin',
            'lname' => 'admin',
            'is_super' => '1',
            'component' => 'super',
        ]);
    }
}
