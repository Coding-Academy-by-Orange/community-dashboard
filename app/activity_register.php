<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class activity_register extends Model
{
    protected $fillable = ['first_name','father_name','grandfather_name','last_name','nationality','gender','email','national_id','passport_number','age','mobile','residence','education','employment','other_nationalty','component','admin_id','activity_id'];
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
    
    public function activity()
    {
        return $this->belongsTo(Activity::class, 'activity_id');
    }
}
