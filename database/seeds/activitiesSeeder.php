<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Activity;

class activitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            factory(Activity::class)->create([
                'activity_name' => $faker->name,
                'activity_type' => $faker->randomElement(['Registration', 'Event', 'News']),
                'start_date' => null,
                'end_date' => null,
                'publication_date' => null,
                'description' => $faker->sentence,
                'location' => $faker->randomElement(['Amman', 'Irbid', 'Zarqa', 'Balqaa', 'Aqaba', 'other']),
                'image' => json_encode($faker->randomElement(["1.jpg", '2.jpg', '3.jpg', '4.jpg', '5.jpg', '6.jpg', '7.jpg', '8.jpg', '9.jpg', '10.jpg'])),
                'video' => $faker->url,
                'timeline' => $faker->randomElement(['private', 'public']),
                'component' => $faker->randomElement(['digitalcenter', 'fablab', 'bigbyorange', 'codingschool', 'codingacademy']),
                'admin_id' => $faker->randomElement(['1', '2', '3', '4', '5']),
            ]);
        }
    }
}
