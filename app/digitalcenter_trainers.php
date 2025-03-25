<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class digitalcenter_trainers extends Model
{

    protected $fillable = [
        'trainer_name',
        'trainer_phone',
        'trainer_email',
        'organization',
        'digital_center',
        'governorate',
        'courses',
        'career_months',
        'career_days',
        'career_topics',
        'soft_months',
        'soft_days',
        'topics',
        'digital_topics',
        'entre_months',
        'entre_days',
        'entre_topics',
        'freelance_months',
        'freelance_days',
        'freelance_topics',
        'other_months',
        'other_days',
        'other_topics',
        'other',
    ];

    // Ensure JSON fields are cast properly
    protected $casts = [
        'courses' => 'array',
        'career_months' => 'array',
        'career_topics' => 'array',
        'soft_months' => 'array',
        'topics' => 'array',
        'digital_topics' => 'array',
        'entre_months' => 'array',
        'entre_topics' => 'array',
        'freelance_months' => 'array',
        'freelance_topics' => 'array',
        'other_months' => 'array',
        'other_topics' => 'array',
    ];
}