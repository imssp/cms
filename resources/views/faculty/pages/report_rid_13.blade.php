@extends('faculty.layouts.dashboard')
@section('page_heading','Generate Report')
@section('section')
  
    <h4>Enter number of years for which staff is to be sorted according to date of joining (RID : 13)<h4><br>
    <div class="row">
        {{ Form::open(['action' => 'FacultyController@generate_list_with_doj', 'method'=>'GET']) }}
        <div class="col-sm-2">
            <div class="form-group">
                {{Form::number('year_doj', '', ['class'=> 'form-control', 'placeholder'=>'N years_doj'])}}
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
                        <th>Sr.No</th>                        
                        <th>E_id</th>
                        <th>Name</th>
                        
                        <th>Date of Joining</th>

                    </tr>
                </thead>
                <?php $i=0 ?> 
                @foreach($data as $d)                    
                <?php $i++ ?>
                    <tr>    
                        <td>{{$i}}</td>                   
                        <td>{{$d->e_id}}</td>
                        <td>{{$d->first_name}} {{$d->last_name}}</td>
                        <td>{{$d->doj}}</td>                        
                    </tr>
                @endforeach             
            </table>           
        </div>
    @endif
@stop


{{-- <select name="department" class="form-control">
                        @foreach($dep as $depart)
                            <option value="{{$depart->department}}">{{$depart->department}}</option>
                        @endforeach                             
                    </select>                   --}}