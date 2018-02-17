<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marks extends Model
{
    protected $table = 'student_exam_results';

    public $timestamps = false;
}
