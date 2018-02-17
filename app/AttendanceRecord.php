<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttendanceRecord extends Model
{
	protected $primaryKey = 'sr_num';
    protected $table = 'student_attendance_record';
    public $timestamps = false;
}
