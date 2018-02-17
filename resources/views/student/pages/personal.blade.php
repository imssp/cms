@extends('student.layouts.dashboard')
@section('page_heading','Personal')
@section('section')
<div class="page-container">
<div class="profile">
    <div class="row">
        <div class="col-lg-2">
            <p class="text-muted" style="font-size:20px"><strong>UID</strong>#{{$students->uid}}</p>
        </div>
    <br>
        <div class="col-lg-3 col-xs-6 name pull-left" style="margin:5px">
            <strong style="font-size:40px">{{$students->first_name}}<br>{{$students->last_name}}</strong></br></br>
            <p>{{$students->branch}}</p>
            @if($students->gender == 1)
                <p>MALE</p>
            @else
                <p>FEMALE</p>
            @endif
           
        </div>
        <div class="col-lg-3 col-sm-12 address pull-left"  style="margin:10px">
            </br>
            <p>Sai Apt A-12</p>
            <p>Near Big Cinemas</p>
            <p>M.G.Road</p>
            <p>Thane,Mumbai-400607</p>
            <p>(+91)9673856798</p>
            <p>(022)25459687</p></br>
            <p class="text-primary">{{$students->email_id}}</p>
        </div>
        <div class="col-lg-3  col-xs-6 profilepic pull-left"  style="margin:5px">
            <img src="http://via.placeholder.com/150x150" style="width:170px;height:170px;background-color:#e0e0e0;border-radius:50%">
            <br></br><p class="text-primary">Last Seen: {{$students->last_active}}</p>
        </div>
    </div>      <!--/.header-->
    <hr>
        <div class="col-lg-4 col-xs-12 name pull-left col-lg-offset-1" >
            <strong class="text-danger" style="font-size:18px">Personal Details</strong></br></br>
            <dl>
                <dt>Date Of Birth</dt>
                <dd>{{$students->date_of_birth}}</dd>
                <br>
                <dt>Aadhar Number</dt>
                <dd>741283482423</dd>
                <br>
                <dt>Admission Type</dt>
                @if($students->type_of_admission == 0)
                    <dd>FE</dd>
                @else
                    <dd>DSE</dd>
                @endif    
                <br>
                <dt>Admission Year</dt>
                <dd>2016</dd>
                <br>
            </dl>
        </div>
        <div class="col-lg-4 col-xs-12 name pull-left" >
            <strong class="text-danger" style="font-size:18px">Extra Details</strong></br></br>
            <dl>
                <dt>Native Address</dt>
                <dd>Sai Apt A-12</dd>
                <dd>Near Big Cinemas</dd>
                <dd>M.G.Road</dd>
                <dd>Thane,Mumbai-400607</dd>
                <br>
            </dl>
        </div>
        <div class="col-lg-3 col-xs-12 name pull-left" >
            <strong class="text-danger" style="font-size:18px">Details</strong></br></br>
            <dl>
                <dt>Secondary Email</dt>
                <dd>user3@gmail.com</dd>
                <br>
                <dt>Blood Group</dt>
                <dd>B +ve</dd>
                <br>
            </dl>
        </div>
    </div>      <!--/.details-->
</div>  <!--/.profile-->

</div>

@stop