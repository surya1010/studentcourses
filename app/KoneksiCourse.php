<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KoneksiCourse extends Model
{
    //
    protected $fillable = ['student_id', 'course_id'];

    public static function cekKoneksi($id)
    {
        $koneksi = KoneksiCourse::select('student_id', $id);
        if($koneksi){
            return $koneksi;
        }else{
        return FALSE;
        }
    }


    public function course()
    {
        return $this->belongsTo('App\Course');
    }
}
