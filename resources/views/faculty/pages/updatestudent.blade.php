@extends('faculty.layouts.dashboard')
@section('page_heading','Update Student')
@section('section')

<div class="col-sm-8">
    <div class="input-group custom-search-form" >

        {{-- {!! Form::open(['action'=> 'FacultyController@search_result' , 'method' => 'GET']) !!}
            <div class="col-sm-8">  {{Form::text('search', '' , ['class'=>'form-control ', 'placeholder' => 'Search Student'])}} </div>
            {{Form::submit('Search' , ['class' => 'btn btn-default'])}}
        {!! Form::close() !!} --}}
            <input type="text" class="form-control" placeholder="Search Student">

            <span class="input-group-btn">
                <button class="btn btn-default" type="button">
                <i class="fa fa-search"></i>
                </button>
            </span> 
    </div>
</div>
@stop