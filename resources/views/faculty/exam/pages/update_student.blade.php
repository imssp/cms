@extends('faculty.layouts.dashboard')
@section('page_heading','Student Results')
@section('section')

{{ Form::open(['action' => 'ExamDeptController@show_update_student', 'method'=>'GET']) }}
@include('faculty.exam.layouts.filters')
    
    @if(isset($term_id))
        <div class="page-container">
        {{--  check branch of student from termid ie., last digit of termid  --}}
        <h3><span class="col-sm-offset-1">Branch: 
            @if((substr($term_id,3,1))==1)
                ETRX
            @elseif((substr($term_id,3,1))==2)
                CMPN
            @elseif((substr($term_id,3,1))==3)
                INST
            @elseif((substr($term_id,3,1))==4)
                EXTC
            @elseif((substr($term_id,3,1))==5)
                INFT
            @endif</span>
        <span class="col-sm-offset-2">Semester: {{substr($term_id,4,1)}}</span>
        <span class="col-sm-offset-2">Division: {{chr($division + 64)}}</h3></span><br><br>

            {{-- Table showing students Already in that term --}}
                @if(isset($array2))
                    <h3>Students already in this term</h3>
                    <div class="col-sm-12">
                        <div class="table-responsive col-sm-11">
                            <table class="table col-sm-10 text-center">
                                <tr>
                                    <th class="text-center">UID</th>            
                                    <th class="text-center">Student Name</th>            
                                </tr>
                                @foreach($array2 as $uid => $name)
                                <tr>
                                    <td>{{$uid}}</td>
                                    <td>{{$name}}</td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                @endif
            
            {{-- Table showing students ABOUT to be enrolled in that term --}}
            @if(!empty($array))
                
            @else
                {{--  <div class="alert alert-info alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    There are no records of students in the previous term
                </div>  --}}
            @endif

            <div class="col-sm-12">
                <div class="table-responsive col-sm-11">
                    {{ Form::open(['action' => 'ExamDeptController@enrollStudents', 'method'=>'POST']) }}
                    <table class="table col-sm-10 text-center" id="studList">
                        <tr>
                            <th>Select</th>            
                            <th class="text-center">UID</th>            
                            <th class="text-center">Student Name</th>            
                        </tr>
                        @foreach($array as $uid => $name)
                        <tr id="stud">
                            <td>{!! Form::checkbox('selected[]', $uid, 'true', ['class' => 'checkbox']) !!}</td>
                            <td id="stud_uid">{{$uid}}</td>
                            <td>{{$name}}</td>
                        </tr>
                        @endforeach
                    </table><br><hr>
                    {{Form:: hidden('term_id',$term_id)}}
                    {{Form:: hidden('division',$division)}}
                    <button type="button" class="btn btn-danger col-sm-3 pull-left" onclick="removeStudents()">Remove these Students</button>
                    <button type="submit" class="btn btn-success col-sm-3 pull-right">Enroll these Students</button><br><br><br>
                    
                    {{ Form::close() }}
                    
                </div>
            </div>
            
            {{-- Form to enroll new students --}}
            <br><br><br><br>
            
            <div class="col-sm-6">
                <div class="input-group">
                    <input type="text" name="uid" id="uid" class="form-control" placeholder="UID">
                    <div class="input-group-btn">
                        <input type="submit" name="addStudent" id="addStudent" class="btn btn-secondary" onclick="addToTable()" value="Add this Student" >
                        <input type="hidden" name="term_id_old" value="{{$term_id_old}}" id="term_id_old">
                        <input type="hidden" name="term_id" value="{{$term_id}}" id="term_id">
                    </div>
                </div>
            </div><br><br><br>.

        </div>
    @else
        
    @endif

@stop

<script>
// Add students to the table
function addToTable()
{
    $uid = $("#uid").val();
    $term_id_old = $("#term_id_old");
    $term_id = $("#term_id").val();
    var exit_check;
    $uid_array = $uid.split(',');

    /*To check if the UID is already there in the list*/
    $("#studList #stud #stud_uid").each(function(index){
        if(($(this).text()) == $uid)
        {
            alert("Student can't be added as he/she is already present in the list");
            exit_check = 1;
        }
    });
    if(exit_check == 1)
        return;
    
    $to_be_deleted = [];
    for($i=0;$i<$uid_array.length;$i++)
    {
        $("#studList #stud #stud_uid").each(function(index){
            if(($(this).text()) == $uid_array[$i])
            {
                alert($uid_array[$i]+" can't be added as he/she is already present in the list");
                $to_be_deleted.push($to_be_deleted,$uid_array[$i]);
            }
        });
    }
    for($i=$uid_array.length-1;$i>=0;$i--)
    {
        for($j=0;$j<$uid_array.length;$j++)
        {
            if($uid_array[$i] == $to_be_deleted[$j])
            {
                $uid_array.splice($i,1);
            }
        }
    }
    /*End checking */

    
    /* To add students into table */
    $.ajax({
        type:'post',
        url:'{!!URL::to("staff/exam/update/student/addStudent")!!}',
        data:{"uid": $uid,
              "uid_array":$uid_array,
              "term":$term_id,
              "_token":"{{ csrf_token() }}"},
        success:function($name)
        {
            console.log('success4');
            console.log(name);
            console.log($term_id_old);
            
            for($i=0;$i<$uid_array.length;$i++)
            {
                if($name[$i] == "DontAdd")
                {
                    alert($uid_array[$i]+" can't be added as he/she is already enrolled in another term");
                    continue;
                    //return;
                }
                else if($name[$i].indexOf("name") != -1)        //Student from different branch
                {
                    var cnfm = confirm("This student is form a different branch. Are you sure you want to add him/her?");
                    if(cnfm == true)
                    {
                        $name[$i] = $name[$i].replace("name", "");
                        $("#studList").append(
                            '<tr id="stud"><td><input type="checkbox" checked class="checkbox" name="selected[]" value='+$uid_array[$i]+'></td>'+'<td id="stud_uid">'+$uid_array[$i]+'</td>'+'<td>'+$name[$i]+'</td>'+'</tr>');
                    }
                    
                }
                else
                {
                    $("#studList").append(
                    '<tr id="stud"><td><input type="checkbox" checked class="checkbox" name="selected[]" value='+$uid_array[$i]+'></td>'+'<td id="stud_uid">'+$uid_array[$i]+'</td>'+'<td>'+$name[$i]+'</td>'+'</tr>');
                }
            }  
        },
        error:function(response)
        {
            if(response == "abc")
                alert("Cant add student as he is in a different Term");
            alert("Invalid UID ");
            console.log('failed');
        }
    });
}

function removeStudents()
{
    $term_id = $("#term_id").val();
    var cnfm = confirm("Are you sure you want to remove all these students from this term ?");
    if(cnfm == true)
    {
        $.ajax({
            type:'post',
            url:'{!!URL::to("staff/exam/update/student/remove")!!}',
            data:{
                "term":$term_id,
                "_token":"{{ csrf_token() }}"},
            success:function(name)
            {
                console.log("success 5");
                console.log(name);
                location.reload();
            },
            error:function(response)
            {
                console.log('failed');
            }
        });
    }
}

</script>