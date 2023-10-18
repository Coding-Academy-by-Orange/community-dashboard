<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\location;
class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        
            factory(location::class)->create([
                'name' => $faker->name,
                'governorate' => 'amman',
                'component' => 'fablab',
                
            ]);
        
    }
}
