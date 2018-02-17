<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentApplication extends Model
{
    protected $table = 'application';

    protected function student()
    {
        return $this->belongsTo('App\Student');        
    }
}
