@extends('student.layouts.dashboard')
@section('page_heading','Pre Academics')
@section('section')
<!-- This page is for preadcademic details for DSE  -->
<h3 align="center">Secondary School Certificate</h3>
{!! Form::open(['method'=>'POST']) !!}

<div class="container">
        <div class="form-group" style="padding:0 0 0 1.2%">
                {{Form::label('schoolname','School Name')}}
                {{ Form::text('schoolName','Model English School',['class' => 'form-control','disabled'])}}
        </div>

        <div class="form-group ">
        <div class="col-xs-3">
                {{Form::label('totalmarks','Total Marks')}}
                {{ Form::text('totalMarks','488.67',['class' => 'form-control','disabled'])}}
        </div>
        </div>

        <div class="form-group">
        <div class="col-xs-3">
                {{Form::label('outof','Out Of')}}
                {{ Form::text('outOf','650',['class' => 'form-control','disabled'])}}
        </div>
        </div>
        <div class="form-group">
        <div class="col-xs-3">
                {{Form::label('percentageo','Percentage obtained')}}
                {{ Form::text('percentage',$dsePreAcademics->SSC,['class' => 'form-control','disabled'])}}
        </div>
        </div>
        <br>
        <br><br>

        <h3 align="center">Direct Second Year Certificate</h3>
        <div class="form-group" style="padding:0 0 0 1.2%">
                {{Form::label('juniorclg','Junior College Name')}}
                {{ Form::text('juniorClg','MH Junior College and High School',['class' => 'form-control','disabled'])}}
        </div>
       <div class="container" style="padding:0 0 0 0.6%">
                <div class="form-group">
                        <div class="col-xs-3">
                                {{Form::label('semfive','SEM 5 ')}}
                                {{ Form::text('semFive',$dsePreAcademics->SEM5,['class' =>'form-control','disabled'])}}
                        </div>
                        <div class="col-xs-3">
                                {{Form::label('semsix','SEM 6')}}
                                {{ Form::text('semSix',$dsePreAcademics->SEM6,['class' => 'form-control','disabled'])}}
                        </div>
                        
                </div>
        </div>
        <br>
      

<br>
{!! Form::close() !!}
 

@stop