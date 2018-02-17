<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentList extends Model
{
    protected $table = 'student_allotment';
    protected $primaryKey = 'student_allotment_id';
    public $timestamps = false;
    public function student(){
        return $this->belongsTo('App\Student', 'uid', 'uid');
    }
}
