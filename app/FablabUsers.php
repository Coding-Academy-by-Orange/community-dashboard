<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FablabUsers extends Model
{
    protected $fillable = ['first_name','father_name','grandfather_name','last_name','nationality','affiliation','gender','email','national_id','passport_number','age','mobile','whatsaap','residence','education','employment','program','technology_type','idea_description'];
}
