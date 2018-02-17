@extends('student.layouts.dashboard')
@section('page_heading','Report Discrepensies')
@section('section')

{!! Form::open(['method'=>'POST']) !!}
<div class="col-sm-1"></div>
<div class="col-sm-10">
    <div class="jumbotron  text-center">
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <div class="form-group">
                    {{ Form::text('stuname',$students->FirstName.' '.$students->LastName,['class' => 'form-control','placeholder'=>'Student Name','disabled' ,'required'])}}
            </div>
            <div class="form-group">
                    {{ Form::text('stuid',$students->UID,['class' => 'form-control','placeholder'=>'Student ID','disabled' ,'required'])}}
            </div>
            <div class="form-group">
                    {{ Form::textarea('problem','',['id' => 'article-ckeditor','class' => 'form-control','placeholder'=>'Describe Your Problem','required' ])}}
            </div>
            <br>
            <div class="form group">
                    {{Form::submit('APPLY',['class'=>'btn btn-success btn-block'])}}
            </div>
        </div>
        </div>
    </div>
    </div>
</div>
</div>
<!--THIS IS FOR APPLICATION OF TRANSCRIPTS--> 
{!! Form::close() !!}
@stop