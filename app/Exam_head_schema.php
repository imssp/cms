<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam_head_schema extends Model
{
    protected $table = 'exam_head_schema';

    //Primary Key

    protected $primaryKey = 'syllabus_id';
    //Timestamp
    public $timestamps =false;
}
