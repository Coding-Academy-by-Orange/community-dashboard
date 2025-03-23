<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ODCTrainer extends Model
{

    protected $fillable = [
        'trainer_name',
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
    ];
}
