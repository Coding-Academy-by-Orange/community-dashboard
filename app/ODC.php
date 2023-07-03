<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ODC extends Model
{
    protected $table = 'digitalcenter_users';
    protected $fillable = ['first_name','father_name','grandfather_name','last_name','nationality','gender','email','national_id','passport_number','age','mobile','residence','education','employment','center','obstacles','type_of_obstacles','programming'];
}
