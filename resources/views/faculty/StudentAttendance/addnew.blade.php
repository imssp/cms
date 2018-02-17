@extends('faculty.layouts.dashboard')
@section('page_heading','Student Attendance')
@section('section')

{{-- This is the toggle switch to mark everyone absent or persent --}}
<div class="col-md-offset-5 col-xs-offset-4 onoffswitch">
    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch" onclick="changeall()">
    <label class="onoffswitch-label" for="myonoffswitch">
        <span class="onoffswitch-inner"></span>
        <span class="onoffswitch-switch"></span>
    </label>
</div>

{{-- <form action="addconfirm" method="POST"> --}}
{{-- The below form generates student roll number buttons for marking attendance. The database contains numbers and not alphabets for attendance record.
    Legend: P = present = 1, A = absent = 0, L = late = 2 and E = exempted = 3 --}}
{!! Form::open(['action' => 'StudentAttendanceController@addnewRecord','method'=>'post']) !!}
    <div class="page-container">
        @if(count($data)>0)
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="Date" value="{{ $request->Date }}">
            <input type="hidden" name="SubAllotId" value="{{ $request->SubAllotId }}">
            <input type="hidden" name="TermID" value="{{ $request->TermID }}">
            <input type="hidden" name="Division" value="{{ $request->Division }}">
            <input type="hidden" name="ContactHead" value="{{ $request->ContactHead }}">
            <input type="hidden" name="chmi" value="{{ $request->contact_head_meeting_index }}">
            <div class="row">
                @foreach($data as $dataa)
                    <button type="button" id="{{ $dataa->roll_no }}"  class="attendance-card col-xs-2 col-sm-2 col-md-1 btn-success" onclick="toggle({{ $dataa->roll_no }})">
                        <span id="info{{ $dataa->roll_no }}" class="state">P</span>
                        <div class="roll-no text-center">{{ $dataa->roll_no }}</div>
                        <div class="text-center name">{{ strtolower($dataa->first_name) }}</div>

                        <input type="hidden" name="UIDs[]" value="{{ $dataa->uid }}">
                        <input type="hidden" class="attendancegg" id="attendance{{$dataa->roll_no}}" name="attendanceVal[]" value="1">
                    </button>
                @endforeach
            </div>
        @endif
    </div>
    <div class="col-md-4 col-xs-4 col-md-offset-4 col-xs-offset-4">
        <div class="row">
            <input class="btn btn-info btn-lg btn-block" type="submit" value="Save" name="submit"> 
        </div>
    </div>
{!! Form::close() !!}


<script>
    //Changeall function is used by the toggle checkbox to mark all students as absentor present.
    function changeall(){
        var attendancegg = document.getElementsByClassName("attendancegg");
        var state = document.getElementsByClassName("state");
        var myonoffswitch = document.getElementById('myonoffswitch');
        var temp;

        for(var i = 0; i < attendancegg.length; i++){
            if(myonoffswitch.checked){
                attendancegg[i].value = "0";
                state[i].innerHTML = "A";
                state[i].parentElement.setAttribute("class","attendance-card col-xs-2 col-sm-2 col-md-1 btn-danger");
         }else{
                attendancegg[i].value = "1";
                state[i].innerHTML = "P";
                state[i].parentElement.setAttribute("class","attendance-card col-xs-2 col-sm-2 col-md-1 btn-success");
            }
        }
        
    }
    //Toggle function changes the status(absent-A, present-P) of a roll number button.
    function toggle(roll_no){
        
        var status = document.getElementById('attendance'+roll_no).value;
        if(status=="1"){
            status="0";
            att_status = "A";
            document.getElementById('info'+roll_no).innerHTML = att_status;
            document.getElementById('attendance'+roll_no).value = status;
            document.getElementById(roll_no).setAttribute("class","attendance-card col-xs-2 col-sm-2 col-md-1 btn-danger");
        }else if(status=="0"){
            status="1";
            att_status = "P";
            document.getElementById('info'+roll_no).innerHTML = att_status;
            document.getElementById('attendance'+roll_no).value = status;
            document.getElementById(roll_no).setAttribute("class","attendance-card col-xs-2 col-sm-2 col-md-1 btn-success");
        }
    }
    //This jquery ensures that the Save attendance is not pressed more than ones. As we dont want multiple attendance to be inserted in the database of the same student and having same contach_head_meeting_index/chmi/lecture_number. This usually occurs due to hyper active staff, faulty appliances (mouse) or demonic possession.
    $("form").submit(function() {
        $(this).submit(function() {
            return false;
        });
        return true;
    });

</script>

@stop