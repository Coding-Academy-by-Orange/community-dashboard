<?php

use Illuminate\Database\Seeder;
use App\User;
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
            factory(User::class)->create([
                'first_name' => $faker->name,
                'father_name' => $faker->name,
                'grandfather_name' => $faker->name,
                'last_name' => $faker->name,
                'ar_first_name' => $faker->name,
                'ar_father_name' => $faker->name,
                'ar_grandfather_name' => $faker->name,
                'ar_last_name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'mobile' => $faker->unique()->phoneNumber,
                'birthdate' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'gender' => $faker->randomElement(['male', 'female']),
                'residence' => $faker->randomElement(['Amman', 'Zarqa', 'Irbid', 'Ajloun', 'Jerash', 'Mafraq', 'Balqa', 'Madaba', 'Karak', 'Tafilah', "Ma'an", 'Aqaba']),
                'education' => $faker->randomElement(['Below Tawjihi', 'Tawjihi', 'Diploma', 'Undergraduate', 'Graduate']),
            ]);
        }
    }
}
