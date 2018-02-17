@extends('faculty.layouts.dashboard')
@section('page_heading','Attendance')
@section('section')

<form method="POST" action="" class="form-inline">
    <div class=" col-sm-5 col-sm-offset-3 form-group">
        <label for="date">Enter Date to fill Attendance :</label>
        <input type="date" class="form-control" name="date" value="">
       
    </div>
     <input type="submit" name="submit" value="Submit" class="btn btn-danger">

</form>
<div>
</div>

@stop