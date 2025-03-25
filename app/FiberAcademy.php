<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FiberAcademy extends Model
{
    protected $table = 'fiber_academies';

    protected $fillable = [
        'full_name',

        'email',
        'age',
        'gender',

        'education',
        'Specialization',
        'experience_in_marketing',
        
        'phone_number',
        'residence',
        
        'join_motivation',
        'challenge_handling',
        'program_benefit',
        'commitment_question',

        'take_similar_courses',
        'courses_you_take',

        'have_disability',
        'disability_type',
        'status',
    ];
}
