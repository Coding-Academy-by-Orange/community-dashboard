<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EnglishQuiz extends Model
{

    protected $guarded = [];

    // one to many relationship
    public function users(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\User');
    }
}
