<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComponentRegistration extends Model
{
    //
    protected $fillable = [
        'component',
        'registration_name',
        'start_date',
        'end_date',
        'type',
        'location',
        'description',
        'cohort_number',
        'status'
    ];
}
