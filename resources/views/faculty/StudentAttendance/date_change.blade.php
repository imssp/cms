@extends('faculty.layouts.dashboard')
@section('page_heading','Delete Attendance')
@section('section')
    <h3><?php echo "Date ". $date_old ." changed ". $data ." record Updated"?></h3>
    <a href="{{url('/staff/StudentAttendance')}}"><input type = "button" class="btn btn-success">Go to Studence attendance</a>
@stop