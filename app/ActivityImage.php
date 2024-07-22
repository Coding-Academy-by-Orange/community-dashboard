<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityImage extends Model
{
    //
    protected $fillable = [
        'activity_id', 'image'
    ];
    public function activity()
    {
        return $this->belongsTo('App\Activity');
    }
}
