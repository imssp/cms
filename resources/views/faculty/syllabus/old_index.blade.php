{{-- <div>
            {{ Form::open(['action' => ['SyllabusController@update', $schema->term_id], 'method'=>'GET']) }}
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="label label-danger" for="scheme">Scheme:</label>
                            <input class="form-control" type="text" name="scheme" value="{{$schema->scheme}}">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="label label-danger" for="sub_code">Subject Code:</label>
                            <input class="form-control" type="text" name="sub_code" value="{{$schema->sub_code}}">
                        </div>
                    </div>
                    
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="label label-danger" for="sub_name">Subject Name:</label>
                            <input class="form-control " type="text" name="scheme" value="{{$schema->sub_name}}">
                        </div>
                    </div>    
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            {{ Form::label('IA1', 'Internal Test 1', ['class'=>'label label-danger']) }}
                            {{ Form::checkbox('IA1', 'yes', $schema->IA1, ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="label label-danger" for="IA1_max">Maximum Marks:</label>
                            <input class="form-control " type="number" name="IA1_max" value="{{$schema->IA1_max_marks}}">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="label label-danger" for="IA1_pass">Passing Marks:</label>
                            <input class="form-control " type="number" name="IA1_" value="{{$schema->IA1_pass_marks}}">
                        </div>
                    </div>    
                </div>
                
                {{Form::submit('Submit', ['class'=>'btn btn-success'])}}
            
            {{ Form::close() }}
        </div> --}}                                                                               
        <div class="table-responsive">          
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center" rowspan="4">Subject Code</th>
                        <th class="text-center" rowspan="4">Subject Name</th>
                        <th class="text-center" colspan="9">Syllabus Scheme</th>
                    </tr>
                    <tr>
                        <th class="text-center" colspan="5">Theory</th>
                        <th class="text-center" colspan="4" rowspan="2">Maximum Marks</th>
                    </tr>
                    <tr>
                        <th colspan="3">Internal Assessment (IA)</th>
                        <th class="text-center" rowspan="2">End Semester Examination Marks</th>
                        <th class="text-center" rowspan="2">End Sem Passing Marks</th>
                    </tr>
                    <tr>
                        <th class="text-center">Test 1</th>
                        <th class="text-center">Test 2</th>
                        <th class="text-center">AVG</th>
                        <th class="text-center">Term Work</th>
                        <th class="text-center">Practical/Oral</th>
                        <th class="text-center">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$schema->sub_code}}</td>
                        <td>{{$schema->sub_name}}</td>
                        <td>{{$schema->IA1_max_marks}}</td>
                        <td>{{$schema->IA2_max_marks}}</td>
                        <td>{{($schema->IA1_max_marks + $schema->IA2_max_marks)/2}}</td>
                        <td>{{$schema->endsem_max_marks}}</td>
                        <td>{{$schema->endsem_pass_marks}}</td>
                        <td>{{$schema->termwork_max_marks}}</td>
                        <td>{{$schema->prac_max_marks}}</td>
                        <td>125?</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="row text-center">
            <div class="col-sm-6">
                <a href="/store/{{$schema}}" class="btn btn-primary form-control">Carry Forward</a>
            </div>
            <div class="col-sm-6">
                <a href="discard" class="btn btn-danger form-control">Discard</a>
            </div>
        </div>