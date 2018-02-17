@extends('faculty.layouts.dashboard')
@section('page_heading','Confirm Roll')
@section('section')

<div class = "col-sm-8 col-md-8">
    @if(count($data)>1)
    {!! Form::open(['method'=>'POST','action' => 'ClassTeacherController@update_roll']) !!}
        <table class="table table-hover">
            <tr>
                <th>Sr No</th>
                <th>UID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Roll no.</th>
            </tr>
            @for($i=0; $i<count($data); $i++)
            <tr>
                <td>{{ $i+1 }}</td>
                <td>{{$data[$i]->UID}}</td>
                <td>{{$data[$i]->first_name}}</td>
                <td>{{$data[$i]->last_name}}</td>
                <td classs="form-control" width=20%>
                    {{$rolls[$i]}}
                </td>
            </tr>
            @endfor
        </table>
    @endif
    <div class="row">
        <div class="col-md-4 col-sm-4 "></div>
        <div class="col-md-2 col-sm-2">
            {{Form::submit('Submit',['class'=>'btn btn-success btn-lg'])}}
        </div>  
    </div>
    {!! Form::close() !!}
    {{-- form Close --}}

@stop