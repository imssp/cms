<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Qual_log extends Model
{
    //table name
    protected $table = 'qual_log';

    //Primary Key

    protected $primaryKey = 'Qual_log_id';
    //Timestamp
    public $timestamp =false;

    public function faculty(){
        return $this->belongsTo('App\Faculty');
    }
}
