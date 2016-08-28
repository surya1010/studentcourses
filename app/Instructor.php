<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    //

    public function course()
    {
        return $this->hasMany('App\Course');
    }
}
