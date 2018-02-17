@extends('faculty.layouts.attendance')
@section('page_heading','Select Date')
@section('content')
	{{-- student details --}}
    <div>
        <h3>Roll No : {{ $details->roll_no }}</h3>
        <h3>Division : {{ $details->division }}</h3>
        <h3>Type : {{ $ch }}</h3> 
    </div>
    {{-- attendance buttons --}}
	<div class="row">
                {!! Form::open(['action' => 'StudentAttendanceController@updateParticularStudentAttendance', 'id' => 'attendance']) !!}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    {{--<input type="hidden" value="{{$index}}" name="index">--}}
                    <input type="hidden" name="sub_allot_id" value="{{ $data->first()->sub_allotment_id}}">
                    
                    <div class="page-container" >
                        <div class="row">
						@foreach($data as $attendance)
							<?php $date = date("d M",strtotime($attendance->date)); ?>
	
                            
                            <button type="button" id="<?php echo $attendance->contact_head_meeting_index."-".$attendance->date ?>"  class="attendance-card col-xs-2 col-sm-2 col-md-1
                                @php
                                    $value = $attendance->attendance;
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
                                " onclick="toggle(<?php echo "'".$attendance->contact_head_meeting_index."-".$attendance->date."'";?>)">
                                    <span id="info<?php echo $attendance->contact_head_meeting_index."-".$attendance->date ?>" class="state">
                                        @php
                                            $value = $attendance->attendance;
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
                                    </span><br>
                                    <div class="roll-no text-center" style="font-size: 175%;">{{ $date }}</div>
                                    <div class="text-center name">Meeting {{ $attendance->contact_head_meeting_index }}</div>
                                    <input type="hidden" name="chmis[]" id="chmi{{$attendance->contact_head_meeting_index}}" value="{{$attendance->contact_head_meeting_index}}">

                                    <input type="hidden" name="dates[]" id="date{{$attendance->date}}" value="{{$attendance->date}}">

                                    <input type="hidden" class="attendancegg" id="attendance<?php echo $attendance->contact_head_meeting_index."-".$attendance->date ?>" name="attendanceVal[]" value="{{ $attendance->attendance }}">
                                </button>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xs-4">
                </div>
                <div class="row">
                    <div class="col-sm-7 col-sm-offset-5"><input type="submit" class="btn btn-primary btn-lg" name="Submit_att" value="Submit"></div>
                </div>
                <input type="hidden" name="uid" value="{{$details->uid}}">
            {!! Form::close() !!}
        </div>
        <div id="div"></div>
<script>
    //document.forms.attendance.elements['UIDs[]'] = []

    document.forms.attendance.elements['chmi-dates'] = [];
    document.forms.attendance.elements['attendanceVal'] = [];
    //This script is used to toggle status(present-P, absent-A, late-L, exempted-E) of roll numbers.
    //The script works as students are sorted accordinng to roll numbers. The roll number buttons wont work if any 2 students have the same attendance.
    //var uniqueid = contact_head_meeting_index

    function toggle(uniqueid){
        console.log(uniqueid);
        var status = document.getElementById('attendance'+uniqueid).value;
        if(status=="1"){
            status="0";
            att_status = "A";
            document.getElementById('info'+uniqueid).innerHTML = att_status;
            document.getElementById('attendance'+uniqueid).value = status;
            document.getElementById(uniqueid).setAttribute("class","attendance-card col-xs-2 col-sm-2 col-md-1 btn-danger");
        }else if(status=="0"){
            status="2";
            att_status = "L";
            document.getElementById('info'+uniqueid).innerHTML = att_status;
            document.getElementById('attendance'+uniqueid).value = status;
            document.getElementById(uniqueid).setAttribute("class","attendance-card col-xs-2 col-sm-2 col-md-1 btn-warning");
        }else if(status=="2"){
            status="3";
            att_status = "E";
            document.getElementById('info'+uniqueid).innerHTML = att_status;
            document.getElementById('attendance'+uniqueid).value = status;
            document.getElementById(uniqueid).setAttribute("class","attendance-card col-xs-2 col-sm-2 col-md-1");
        }else if(status=="3"){
            status="1";
            att_status = "P";
            document.getElementById('info'+uniqueid).innerHTML = att_status;
            document.getElementById('attendance'+uniqueid).value = status;
            document.getElementById(uniqueid).setAttribute("class","attendance-card col-xs-2 col-sm-2 col-md-1 btn-success");
        }
        // if(document.forms.attendance.elements['chmi-dates'].indexOf(document.getElementById("chmi-date" + uniqueid)) === -1){
        //     document.forms.attendance.elements['chmi-dates'].push(document.getElementById("chmi-date" + uniqueid));
        //     document.forms.attendance.elements['attendanceVal'].push(document.getElementById("attendance" + uniqueid));
        // }
    }
</script>

@stop