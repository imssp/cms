<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'student_comments';

    protected $primaryKey = 'comment_id';
    //Timestamp
    public $timestamps = false;

    protected function student()
    {
        return $this->belongsTo('App\Student');        
    }

    protected function faculty()
    {
        return $this->belongsTo('App\Faculty');        
    }
}
