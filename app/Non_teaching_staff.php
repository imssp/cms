<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Non_teaching_staff extends Model
{
    protected $table = 'non_teaching_staff';

    //Primary Key

    protected $primaryKey = 'e_id';
    //Timestamp
    public $timestamps =false;

    public function faculty(){
        return $this->belongsTo('App\Faculty');
    }
}
