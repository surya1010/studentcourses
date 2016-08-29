<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    protected $fillable = ['name', 'instructor_id', 'description'];
    
    public function instructor()
    {
        return $this->belongsTo('App\Instructor');
    }

    public function student()
    {
        return $this->hasMany('App\Student');
    }

    public function konekCourse()
    {
        return $this->hasMany('App\KoneksiCourse');
    }

    
}
