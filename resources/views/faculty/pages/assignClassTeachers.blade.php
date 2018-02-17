@extends('faculty.layouts.dashboard')
@section('page_heading','Assign Class Teacher')
@section('section')
    {{ Form::open(['action' => 'FacultyController@addCTCC', 'method'=>'POST']) }}
     <div class="table-area"> 
        <table class="table-responsive table col-sm-10 text-center" id="studList">
            <thead>
                <tr>
                    <th class="text-center">Branch</th>
                    <th class="text-center">Semester</th>
                    <th class="text-center">Division</th>
                    <th class="text-center">Class Teacher</th>
                    <th class="text-center">Class Counsellor</th>
                    <th class="text-center">Suggestions</th>
                </tr>
            </thead>
            <tbody>
            <tr></tr>
            @foreach($term_data as $term => $num_of_div)
                @for($i=0;$i<$num_of_div;$i++)
                    <tr>
                        <td>
                            @if((substr($term,3,1))==1)
                                ETRX
                            @elseif((substr($term,3,1))==2)
                                CMPN
                            @elseif((substr($term,3,1))==3)
                                INST
                            @elseif((substr($term,3,1))==4)
                                EXTC
                            @elseif((substr($term,3,1))==5)
                                INFT
                            @endif
                        </td>
                        <td>{{substr($term,4,1)}}</td>
                        <td>{{chr($i + 65)}}</td>
                        <td><input type="text" name="ct" class="staff-input form-control" required></td>
                        <td><input type="text" name="cc" class="cc form-control" required></td>
                        <td class="suggestion"></td>
                        <input type="hidden" name="term_id" value="{{$term}}">
                        <input type="hidden" name="div" value="{{chr($i + 65)}}">
                        <input type="hidden" class="hidden-input-ct" name="ct_{{$term}}_{{chr($i + 65)}}">
                        <input type="hidden" class="hidden-input-cc" name="cc_{{$term}}_{{chr($i + 65)}}">
                    </tr>
                @endfor
            @endforeach
            </tbody>
        </table>
     </div> 
    <button type="submit" class="btn btn-success pull-right col-sm-2">Submit</button><br><br>
    {{ Form::close() }}
@stop

<script src="{{ mix('js/app.js') }}"></script>
<script type="text/javascript">
    
    // Suggestions to get Name of Faculty
    $(document).ready(function()
    {
        $(document).on('keyup','.staff-input',function()
        {
            var staff_name = $(this).val();
            var tr = $(this).parent().parent();
            if(staff_name.length > 1)
            {
                console.log(staff_name);
                $.ajax(
                {
                    type:'get',
                    url:'{!!URL::to('staff/faculty/match')!!}',
                    data:{'term': staff_name},
                    success:function(match)
                    {
                        console.log(match);
                        console.log(match['e_id']);
                        var ct_name = match['first_name']+' '+match['last_name'];
                        if(ct_name != "undefined undefined")
                        {
                            tr.find('.suggestion').html(ct_name);
                            tr.find('.hidden-input-ct').val(match['e_id']);
                        }
                        else
                        {
                            tr.find('.suggestion').html("Not Found");
                        }
                        $(document).on('change','.staff-input',function()
                        {
                            if(ct_name != "undefined undefined")
                            {
                                tr.find('.staff-input').val(ct_name);
                                tr.find('.suggestion').html('');
                            }
                        });
                    },
                    error:function(){
                        console.log("Error");
                    }
                });
            }
        });

        $(document).on('keyup','.cc',function()
        {
            var staff_name = $(this).val();
            var tr = $(this).parent().parent();
            if(staff_name.length > 1)
            {
                console.log(staff_name);
                $.ajax(
                {
                    type:'get',
                    url:'{!!URL::to('staff/faculty/match')!!}',
                    data:{'term': staff_name},
                    success:function(match){
                        console.log(match);
                        console.log(match['e_id']);
                        var cc_name = match['first_name']+' '+match['last_name'];
                        if(cc_name != "undefined undefined")
                        {
                            tr.find('.suggestion').html(cc_name);
                            tr.find('.hidden-input-cc').val(match['e_id']);
                        }
                        else
                        {
                            tr.find('.suggestion').html("Not Found");
                        }
                        $(document).on('change','.cc',function()
                        {
                            if(cc_name != "undefined undefined")
                            {
                                tr.find('.cc').val(cc_name);
                                tr.find('.suggestion').html('');
                            }
                        });
                    },
                    error:function(){
                        console.log("Error");
                    }
                });
            }
        });

    });
</script>

{{-- Old Codes -css
.table-area {
  position: relative;
  z-index: 0;
  margin-top: 50px;
}
table.table-responsive {
  display: table;
  /* required for table-layout to be used (not normally necessary; included for completeness) */
  table-layout: fixed;
  /* this keeps your columns with fixed with exactly the right width */
  width: 100%;
  /* table must have width set for fixed layout to work as expected */
  height: 100%;
}

table.table-responsive thead
{
    position: fixed;
    top: 50px;
    left: 0;
    right: 0;
    width: 100%;
    height: 50px;
    margin-bottom: 20px;
    line-height: 3em;
    background: #eee;
    table-layout: fixed;
    display: table;
}

table.responsive-table th {
  background: #eee;
}

table.responsive-table td {
  line-height: 2em;
}

table.responsive-table tr > td,
table.responsive-table th {
  text-align: left;
}
   --}}


{{-- Old Code - suggestion
        /*$(document).on('change','.staff-input', function(){
            var staff_name = $(this).val();
            var tr = $(this).parent().parent();
            $.ajax({
                type:'get',
                url:'{!!URL::to('staff/faculty/match')!!}',
                data:{'term': staff_name},
                success:function(match){
                    console.log(match);
                    console.log(match['e_id']);
                    tr.find('.suggestion').html(match['first_name']+' '+match['last_name']);
                    tr.find('.staff-input').val(match['first_name']+' '+match['last_name']);
                    tr.find('.hidden-input-ct').val(match['e_id']);
                },
                error:function(){
                    console.log("Error");
                }
            });
        });*/
        /*$(document).on('change','.cc', function()
        {
            var staff_name = $(this).val();
            var tr = $(this).parent().parent();
            $.ajax({
                type:'get',
                url:'{!!URL::to('staff/faculty/match')!!}',
                data:{'term': staff_name},
                success:function(match){
                    console.log(match);
                    console.log(match['e_id']);
                    tr.find('.suggestion').html(match['first_name']+' '+match['last_name']);
                    tr.find('.cc').val(match['first_name']+' '+match['last_name']);
                    tr.find('.hidden-input-cc').val(match['e_id']);
                },
                error:function(){
                    console.log("Error");
                }
            });
        });*/

        
--}}