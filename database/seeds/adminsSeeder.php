<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Admin;

class adminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $components = ['digitalcenter', 'fablab', 'bigbyorange', 'codingschool', 'codingacademy','fiber_academy'];
        $fixedEmails = [
            'digitalcenter' => 'odc@orange.com',
            'fablab' => 'fablab@orange.com',
            'bigbyorange' => 'bigbyorange@orange.com',
            'codingschool' => 'codingschool@orange.com',
            'codingacademy' => 'codingacademy@orange.com',
            'fiber_academy' => 'fiber_academy@orange.com',

        ];

        foreach ($components as $component) {
            factory(Admin::class)->create([
                'email' => $fixedEmails[$component],
                'component' => $component,
                'password' => bcrypt('Orange@123'), // Fixed password
                'is_super' => 1,
                'fname' => $faker->firstName,
                'lname' => $faker->lastName,
            ]);
        }
    }
}
