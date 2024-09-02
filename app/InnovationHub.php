<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InnovationHub extends Model
{
    // Define the fillable fields to allow mass assignment
    protected $fillable = [
        'name',
        'email',
        'mobile',
        'gender',
        'age',
        'background',
        'disability',
        'topic',
        'entity_name',
        'entity_type',
        'tour_date',
        'visitors_numbers',
        'message',
    ];
}
