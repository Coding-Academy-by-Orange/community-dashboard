<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class codingSchool extends Model
{
    //

    protected $fillable = [
        'first_name',
        'father_name',
        'grandfather_name',
        'last_name',
        'email',
        'mobile',
        'birthdate',
        'gender',
        'residence',
        'nationality',
        'governorate',
        'university',
        'education',
        'major_study',
        'other_major',
        'academic_year',
        'employment_status',
        'technologies',
        'other_technologies',
        'reason_to_join',
        'availability',
        'affordability',
        'status',
    ];
}
