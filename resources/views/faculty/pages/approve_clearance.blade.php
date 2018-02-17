@extends('faculty.layouts.dashboard')
@section('page_heading','Clearance Approval')
@section('section')
 <div class="col-sm-12">
      <table class="table table-hover">
         <tr>
            <th>UID</th>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Last Name</th>

         </tr>
         @foreach ($page_data as $detail)
         <tr>
            <td>{{ $detail->UID }}</td>
            <td>{{ $detail->FirstName }}</td>
            <td>{{ $detail->MiddleName }}</td>
            <td>{{ $detail->LastName}}</td>
            <td><button class = "btn btn-success"> APPROVE </button></td>
            <td><button class ="btn btn-danger"> DECLINE </button></td>
            
         </tr>
         @endforeach
      </table>
   
 </div>
@stop