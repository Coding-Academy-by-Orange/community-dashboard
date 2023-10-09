<?php

use Illuminate\Database\Seeder;
use App\codingSchool;
use Faker\Generator as Faker;

class CodingSchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            factory(codingSchool::class)->create([
                'first_name' => $faker->name,
                'father_name' => $faker->name,
                'grandfather_name' => $faker->name,
                'last_name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'mobile' => $faker->unique()->phoneNumber,
                'birthdate' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'gender' => $faker->randomElement(['male', 'female']),
                'education' => $faker->randomElement(['Below Tawjihi', 'Tawjihi', 'Diploma', 'Undergraduate', 'Graduate']),
            ]);
        }
    }
}
