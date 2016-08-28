<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //

     
    protected $fillable = ['course_id','name','email', 'password','gender','active'];

    public function course()
    {
        return $this->belongsTo('App\Course');
    }
}
