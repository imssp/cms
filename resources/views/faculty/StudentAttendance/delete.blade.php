@extends('faculty.layouts.dashboard')
@section('page_heading','Delete Attendance')
@section('section')
<form method="POST" action="deleteconfirm">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="date" value="{{ $request->Date }}">
    <input type="hidden" name="SubAllotId" value="{{ $request->SubAllotId }}">
    @if(count($data)==1)
    <div class="col-sm-10 col-sm-offset-1">
        <div class="panel panel-default" style="text-align:center">
            <div class="panel-heading">
                <h3>Do you want to delete the attendance record of date "{{ $request->Date }}"?</h3>
            </div>
            <div class="panel-body">
                <button type="submit" value="yes" name="ans" class="btn btn-success btn-lg">Yes</button>
                <button type="submit" value="no" name="ans" class="btn btn-danger btn-lg">No</button>
            </div>
        </div>
    </div>
    @else
    <div class="col-sm-10 col-sm-offset-1">
        <div class="panel panel-default" style="text-align:center">
            <div class="panel-heading">
                <h3>Select Meeting number for the date "{{ $request->Date }}" to delete:</h3>
            </div>
            <div class="panel-body">
                <div class="col-sm-4 col-sm-offset-2 col-xs-9">
                    <select name="index" class="form-control">
                        @foreach($data as $d)
                        <option value="{{$d->contact_head_meeting_index}}">Meeting Number: {{$d->contact_head_meeting_index}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <button type="submit" value="yes" name="ans" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>
    @endif
</form>
@stop