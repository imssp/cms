@extends('faculty.layouts.dashboard')
@section('page_heading','Assign Batches')
@section('section')
<div class = "col-sm-10">
    <div class="panel panel-heading ">
        <div class="row">
            @if(@isset($page_data))
            <div class="row">

                <div class = "col-sm-2">
                    <div class="col-md-offset-5 col-xs-offset-5 onoffswitch-ct">
                        <input type="checkbox" name="onoffswitch-ct" class="onoffswitch-ct-checkbox" id="myonoffswitch-ct" onclick="flag_switch()">
                        <label class="onoffswitch-ct-label" for="myonoffswitch-ct">
                            <span class="onoffswitch-ct-inner"></span>
                            <span class="onoffswitch-ct-switch"></span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::open(['method'=>'POST','action' => 'ClassTeacherController@confirm_batches']) !!}
    <table class="table table-hover">
        <tr>
            <th>Sr No</th>
            <th>UID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Roll no.</th>
            <th>Batch</th>
        </tr>
        @for($i=0; $i<count($page_data); $i++)
        <tr>
            <td>{{ $i+1 }}</td>
            <td>{{ $page_data[$i]->UID }}</td>
            <td>{{ $page_data[$i]->first_name }}</td>
            <td>{{ $page_data[$i]->last_name}}</td>
            <td>{{ $page_data[$i]->roll_no}}</td>
            <td>
                <select id="form-control{{$i}}"class="form-control batch selectedSelects" name="{{$page_data[$i]->UID}}" onchange="changeFunction(value, {{$i}})">
                    <option value="A" {{ ((($page_data[$i]->batch)=='A') ? 'selected="selected"' : '') }}>A</option>
                    <option value="B" {{ ((($page_data[$i]->batch)=='B') ? 'selected="selected"' : '') }}>B</option>
                    <option value="C" {{ ((($page_data[$i]->batch)=='C') ? 'selected="selected"' : '') }}>C</option>
                </select>
            </td>
        </tr>
        @endfor
    </table>
    <div class="row">
        <div class="col-sm-5"></div>
        <div class="col-sm-2">        
            <div class="span6 offset3">
                {{Form::submit('Confirm',['class'=>'btn btn-success btn-lg'])}}
            </div>
        </div>       
    </div>
    {!! Form::close() !!}
    {{-- form Close --}}
    @endif
    <script>
        var flag=true;
        function flag_switch(){
            if(flag==true){
                flag=false;
            }
            else{
                flag=true;
            }
        }
        function changeFunction($value, $i){
            if(flag==true){
                var elements = document.getElementsByClassName("selectedSelects");
                for(var i=$i;i<elements.length;i++){
                    document.getElementById("form-control" + i).value = $value;
                }
            }
        }
        
    </script>
    <!--jquery for disability
    <script>
        $(document).ready(function() {
            $('#submit_button').prop('disabled', true);
            $('#form-control').onchange(function() {
                if($(this).val() =) {
                    $('#submit_button').prop('disabled', false);
            }
            });
        });
    </script>-->

    <!--<script>
    // $(document).ready(function() {
    //     $(#submit_button).prop('disabled',true);
    //     setTimeout(function(){
    //           $('#submit_button').prop('disabled', false);
    //       },14000);
    // });
    // <script>-->
    @stop

