@extends('faculty.layouts.dashboard')
@section('page_heading','Attendance')
@section('section')
<div>
    <div>
        @if(count($data1)==1)
            <h3>Change date of attendance</h3><br>
            {!! Form::open(['action' => 'StudentAttendanceController@update_date','method'=>'post']) !!}
                <div class="col-sm-3 col-sm-offset-3 col-xs-8">
                    {{-- <input type="date" name="date1" class="form-control" required="true"> --}}
                    @if(strtotime($D['end_date']) > time())
                        <input type="date" class="form-control text-center input-lg" id="date" name="date1" max="{{date("Y")}}-{{date("m")}}-{{date("d")}}" min="{{$D['start_date']}}" onfocus="(this.type='date')" placeholder="ENTER DATE" value="{{date("Y")}}-{{date("m")}}-{{date("d")}}" required/>
                    @else
                        <input type="date" class="form-control text-center input-lg" id="date" name="date1" max="{{$D['end_date']}}" min="{{$D['start_date']}}" onfocus="(this.type='date')"  placeholder="ENTER DATE" value="{{date("Y")}}-{{date("m")}}-{{date("d")}}" required/>
                    @endif
                </div>
                <input type="hidden" value="{{$date_old}}" name="date_old">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" value="{{$index}}" name="index">
                @foreach($data as $student)
                    <input type="hidden" value="{{$student->sub_allotment_id}}" name="sub">
                @endforeach
                <div class="row">
                    <div class="col-xs-offset-4 "><input type="submit" class="btn btn-success btn-lg" name="Submit"></div>
                </div>
            {!! Form::close() !!}
            <br>
            <hr>
            <h3>Change attendance of student</h3><br>
            <div class="row">
            {{-- This form generates roll number buttons from the attendance data from database. The attendance of these students has already been marked. You can update this here. The database contains numbers and not alphabets for attendance record.
    Legend: P = present = 1, A = absent = 0, L = late = 2 and E = exempted = 3 --}}
                {!! Form::open(['action' => 'StudentAttendanceController@update_att', 'id' => 'attendance']) !!}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" value="{{$index}}" name="index">
                    {{-- <div class=" container">
                        <h3 class="col-md-2">Legend :</h3>
                        <div class="col-md-2 bg-success text-white">Present</div>
                        <div class="col-md-2 bg-danger text-white">Absent</div>
                        <div class="col-md-2 bg-warning text-white">Late</div>
                        <div class="col-md-2 bg-primary text-white">Exempted</div>
                    </div> --}}
                    
                    <div class="page-container" >
                        <div class="row">
                            @foreach($data as $student)
                                <button type="button" id="{{ $student->roll_no }}"  class="attendance-card col-xs-2 col-sm-2 col-md-1
                                @php
                                    $value = $student->attendance;
                                    if($value == "0"){
                                        echo "btn-danger";
                                    }
                                    elseif($value == "3"){
                                        echo "";
                                    }
                                    elseif($value == "2"){
                                        echo "btn-warning";
                                    }
                                    elseif($value == "1"){
                                        echo "btn-success";
                                    }
                                @endphp
                                " onclick="toggle({{ $student->roll_no }})"  >
                                    <span id="info{{ $student->roll_no }}" class="state">
                                        @php
                                            $value = $student->attendance;
                                            if($value == "0"){
                                                echo "A";
                                            }
                                            elseif($value == "1"){
                                                echo "P";
                                            }
                                            elseif($value == "2"){
                                                echo "L";
                                            }
                                            elseif($value == "3"){
                                                echo "E";
                                            }
                                        @endphp
                                    </span>
                                    <div class="roll-no text-center">{{ $student->roll_no }}</div>
                                    <div class="text-center name">{{ strtolower($student->first_name)}}</div>
                                    <input type="hidden" name="UIDs[]" id="UID{{ $student->roll_no }}" value="{{ $student->uid }}">
                                    <input type="hidden" class="attendancegg" id="attendance{{$student->roll_no}}" name="attendanceVal[]" value="{{ $student->attendance }}">
                                </button>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xs-4">
                </div>
                <div class="row">
                    <div class="col-sm-7 col-sm-offset-5"><input type="submit" class="btn btn-primary btn-lg" name="Submit_att"></div>
                </div>
            {!! Form::close() !!}
        </div>
    @else
        <div class="col-sm-10 col-sm-offset-1">
            <form method="POST" action="updateconfirm">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" value="1" name="u/r">
                <div class="panel panel-default" style="text-align:center">
                    <div class="panel-heading">
                        <h3>Select Meeting number for the date "{{ $date_old }}" to update:</h3> <br>
                    </div>
                    <div class="panel-body">
                        <div class="col-sm-4 col-sm-offset-2 col-xs-9">
                            <select name="index" class="form-control">
                                @foreach($data1 as $d)
                                    <option value="{{$d->contact_head_meeting_index}}">Meeting Number: {{$d->contact_head_meeting_index}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <button type="submit" value="yes" name="ans" class="btn btn-success">Update</button><br><br>
                            {{-- <button type="submit" value="no" name="ans" class="btn btn-success">Go back</button> --}}
                        </div>
                    </div>
                </div>
            </form>
        </div>
    @endif
    {{-- <form method="POST" action="updateconfirm" class="col-sm-offset-1">
        
        
        <select name="index" class="form-control">
            @foreach($data1 as $d)
            <option value="{{$d->contact_head_meeting_index}}">{{$d->contact_head_meeting_index}}</option>
            @endforeach
        </select>
        <br>
        <button type="submit" value="yes" name="ans" class="btn btn-success">Update</button>
        <button type="submit" value="no" name="ans" class="btn btn-success">Go back</button>
    </form>
    @endif--}}
</div>
<script>
    //document.forms.attendance.elements['UIDs[]'] = []

    document.forms.attendance.elements['UIDs'] = [];
    document.forms.attendance.elements['attendanceVal'] = [];
    //This script is used to toggle status(present-P, absent-A, late-L, exempted-E) of roll numbers.
    //The script works as students are sorted accordinng to roll numbers. The roll number buttons wont work if any 2 students have the same attendance.
    function toggle(roll_no){

        var status = document.getElementById('attendance'+roll_no).value;
        if(status=="1"){
            status="0";
            att_status = "A";
            document.getElementById('info'+roll_no).innerHTML = att_status;
            document.getElementById('attendance'+roll_no).value = status;
            document.getElementById(roll_no).setAttribute("class","attendance-card col-xs-2 col-sm-2 col-md-1 btn-danger");
        }else if(status=="0"){
            status="2";
            att_status = "L";
            document.getElementById('info'+roll_no).innerHTML = att_status;
            document.getElementById('attendance'+roll_no).value = status;
            document.getElementById(roll_no).setAttribute("class","attendance-card col-xs-2 col-sm-2 col-md-1 btn-warning");
        }else if(status=="2"){
            status="3";
            att_status = "E";
            document.getElementById('info'+roll_no).innerHTML = att_status;
            document.getElementById('attendance'+roll_no).value = status;
            document.getElementById(roll_no).setAttribute("class","attendance-card col-xs-2 col-sm-2 col-md-1");
        }else if(status=="3"){
            status="1";
            att_status = "P";
            document.getElementById('info'+roll_no).innerHTML = att_status;
            document.getElementById('attendance'+roll_no).value = status;
            document.getElementById(roll_no).setAttribute("class","attendance-card col-xs-2 col-sm-2 col-md-1 btn-success");
        }
        if(document.forms.attendance.elements['UIDs'].indexOf(document.getElementById("UID" + roll_no)) === -1){
            document.forms.attendance.elements['UIDs'].push(document.getElementById("UID" + roll_no));
            document.forms.attendance.elements['attendanceVal'].push(document.getElementById("attendance" + roll_no));
        }
    }
</script>

@stop