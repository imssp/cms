@extends('faculty.layouts.dashboard')
@section('page_heading','Assign Batches')
@section('section')
    <div class = "col-sm-10">
        <div class="panel panel-heading ">
            <div class="row">
                @if(@isset($page_data))
                    <div class="row">
                        <div class = "col-sm-2">
                            @if($x == 0 )
                                <h4>  Type : BE</h4>
                                
                            @elseif($x == 1 )
                                <h4>Type : ME</h4>

                            @elseif($x == 2 )
                                <h4>Type : MCA</h4>

                            @else($x == 3 )
                                <h4>Type : PhD</h4>

                            @endif
                        </div>
                        <div class = "col-sm-2">
                            @if($y == 1 )
                                <h4>Branch : ETRX</h4>                
                            @elseif($y == 2 )
                                <h4>Branch : CMPN</h4>                
                            @elseif($y == 3 )
                                <h4>Branch : EXTC</h4>                        
                            @elseif($y == 4 )
                                <h4>Branch : INST</h4>             
                            @elseif($y == 5 )
                                <h4>Branch : INFT</h4>
                            @endif
                        </div>
                    
                        <div class = "col-sm-2"><h4>Division : {{$w}}</h4></div>
                    
                        <div class = "col-sm-2">
                            @if($z == 1 )
                                <h4>SEM 1</h4>                
                            @elseif($z == 2 )
                                <h4>SEM 2</h4>                
                            @elseif($z == 3 )
                                <h4>SEM 3</h4>                        
                            @elseif($z == 4 )
                                <h4>SEM 4</h4>                    
                            @elseif($z == 5 )
                                <h4>SEM 5</h4>
                            @elseif($z == 6 )
                                <h4>SEM 6</h4>
                            @elseif($z == 7 )
                                <h4>SEM 7</h4>
                            @elseif($z == 8 )
                                <h4>SEM 8</h4>
                            @endif
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
                            <td>{{ $page_data[$i]->FirstName }}</td>
                            <td>{{ $page_data[$i]->LastName}}</td>
                            <td>{{ $page_data[$i]->roll_no}}</td>
                            <td>
                                <select id="form-control{{$i}}"class="form-control batch selectedSelects" name="{{$page_data[$i]->UID}}" onchange="changeFunction(value, {{$i}})">
                                    <option value=" ">Assign Batch</option>
                                    <option value="A">A Batch</option>
                                    <option value="B">B Batch</option>
                                    <option value="C">C Batch</option>
                                    
                                </select>
                            </td>
                        </tr>
                    @endfor
                </table>
                <div class="row">
                    <div class="col-sm-5"></div>
                        <div class="col-sm-2">        
                            <div class="span6 offset3">
                                {{Form::submit('Submit',['class'=>'btn btn-success btn-lg'])}}
                            </div>
                        </div>       
                </div>
            {!! Form::close() !!}
            {{-- form Close --}}
        @endif
    <script>
        function changeFunction($value, $i){
            var elements = document.getElementsByClassName("selectedSelects");
            for(var i=$i;i<elements.length;i++){
                document.getElementById("form-control" + i).value = $value;
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

