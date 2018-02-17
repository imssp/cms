@extends('faculty.layouts.dashboard')
@section('page_heading','Student Attendance')
@section('section')
<div class="col-sm-10 col-sm-offset-1">
    <div class="panel panel-default" style="text-align:center">
        <div class="panel-heading">
            <h3>You have conducted {{$query->contact_head_meeting_index}} lecture(s) on {{ $request->Date }}</h3>
        </div>
        
        <div class="panel-body">
            {{-- Syntax in Laravel to make a form. This form is to add new attendance (conduct additional lecture) on the same date. --}}
            {{ Form::open(array('action' => 'StudentAttendanceController@addnew')) }}
            <div class="col-xs-6">
                <input type="hidden" name="contact_head_meeting_index" value="{{$query->contact_head_meeting_index}}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="Date" value="{{ $request->Date }}">
                <input type="hidden" name="SubAllotId" value="{{ $request->SubAllotId }}">
                <input type="hidden" name="TermID" value="{{ $request->TermID }}">
                <input type="hidden" name="Division" value="{{ $request->Division }}">
                <input type="hidden" name="ContactHead" value="{{ $request->ContactHead }}">
                <button type="submit" class="btn btn-success" value="yes" name="btn" >Add New Attendance</button>
            </div>
            {{ Form::close() }}
            {{-- This form is to update the attendance of that date. Selecting contact_head_meeting_index/chmi/lecture_number will be on update.blade.php --}}
            {{  Form::open(['action' => 'StudentAttendanceController@update','method'=>'post'])  }}
            <div class="col-sm-6">
                <input type="hidden" name="contact_head_meeting_index" value="{{$query->contact_head_meeting_index}}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="Date" value="{{ $request->Date }}">
                <input type="hidden" name="SubAllotId" value="{{ $request->SubAllotId }}">
                <input type="hidden" name="TermID" value="{{ $request->TermID }}">
                <input type="hidden" name="Division" value="{{ $request->Division }}">
                <input type="hidden" name="ContactHead" value="{{ $request->ContactHead }}">
                <button type="submit" class="btn btn-danger" value="no" name="btn">Update</button>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@stop