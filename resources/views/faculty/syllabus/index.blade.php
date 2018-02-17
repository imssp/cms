@extends('faculty.layouts.dashboard')
@section('page_heading','Syllabus Schema')
@section('section')
    <div class="page-container">
        <h4 class="text-success">Enter Term Details</h4> 
        {{ Form::open(['action' => 'SyllabusController@check', 'method'=>'POST']) }}
            <div class="col-sm-2">
                <div class="form-group">
                    <!-- year dropdown -->
                    <select name="year" class="form-control" onclick=if()>
                        <!-- current date -->
                        {{$maxdate = date('Y')}} 
                        
                        <!-- disabled selection option -->
                        <option value="-1" disabled selected>Select Year</option>
                        
                        <!-- for loop to print years from 2010 to current year + 1 -->
                        @for ($date = $maxdate+1; $date > 2010; $date--)
                            <!-- value is taken as YYYY-YYYY -->
                            <option value={{$date}}-{{$date+1}}>{{$date}}-{{$date+1}}</option>
                        @endfor

                    </select>
                </div>
            </div>

            {{-- <input type="hidden" name="term" value={{$date % 2000}}> --}}
            <div class="col-sm-2">
                <div class="form-group">
                    <!-- course dropdown -->
                    <select name="course" class="form-control" id="course">

                        <!-- disabled selection option -->
                        <option value="-1" disabled selected>Select Course</option>

                        <!-- for loop to display courses -->
                        @foreach($json['course'] as $course)
                            <!-- value=course index and display the course name -->
                            <option value={{$course['courseIndex']}}>{{$course['courseName']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            
            <div class="col-sm-3">
                <div class="form-group">
                    <select name="branch" class="form-control" id="branch"> 
                        <!-- waiting for Ajax -->
                        <option value="-1" disabled selected>Select Branch</option>
                    </select>
                </div>
            </div>

            <div class="col-sm-2">
                <div class="form-group">
                    <select name="sem" class="form-control" id="sem">
                        <!-- waiting for AJAX -->
                        <option value="-1" disabled selected>Select Semester</option>
                        
                    </select>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <!-- submit button -->
                    <input type="submit" value="Add or Search Schema" name ="submit" class="btn btn-success form-control" />
                </div>
            </div>
        {{ Form::close() }}
    </div>

    <!-- Display Messages -->
    @if(Session::has('noData'))
        <div class="alert alert-danger alert-dismissible text-center animated fadeInDown">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{ Session::get('noData') }}
        </div>
    @endif

    @if(Session::has('noTerm'))
        <div class="alert alert-danger alert-dismissible text-center animated fadeInDown">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{ Session::get('noTerm') }}
        </div>
    @endif

    @if(Session::has('futureRequest'))
        <div class="alert alert-success alert-dismissible text-center animated fadeInDown">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{ Session::get('futureRequest') }}
        </div>
    @endif

    @if(Session::has('dataAdded'))
        <div class="alert alert-success alert-dismissible text-center animated fadeInDown">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{ Session::get('dataAdded') }}
        </div>
    @endif
    
    @if(Session::has('dataExists'))
        <div class="alert alert-danger alert-dismissible text-center animated fadeInDown">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{ Session::get('dataExists') }}
        </div>
    @endif

    <!-- if data is not present then display a button to create new term -->
    @if(Session::has('noData') || Session::has('noTerm'))
        <div class="row">
            <hr> 
            <h3>
                <div class="row text-center">
                    <div class="col-sm-2">Year : <b class="text-info">{{session('year')}}</b></div>
                    <div class="col-sm-2">Course : <b class="text-info">{{session('course')}}</b></div>
                    <div class="col-sm-6">Branch : <b class="text-info">{{session('branch')}}</b></div>
                    <div class="col-sm-2">Semester : <b class="text-info">{{session('sem')}}</b></div>
                </div>    
            </h3>
            <hr>
            <div class="col-sm-4 col-sm-offset-4">
                <!-- alert before create -->
                <a href="{{ action("SyllabusController@createTerm") }}" class="btn btn-success form-control" onclick="return confirm('Are you sure you would like to create new Term?');">Create New Schema</a>
            </div>
        </div>
    @endif

    <!-- if data is present, display it -->
    @if(isset($present))  
        <hr> 
        <h3>
            <div class="row text-center">
                <div class="col-sm-2">Year : <b class="text-info">{{session('year')}}</b></div>
                <div class="col-sm-2">Course : <b class="text-info">{{session('course')}}</b></div>
                <div class="col-sm-6">Branch : <b class="text-info">{{session('branch')}}</b></div>
                <div class="col-sm-2">Semester : <b class="text-info">{{session('sem')}}</b></div>
            </div>    
        </h3>
        <hr> 
        <hr>
            <h4 class="text-info text-center">Teaching Scheme</h4>
            <div class="table-responsive">          
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">Term ID</th>
                            <th class="text-center">Course Code</th>
                            <th class="text-center">Course Name</th>
                            <th class="text-center">Schema Name</th>
                            <th class="text-center">Theory Hours</th>
                            <th class="text-center">Practical Hours</th>
                            <th class="text-center">Tutorial Hours</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- display all rows in course map related to this term -->
                        @foreach($course_map as $course)
                            <tr>
                                <td class="text-center">{{$course->term_id}}</td>
                                <td class="text-center">{{$course->course_code}}</td>
                                <td>{{$course->course_name}}</td>
                                <td class="text-center">{{$course->schema_name}}</td>
                                <td class="text-center">{{ $course->th_hrs==NULL?'---':$course->th_hrs }}</td>
                                <td class="text-center">{{$course->pr_hrs==NULL?'---':$course->pr_hrs}}</td>
                                <td class="text-center">{{$course->tut_hrs==NULL?'---':$course->tut_hrs}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        <hr>
        <hr> 
        <div class="container-fluid">
            <h4 class="text-info text-center">Exam Scheme</h4>
            <div class="table-responsive">          
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <!-- labels -->
                            <th class="text-center">Exam Head Code</th>
                            <th class="text-center">Course Code</th>
                            <th class="text-center">Course Name</th>
                            <th class="text-center">Exam Head Description</th>
                            <th class="text-center">Maximum Marks</th>
                            <th class="text-center">Passing Marks</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- display all data related to this term in exam head scehma -->
                        @foreach($schemas as $schema)
                            <tr>
                                <td class="text-center">{{$schema->exam_head_code}}</td>
                                <td class="text-center">{{$schema->course_code}}</td>
                                <td>{{$schema->course_name}}</td>
                                <td>
                                    @foreach($exam_head as $head)
                                        @if ( $head['value'] == $schema->exam_description)
                                            {{$head['name']}}
                                        @endif
                                    @endforeach
                                </td>
                                <td class="text-center">{{$schema->max_marks}}</td>
                                <td class="text-center">{{$schema->min_marks}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="row text-center">
                <div class="col-sm-4">
                    <h1>
                        <!-- User can discard this schema and create new -->
                        <!-- this must give an alert -->
                        <a href="{{ action("SyllabusController@discard") }}" class="btn btn-danger form-control" onclick="return confirm('Are you sure you would like to delete this schema?');">Discard And Create New</a>    
                    </h1>
                </div>
                <!-- the edit button -->
                <!-- <div class="col-sm-3">
                    <h1>
                        <a href="{{ action("SyllabusController@editSyllabus") }}" class="btn btn-info form-control">Edit</a>    
                    </h1>
                </div> -->
                <div class="col-sm-4">
                    <h1>
                        <!-- Export to excel button -->
                        <a href="{{ action("SyllabusController@toExcel") }}" class="btn btn-success form-control" >Export To Excel</a>    
                    </h1>
                </div>
                <div class="col-sm-4">
                    <h1>
                        <!-- Carry forward button -->
                        <a href="{{ action("SyllabusController@carry") }}" class="btn btn-primary form-control">Carry Forward To Next Year</a>    
                    </h1>
                </div>
            </div>
        </div>
    @endif



<script type="text/javascript">
    
    /**
     * AJAX for dynamic dropbox
     *  
     * Here the Course Field is taken from the JSON file, It displays all the Courses present in the JSON
     * On selecting a coure, the branch is automatically updated (Call to brach method in Syllabus Controller)
     * On selecting the brach, Semester is automatically updated (Call to sem method in Syllabus Controller)
     * All this update is done usign CourseConfig.json file
     * Sometimes there is a lag in these AJAX calls
     * Refresh the page to correct it
     */

    $(document).ready(function(){
        //on change in course dropdown
        $(document).on('change','#course', function(){
            
            //fetch value in that select
            var course_id = $(this).val();


            //For Branch DropDown

            //parent = start div tag
            var div = $('#branch').parent();
            //string to append html code for
            var op = "";    //Initializw op string, this will hold the HTML to be displayed
            $.ajax({
                type:'get', //get method
                url:'{!!URL::to('staff/branch')!!}', //route to work on, redirects to brach method
                data:{'id': course_id}, //pass data course ID to controller
                success:function(data){ //on success. 
                    //variable data is the response from controller. It contains data about branch
                    
                    //initail HTML, with disabled selection option
                    op+='<option value="-1" disabled selected>Select Branch</option>';
                    
                    //Loop to display all the branches in the drop down
                    for(var i = 0;i<data.length;i++)
                    {
                        //Append HTML dynamically
                        //Make Dropdown Menu
                        //set value  = branch index specified in the JSON
                        //Display Branch name to user
                        op+='<option value="'+data[i].branchindex+'">'+data[i].name+'</option>';
                    }
                    div.find('#branch').html("");   //Reset the div
                    div.find('#branch').append(op); //add content of op to the div
                },
                error:function(){
                    //Enter some Error Message
                }
            });
            

            //For the semester dropdown

            //parent = start div tag
            var d = $('#sem').parent();     
            var  o = "";        //Initializw op string, this will hold the HTML to be displayed

            $.ajax({
                type:'get', //get method
                url:'{!!URL::to('staff/sem')!!}',   //route to work on, redirects to brach method
                data:{'id': course_id}, //pass data course ID to controller
                success:function(semData){  //on success
                    //variable semData is the response from controller. It contains data about sem
                    //It returns the number of semesters in the specified course and branch

                    //initail HTML, with disabled selection option
                    o+='<option value="-1" disabled selected>Select Semester</option>';

                    //Loop to display all the branches in the drop down
                    for(var i = 1;i<=semData.semesters;i++)
                    {
                        //Append HTML dynamically
                        //Make Dropdown Menu
                        //set value  = value of I as it starts from 1
                        //Display Sem number to user
                        o+='<option value="'+i+'">'+i+'</option>';
                    }

                    d.find('#sem').html("");    //Reset the div
                    d.find('#sem').append(o);   //add content of op to the div

                },
                error:function(){
                    //Enter some Error Message
                }
            });
        });
    });
</script>


@stop