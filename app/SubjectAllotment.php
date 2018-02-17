<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubjectAllotment extends Model
{
    protected $table = 'subject_allotment';
    //Primary Key
    protected $primaryKey = 'sub_allotment_id';
    //Timestamp
    public $timestamps=false;
}
