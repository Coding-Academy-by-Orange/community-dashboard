<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\ODC;

class ODCSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            factory(ODC::class)->create([
                'first_name' => $faker->name,
                'father_name' => $faker->name,
                'grandfather_name' => $faker->name,
                'last_name' => $faker->name,
                'gender' => $faker->randomElement(['Male', 'Female']),
                'nationality' => $faker->randomElement(['Jordanian', 'NoneJordanian']),
                'email' => $faker->unique()->safeEmail,
                'birthdate' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'residence' => $faker->randomElement(['Amman', 'Zarqa', 'Irbid', 'Ajloun', 'Jerash', 'Mafraq', 'Balqa', 'Madaba', 'Karak', 'Tafilah', "Ma'an", 'Aqaba']),
                'mobile' => $faker->unique()->phoneNumber,
                'employment' => $faker->randomElement(['Part-Time', 'Full-Time', 'Self-Employed', 'Unemployed']),
                'education' => $faker->randomElement(['Below Tawjihi', 'Tawjihi', 'Diploma', 'Undergraduate', 'Graduate']),
                'center' => $faker->randomElement(['Amman', 'Zarqa', 'Irbid', 'Ajloun', 'Jerash', 'Mafraq', 'Balqa', 'Madaba', 'Karak', 'Tafilah', "Ma'an", 'Aqaba']),
                'obstacles' => $faker->randomElement(['Yes', 'No']),
                'programming' => $faker->randomElement([
                    "Career planning and development programme",
                    "Digital culture",
                    "Life Skills",
                    "Leadership and innovation skills",
                    "Functional skills",
                    "Other exercises",
                ]),
                'news' => $faker->randomElement(['Yes', 'No'])
            ]);
        }
    }
}
