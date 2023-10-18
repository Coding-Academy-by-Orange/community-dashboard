<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class location extends Model
{
    //
    protected $fillable = [
        'name', 'governorate','component'
    ];

    public function activity()
    {
        return $this->hasMany(Activity::class);
    }
}
