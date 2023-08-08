<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BigbyOrange extends Model
{
    protected $table = 'bigbyorange_users';
    protected $fillable = [
        'describe_the_effect',
        'business_opportunities',
        'specify_units',
        'expectations',
        'consent_to_receiving',
        'Startup',
        'Startup_Name',
        'Website',
        'Social_Media',
        'problem_your_startup',
        'describe_your_solution',
        'MVP_Demo',
        'startup_registered',
        'registration_number',
        'startup_serve',
        'Funds',
        'source_funds',
        'amount_of_funds',
        'new_funds',
        'markets',
        'revenue',
        'milestones_and_achievements',
        'father_name',
        'first_name',
        'last_name',
        'grandfather_name',
        'linkedin_profile',
        'birthday',
        'gender',
        'email',
        'mobile',
        'residence',
        'education',
        'employment',
        'person_with_disability',
        'Male_Co_Founders',
        'Female_Co_Founders',
        'Position',
        'ProvideOfPosition',
        'evaluation_purposes',
        'national_id',
        'passport_number',
        'major_study'
    ];
}
