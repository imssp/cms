<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DSEPreAcademic extends Model
{
    protected $table = 'dsepreacademic';

    protected $primaryKey = 'UID';

    protected function student()
    {
        return $this->belongsTo('App\Student');        
    }
}
