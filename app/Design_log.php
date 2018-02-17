<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Design_log extends Model
{
    protected $table = 'design_log';

    //Primary Key

    protected $primaryKey = 'design_log_id';
    //Timestamp
    public $timestamp =false;

    public function faculty(){
        return $this->belongsTo('App\Faculty');
    }

    
}
