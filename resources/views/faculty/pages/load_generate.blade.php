@extends('faculty.layouts.dashboard')
@section('page_heading','Profile')
@section('section')

{{ Form::open(['action' => 'FacultyController@loadGeneration', 'method'=>'GET']) }}
@include('faculty.exam.layouts.filtersLoad')

<div class="page-container">
    @if(isset($allotments))
        <table class="table table-responsive table-striped">

            <thead>
            <tr>
                
                <th>Course</th>
                <th>Division</th>
                <th>Contact Head</th>
                <th>Hours</th>
                <th>Name</th>
            </tr>
            </thead>

            <tbody>
                @foreach($allotments as $allotment)
                    <tr>
                        
                        <td>{{$allotment->course_name}}</td>
                        <td>{{$allotment->division}}</td>
                        <td>{{$allotment->contact_head}}</td>
                        <td>{{$allotment->contact_head_hours}}</td>
                        <td>{{$allotment->first_name}} {{$allotment->last_name}}</td>
                    </tr>
                @endforeach
            </tbody>
        
        </table>
    @else
        <p class="lead-details">Please enter a valid class</p>
    @endif
</div>

@stop