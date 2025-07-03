<?php

namespace App\Imports;

use App\BigbyOrange;
use Carbon\Carbon;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BigImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new BigbyOrange([
            'evaluation_purposes'       => $row['evaluation_purposes'],
            'first_name'                => $row['first_name'],
            'father_name'               => $row['father_name'],
            'grandfather_name'          => $row['grandfather_name'],
            'last_name'                 => $row['last_name'],
            'linkedin_profile'          => $row['linkedin_profile'],
            'nationality'               => $row['nationality'],
            'gender'                    => $row['gender'],
            'email'                     => $row['email'],
            'passport_number'           => $row['passport_number'],
            'national_id'               => $row['national_id'],
            'birthdate'                 => Carbon::parse($row['birthdate']),
            'mobile'                    => $row['mobile'],
            'residence'                 => $row['residence'],
            'education'                 => $row['education'],
            'major_study'               => $row['major_study'],
            'employment'                => $row['employment'],
            'person_with_disability'    => $row['person_with_disability'],
            'male_co_founders'          => $row['male_co_founders'],
            'female_co_founders'        => $row['female_co_founders'],
            'position'                  => $row['position'],
            'provideofposition'         => $row['provideofposition'],
            'startup'                   => serialize(explode(',', $row['startup'])),
            'startup_name'              => $row['startup_name'],
            'website'                   => $row['website'],
            'social_media'              => $row['social_media'],
            'problem_your_startup'      => serialize($row['problem_your_startup']),
            'describe_your_solution'    => $row['describe_your_solution'],
            'mvp_demo'                  => $row['mvp_demo'],
            'startup_registered'        => serialize(explode(',', $row['startup_registered'])),
            'registration_number'       => $row['registration_number'],
            'startup_serve'             => serialize(explode(',', $row['startup_serve'])),
            'funds'                     => serialize($row['funds']),
            'source_funds'              => serialize(explode(',', $row['source_funds'])),
            'amount_of_funds'           => $row['amount_of_funds'],
            'new_funds'                 => $row['new_funds'],
            'markets'                   => serialize(explode(',', $row['markets'])),
            'revenue'                   => $row['revenue'],
            'milestones_and_achievements' => serialize($row['milestones_and_achievements']),
            'describe_the_effect'       => serialize($row['describe_the_effect']),
            'business_opportunities'    => $row['business_opportunities'],
            'specify_units'             => serialize($row['specify_units']),
            'expectations'              => $row['expectations'],
            'consent_to_receiving'      => $row['consent_to_receiving'],
            'created_at'                => $row['created_at'] ?? now(),
            'updated_at'                => $row['updated_at'] ?? now(),
        ]);
    }
}
