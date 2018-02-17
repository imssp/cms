@extends('faculty.layouts.dashboard')
@section('page_heading','Profile')
@section('section')

<div class="page-container">
<div class="profile">
        <div class="row">
            <div class="col-lg-12">
                <p class="text-muted" style="font-size:30px"><strong>Institute Level Reports</strong></p>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-3 col-xs-12 name pull-left">
                <strong class="text-danger" style="font-size:18px">Student</strong></br></br>
                <dl>
                    <dt><a href="#">Results</a></dt>
                    <dd>Generate Historical results of students</dd>
                    <br>
                    <dt><a href="#">Attendance</a></dt>
                    <dd>Generate Historical Attendance of students</dd>
                    <br>
                    <dt><a href="#">Class list</a></dt>
                    <dd>Generate students list according to class</dd>
                </dl>
            
            </div>
            <div class="col-lg-3 col-xs-12 name pull-left" >
                <strong class="text-danger" style="font-size:18px">Staff</strong></br></br>
                <dl>
                    <dt><a href="/staff/generate/load">Load sheet</a></dt>
                    <dd>Generate load sheet of staff</dd>
                    <br>
                    <dt><a href="/staff/report">Staff details</a></dt>
                    <dd>View staff sorted according to Date of Joining</dd>
                </dl>
            
            </div>
            <div class="col-lg-3 col-xs-12 name pull-left" >
                <strong class="text-danger" style="font-size:18px">Academic</strong></br></br>
                <dl>
                    <dt><a href="#">B.E. Syllabus</a></dt>
                    <dd>View B.E. syllabi</dd>
                    <br>
                    <dt><a href="#">M.E. Syllabus</a></dt>
                    <dd>View M.E. syllabi</dd>
                </dl>
            
            </div>
        </div>
    </div>      <!--/.details-->
</div>  <!--/.profile-->

</div>
@stop