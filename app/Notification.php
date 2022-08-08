<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $guarded =[];

    // one to many relationship
    public function admin(): \Illuminate\Database\Eloquent\Relations\belongsTo
    {
        return $this->belongsTo(Admin::class);
    }
}
