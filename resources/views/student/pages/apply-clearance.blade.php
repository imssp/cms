@extends('student.layouts.dashboard')
@section('page_heading','Application for Clearance')
@section('section')

{{--      
    PN :class teacher will choosen  lab assistant       
    Form is validated using HTML 5
    Every field is mandatory
    Essential data is filled from database automatically
    if there are any changes required in form student have to contact  admin
    On clicking apply button application gets submitted to clerk and hod for futher processing  

--}}

<div class="col-sm-1"></div>
<div class="col-sm-10">
    <div class="jumbotron text-center">
        <div class="container-fluid bg-3 text-center">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">

                <!--THIS IS FORM-->   

                {!! Form::open(['method'=>'POST','id' => 'validateform']) !!}
                <div class="form-group">
                        {{ Form::text('passingdate','',['class' => 'form-control','placeholder'=>'Enter Passing Date','onfocus' => '(this.type="date")', 'onfocusout' => '(this.type="text")','required' ])}}
                </div>

                <div class="form-group">
                        {{ Form::text('stuname',$students->first_name.' '.$students->last_name,['id' => 'name' ,'class' => 'form-control','placeholder'=>'Student Name','required','disabled' ])}}
                </div>

                <div class="form-group">
                        {{ Form::text('phoneno',$students->mobile_no,['class' => 'form-control','placeholder'=>'Mobile Number','required','pattern' => '[0-9]{10}','disabled'])}}
                </div>

                <div class="form-group">
                        {{ Form::textarea('PermanantAddress',$students->permanent_address,['class' => 'form-control','placeholder'=>'Permanent Address','rows' => '2','required','disabled'])}}
                </div>

                <div class="form-group">
                        {{ Form::text('branch',$students->branch,['class' => 'form-control','placeholder'=>'Branch','required','disabled'])}}
                </div>

                <div class="form-group">
                        {{ Form::email('emaild', $students->email_id ,['class' => 'form-control', 'placeholder' => 'VES EmailID' ,'required','disabled'])}}
                </div>

                <div class="form-group">
                        {{ Form::text('future','',['class' => 'form-control','placeholder'=>'Enter details of Future Institute or JOB Information','required' ])}}
                </div>

                <div class="form-group">
                        {{ Form::textarea('exams','',['class' => 'form-control','rows' => '3','placeholder'=>'Enter Details of GRE / TOEFL / CAT / GMAT Exams attempted','required' ])}}
                </div> 

                <br>
                <div class="form-group">
                        {{Form::submit('APPLY',['class'=>'btn btn-success btn-block'])}}
                </div>
                        {!! Form::close() !!}
                        {{-- form Close --}}
                </div>
            </div>
        </div>
    </div>
</div>


@stop