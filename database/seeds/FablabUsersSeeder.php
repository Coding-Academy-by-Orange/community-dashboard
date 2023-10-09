<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\FablabUsers;

class FablabUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            factory(FablabUsers::class)->create([
                'first_name' => $faker->name,
                'father_name' => $faker->name,
                'grandfather_name' => $faker->name,
                'last_name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'mobile' => $faker->unique()->phoneNumber,
                'birthdate' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'gender' => $faker->randomElement(['male', 'female']),
                'education' => $faker->randomElement(['Below Tawjihi', 'Tawjihi', 'Diploma', 'Undergraduate', 'Graduate']),
                'residence' => $faker->randomElement(['Amman', 'Zarqa', 'Irbid', 'Ajloun', 'Jerash', 'Mafraq', 'Balqa', 'Madaba', 'Karak', 'Tafilah', "Ma'an", 'Aqaba']),
                'employment' => $faker->randomElement(['Part-Time', 'Full-Time', 'Self-Employed', 'Unemployed']),
                'idea_description' => $faker->paragraph,
                'affiliation' => $faker->randomElement(['Fablab Amman', 'Fablab Irbid', 'Fablab Karak', 'Fablab Aqaba', 'Fablab As salt']),
                'program' => 'Innovators in Residence (IIRs)',
                'nationality' => $faker->randomElement(['Jordanian', 'NoneJordanian'])
            ]);
        }
    }
}
