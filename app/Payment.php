<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Payment extends Model
{
    //

    public function payment()
    {
        return $this->hasOne('App\Course');
    }
}
