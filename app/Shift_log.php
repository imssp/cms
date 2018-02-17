<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shift_log extends Model
{
    protected $table = 'shift_log';

    //Primary Key

    protected $primaryKey = 'shift_log_id';
    //Timestamp
    public $timestamp =false;

    public function faculty(){
        return $this->belongsTo('App\Faculty');
    }
}
