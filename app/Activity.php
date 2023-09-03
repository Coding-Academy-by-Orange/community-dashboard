<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    //
    protected $fillable = [
        'activity_name', 'activity_type', 'start_date', 'end_date', 'description', 'location', 'cohort', 'timeline', 'image', 'video', 'component', 'admin_id',
    ];
    
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
