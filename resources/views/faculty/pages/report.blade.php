@extends('faculty.layouts.dashboard')
@section('page_heading','Generate Report')
@section('section')
@include('faculty.layouts.validation_msgs')
    <div class="row">
        {{ Form::open(['action' => 'FacultyController@generate_report', 'method'=>'GET']) }}
            <div class="col-sm-2">
                <div class="form-group">
                    <select name="department" class="form-control">
                        <option value="-1">All</option>
                        <option value="Information Technology">Information Technology</option>
                        <option value="Computer Science">Computer Science</option>
                        <option value="Electronics">Electronics</option>
                        <option value="EXTC">EXTC</option>
                        <option value="Intrumentation">Intrumentation</option>
                        <option value="MCA">MCA</option>
                        <option value="H and S">H and S</option>
                    </select>

                        {{-- to generate report being pricipal and HOD etc uncomment the following code. without the following commented code , this works for admin only --}}
                         {{-- <select name="department" class="form-control">
                        @foreach($dep as $depart)
                            <option value="{{$depart->department}}">{{$depart->department}}</option>
                        @endforeach                             
                    </select>  --}}

                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <select name="staffType" class="form-control">
                        <option value="-1">All</option>
                        <option value="1">Teaching</option>
                        <option value="50">Non-Teaching</option>
                    </select>
                </div>
            </div>
            
            <div class="col-sm-2">
                <div class="form-group">
                    <select name="contractType" class="form-control">
                        <option value="-1">All</option>
                        <option value="1">Permanent</option>
                        <option value="0">Adhoc</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    {{Form::number('year', '', ['class'=> 'form-control', 'placeholder'=>'N years'])}}
                </div>
            </div>

            {{Form::submit('Submit', ['class'=>'btn btn-success'])}}
        {{ Form::close() }}
    </div>
    @if(isset($data))
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>E_id</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Department</th>
                        <th>Staff Type</th>
                        <th>E-Mail</th>
                        <th>Contract Type</th>
                        <th></th>
                    </tr>
                </thead>
            </table>
        </div>
    @endif

    <hr>
    <div>  
      <h4> Search staff information according to Date of Joining (RID : 13)</h4>        
      <a href = "{{url('/staff/report/report_rid_13')}}" > <button type="button" class="btn btn-success">Click Here</button></a>
      </div> 
      <hr>
    <div>
      <h3>Get all staff details</h3>
      {!! link_to_route('admin.staff.excel', 
      'Export to Excel', null, 
      ['class' => 'btn btn-info']) 
      !!}
    </div>


@stop
