@extends('faculty.layouts.dashboard')
@section('page_heading','Revaluation Results')
@section('submit')
{{ Form::open(['action' => 'ExamDeptController@show_update_result', 'method'=>'GET']) }}
@endsection
@section('exam')
    
@section('section')
    {!! Form::open(['method'=>'POST','id' => 'validateform']) !!}
    <div class="form-group col-md-3 col-sm-4 col-xs-8">
        {{ Form::text('','',['class' => 'form-control','placeholder'=>'Search By UID','onfocus' => '(this.type="date")', 'onfocusout' => '(this.type="text")','required' ])}}
    </div>
    <div class="form-group col-md-1 col-sm-3 col-xs-4">
        {{ Form::button('<i class="fa fa-search fa-fw"></i>', array('type' => 'submit', 'class' => 'btn btn-danger btn-block'))}}
    </div>

    {!! Form::close() !!}
@stop