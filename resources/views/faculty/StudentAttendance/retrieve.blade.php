@extends('faculty.layouts.dashboard')
@section('page_heading','View Attendance')
@section('section')

<div>
    <div>
        <div>
            @if(count($data1)==1)                                
            <div class="page-container">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" value="{{$index}}" name="index">
                    @foreach($data as $student)
                        <button type="button" id="{{ $student->roll_no }}"  class="attendance-card col-xs-2 col-sm-2 col-md-1 btn 
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
                        " onclick="" >
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
            <div class="col-xs-12">
                <div class="col-sm-7 col-sm-offset-5 col-xs-offset-2 ">
                <a href="{{url('/staff/StudentAttendance')}}" style="text-decoration: none; color:#ffffff;"><button class="btn btn-success">Go to Studence attendance</a></button>
                </div>
            </div>
                    {{-- <div class="col-sm-7 col-sm-offset-5"><input type="submit" class="btn btn-primary btn-lg" name="Submit_att"></div> --}}
                     
            @else
            <div class="col-sm-10 col-sm-offset-1">
                    <form method="POST" action="updateconfirm">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">  
                        <input type="hidden" value="0" name="u/r">    
                        <div class="panel panel-default" style="text-align:center">
                            <div class="panel-heading">
                                <h3>Select Meeting number for the date "{{ $date_old }}" to view:</h3> <br>
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
                                    <button type="submit" value="yes" name="ans" class="btn btn-success">View</button><br><br>
                                    {{-- <button type="submit" value="no" name="ans" class="btn btn-success">Go back</button> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            {{-- <form method="POST" action="updateconfirm" class="col-sm-offset-1">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" value="0" name="u/r">                     
                <h3>Select Meeting number for the date "{{ $date_old }}" to update:</h3> <br>
                <select name="index" class="form-control">
                    @foreach($data1 as $d)
                        <option value="{{$d->contact_head_meeting_index}}">{{$d->contact_head_meeting_index}}</option>
                    @endforeach
                </select>
                <br>
                <button type="submit" value="yes" name="ans" class="btn btn-success">Retrive</button>
                <button type="submit" value="no" name="ans" class="btn btn-success">Go back</button>
            </form> --}}
        @endif
    </div>
    <script>
    //document.forms.attendance.elements['UIDs[]'] = []
    
    document.forms.attendance.elements['UIDs'] = [];
    document.forms.attendance.elements['attendanceVal'] = [];
    
        
        function toggle(roll_no){
            
            var status = document.getElementById('info'+roll_no).innerHTML
            if(status=="1"){
                status="0";
            
                document.getElementById('info'+roll_no).innerHTML = status;
                document.getElementById('attendance'+roll_no).value = status;
                document.getElementById(roll_no).setAttribute("class","btn btn-danger btn-xs btn-block");
            }else if(status=="0"){
                status="2";
                
                document.getElementById('info'+roll_no).innerHTML = status;
                document.getElementById('attendance'+roll_no).value = status;
                document.getElementById(roll_no).setAttribute("class","btn btn-warning btn-xs btn-block");
            }else if(status=="2"){
                status="3";
            
                document.getElementById('info'+roll_no).innerHTML = status;
                document.getElementById('attendance'+roll_no).value = status;
                document.getElementById(roll_no).setAttribute("class","btn btn-primary btn-xs btn-block");
            }else if(status=="3"){
                status="1";
            
                document.getElementById('info'+roll_no).innerHTML = status;
                document.getElementById('attendance'+roll_no).value = status;
                document.getElementById(roll_no).setAttribute("class","btn btn-success btn-xs btn-block");
            }
        </script>
    {{-- </div>
    <hr>
    <div class="row">
    {!! Form::open(['action'=>'StudentAttendanceController@retrieveexcel', 'method'=>'POST']) !!}
		<div class="col-sm-10 col-sm-offset-1">
			<div class="col-sm-offset-4 col-sm-4">
				<div class="form-group">
					@if(strtotime($Date['end_date']) > time())
						<input class="form-control text-center input-lg" id="date" name="Date" max="{{date("Y")}}-{{date("m")}}-{{date("d")}}" min="{{$Date['start_date']}}" onfocus="(this.type='date')" onblur="(this.type='text')" placeholder="ENTER DATE" value="{{date("Y")}}-{{date("m")}}-{{date("d")}}" required/>
					@else
						<input class="form-control text-center input-lg" id="date" name="Date" max="{{$Date['end_date']}}" min="{{$Date['start_date']}}" onfocus="(this.type='date')" onblur="(this.type='text')"  placeholder="ENTER DATE" value="{{date("Y")}}-{{date("m")}}-{{date("d")}}" required/>
					@endif
				</div>
			</div>
		</div>
		<div class="col-sm-10 col-sm-offset-1">
			<div class="col-sm-offset-5 col-sm-4">
				<button type="submit" name="next" class="btn btn-danger" value="submit">Next</button>
			</div>
		</div>
	{!! Form::close() !!}
    </div>   --}}
</div>
@stop