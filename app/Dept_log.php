<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dept_log extends Model
{
    protected $table = 'dept_log';

    //Primary Key

    protected $primaryKey = 'dept_log_id';
    //Timestamp
    public $timestamps =false;

    public function faculty(){
        return $this->belongsTo('App\Faculty');
    }

    public function department(){
        return $this->belongsTo('App\Department', 'department_id');
    }
}
