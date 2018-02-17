@extends('faculty.layouts.dashboard')
@section('page_heading','Courses Taught')
@section('section')
    <div class="page-container">

        <div class="panel-group">
            @foreach($subjects as $year=>$semesters)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#{{$year}}">Year {{$year}}</a>
                        </h4>
                    </div>
                    <div id="{{$year}}" class="panel-collapse collapse">
                        <div class="panel-body">
                            @foreach($semesters as $semester=>$subjectDetails)
                                <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#{{$year}}{{$semester}}">Semester {{$semester}}</a>
                                    </h4>
                                </div>
                                <div id="{{$year}}{{$semester}}" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <table class="table table-responsive table-striped">
                                            <thead>
                                            <tr>                        
                                                <th>Course</th>
                                                <th>Division</th>
                                                <th>Contact Head</th>
                                                <th>Hours</th>
                                                <th>Drive link</th>
                                                <th>Classroom link</th>
                                                <th>Edit</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                                @foreach($subjectDetails as $allotment)
                                                    <tr>                       
                                                        <td>{{$allotment->courseName}}</td>
                                                        <td>{{$allotment->division}}</td>
                                                        <td>{{$allotment->contact_head}}</td>
                                                        <td>{{$allotment->contact_head_hours}}</td>
                                                        <td><a href="{{$allotment->drive_link}}" target="_blank">{{$allotment->drive_link}}</td>
                                                        <td><a href="{{$allotment->classroom_link}}" target="_blank">{{$allotment->classroom_link}}</td>
                                                        <td><button class="btn btn-default" data-toggle="modal" data-target="#editModal{{$allotment->sub_allotment_id}}"><i class="fa fa-pencil" aria-hidden="true"></i></button></td>
                                                    </tr>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="editModal{{$allotment->sub_allotment_id}}" role="dialog">

                                                        <div class="modal-dialog">
                                                        
                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                            {{ Form::open(['action' => 'FacultyController@submitDriveLink', 'method'=>'POST']) }}
                                                            <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">Edit Drive Link</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <label for="gdl">Google Drive Link</label>
                                                                <input name="gdl" type="text" value="{{$allotment->drive_link}}" class="form-control" required />
                                                                <label for="gdl">Classroom Link</label>
                                                                <input name="crl" type="text" value="{{$allotment->classroom_link}}" class="form-control" required />
                                                                <input type="hidden" name="sub_id" value="{{$allotment->sub_allotment_id}}">

                                                            <div class="modal-footer">
                                                            <input type="submit" value="Submit" class="btn btn-success">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            </div>
                                                            {{ Form::close() }}
                                                        </div>
                                                        
                                                        </div>
                                                    </div>
                                                    
                                                @endforeach
                                            </tbody>    
                                        </table>
                                        
                                    </div>
                                </div>
                            @endforeach  
                        </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>    
@stop
