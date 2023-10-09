<?php

use Illuminate\Database\Seeder;
use App\BigbyOrange;
use Faker\Generator as Faker;

class bigbyorange_usrersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $startupData = $faker->randomElement([
            "Startup is based in or operates from Jordan",
            "Startup has at least 1 Jordanian founder",
            "Other exercises",
        ]);
        for ($i=0; $i<10; $i++) {
            factory(BigbyOrange::class)->create([
                'evaluation_purposes'=>'Yes',
                'first_name' => $faker->name,
                'father_name' => $faker->name,
                'grandfather_name' => $faker->name,
                'last_name' => $faker->name,
                'linkedin_profile' => $faker->unique()->url,

                'nationality'=>$faker->randomElement(['Jordanian','NoneJordanian']),
                'gender' => $faker->randomElement(['Male', 'Female']),
                'email' => $faker->unique()->safeEmail,
                'birthdate' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'mobile' => $faker->unique()->phoneNumber,
                'residence' => $faker->randomElement(['Amman', 'Zarqa', 'Irbid', 'Ajloun', 'Jerash', 'Mafraq', 'Balqa', 'Madaba', 'Karak', 'Tafilah', "Ma'an", 'Aqaba']),
                'education' => $faker->randomElement(['Below Tawjihi', 'Tawjihi', 'Diploma', 'Undergraduate', 'Graduate']),
                'employment' => $faker->randomElement(['Part-Time', 'Full-Time', 'Self-Employed', 'Unemployed']),

                'person_with_disability' => $faker->randomElement(['Yes', 'No']),
                'Male_Co_Founders' => $faker->randomElement(['1', '2', '3', '4']),
                'Female_Co_Founders' => $faker->randomElement(['1', '2', '3', '4']),
                'Position' => $faker->randomElement(['CEO', '', 'CTO', 'VP', 'CHRO']),
                'ProvideOfPosition' => $faker->sentence,
                'Startup' => $startupData,
                'Startup_Name' => $faker->unique()->name,
                'Website' => $faker->url,
                'Social_Media' => $faker->url,
                'problem_your_startup' => $faker->paragraph,
                'describe_your_solution' => $faker->paragraph,
                'MVP_Demo' => $faker->url,
                'startup_registered' => $faker->randomElement(['GCC', 'Jordan', 'Europe', 'BVI', 'North America', 'Not Registered']),
                'registration_number' => $faker->uuid(),
                'startup_serve' => $faker->randomElement(['E-commerce', 'Cyber Security', 'Digital Fabrication', 'AgriTech', 'FintTech', 'Construction & Manufacturing', 'Social Media', 'Travel & Tourism', 'Data, AI & ML', 'Gaming', 'Entertainment', 'Creative', 'HealthTech', 'SportsTech', 'Blockchain', 'IOT', 'Supply Chain & Logistics', 'FoodTech', 'Utility & Energy', 'Retail', 'Other']),
                'Funds' => $faker->numberBetween(500, 10000),
                'source_funds' => $faker->paragraph,
                'amount_of_funds' => $faker->sentence,
                'new_funds' => $faker->sentence,
                'markets' => $faker->randomElement([
                    "Jordan",
                    "GCC",
                    "North Africa",
                    "Africa",
                    "India",
                    "Rest of Asia",
                    "Europe",
                    "Oceania",
                    "South America",
                    "Central America",
                    "North America","Other"
                ]),
                'revenue' => $faker->numberBetween(10000, 30000),
                'milestones_and_achievements' => $faker->paragraph,
                'describe_the_effect' => $faker->paragraph,
                'business_opportunities' => $faker->paragraph,
                'specify_units' => $faker->sentence,
                'expectations' => $faker->sentence,
                'consent_to_receiving' => $faker->randomElement(['Yes', 'No'])
            ]);}


    }
}
