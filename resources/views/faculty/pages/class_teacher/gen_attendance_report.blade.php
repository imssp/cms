@extends('faculty.layouts.dashboard')
@section('page_heading','Generate Attendance Report')
@section('section')

{{-- <table class="table table-bordered">
    <!--@foreach($Sub_Allot as $subjects)-->
    <tr>
        <td>{{$subjects->term_id}}</td>
        <td>{{$subjects->course_code}}</td>
        <td>{{$subjects->division}}</td>
        <td>{{$subjects->contact_head}}</td>
        <td>{{$subjects->contact_head_hours}}</td>
        <td>{{$subjects->e_id}}</td>
    </tr>
    @endforeach
    @foreach($StudentList as $List)
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    @endforeach
</table> --}}
    <div class="page-container">
        {!! Form::open(['action'=>'ClassTeacherController@generate_attendance_report', 'method'=>'POST']) !!}
            <div class="row">
                
                <div class="col-sm-2 col-sm-offset-3">
                    <div class="form-group">
                        <label for="course_code"><h3>Start Date:</h3></label>
                        <input type="date" class="form-control" name="course_code" required />
                    </div>             
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="course_code"><h3>End Date:</h3></label>
                        <input type="date" class="form-control" name="course_code" required />
                    </div>                  
                </div>
            </div>
        {!! Form::close() !!}

        <hr>
        
        <div class="table-responsive">          
            <table class="table table-bordered">
            <caption><h3>Term ID 1</h3></caption>
                <thead>
                    <tr>
                        <th class="text-center" rowspan="2">UID</th>
                        {{-- variable clospan --}}
                        <th class="text-center" colspan="3">Subject Name 1</th>
                    </tr>
                    <tr>
                        <th class="text-center">Present</th>
                        <th class="text-center">Absent</th>
                        <th class="text-center">Percentage</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($StudentList as $List)
                    <tr>
                        <td>{{$List->student_allotment_uid}}</td>
                        <td>{{$List->term_id}}</td>
                        <td>{{$List->division}}</td>
                        <td>{{$List->UID}}</td>
                        <td>{{$List->roll_no}}</td>
                        <td>{{$List->batch}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@stop