<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type_log extends Model
{
    protected $table = 'type_log';

    //Primary Key

    protected $primaryKey = 'type_log_id';
    //Timestamp
    public $timestamp =false;

    public function faculty(){
        return $this->belongsTo('App\Faculty');
    }
}
