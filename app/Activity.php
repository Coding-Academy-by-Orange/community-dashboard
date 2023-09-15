<?php

namespace App;
use App\activity_register;
use Illuminate\Database\Eloquent\Model;


class Activity extends Model
{
    //
    protected $fillable = [
        'activity_name', 'activity_type', 'start_date', 'end_date', 'description', 'location', 'cohort', 'timeline', 'image', 'video', 'component', 'admin_id',
    ];

    protected $casts = [
        'image' => 'array',
    ];
    
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
    public function activity_register()
    {
        return $this->hasMany(activity_register::class, 'activity_id', 'id');
    }
    

}
