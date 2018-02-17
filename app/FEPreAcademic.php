<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FEPreAcademic extends Model
{
    protected $table = 'fepreacademic';

    protected $primaryKey = 'UID';

    protected function student()
    {
        return $this->belongsTo('App\Student');        
    }
}
