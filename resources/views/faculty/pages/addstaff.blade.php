@extends('faculty.layouts.dashboard')
@section('page_heading','Add Staff')
@section('section')


<div class="page-container">
    <!--THIS IS FORM--> 
    {!! Form::open(['method'=>'POST','id' => 'validateform']) !!}
    <div class="row">
        <div class="col-sm-3">
            <label>Type : </label>
            <select class="form-control" name="type">
                <option value="-1" selected disabled>Select Staff Type</option>
                <option value="teaching">Teaching Staff</option>
                <option value="non_teaching">Non Teaching Staff</option>
            </select>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-3">
            <label>First Name : </label>
            <input type="text" class="form-control" name="first_name">
        </div>
        <div class="col-sm-3">
            <label>Middle Name : </label>
            <input type="text" class="form-control" name="middle_name">
        </div>
        <div class="col-sm-3">
            <label>Last Name : </label>
            <input type="text" class="form-control" name="last_name">
        </div>
        <div class="col-sm-3">
            <label>Short Form : </label>
            <input type="text" class="form-control" name="short_form">
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-3">
            <label>Department : </label>
            <select class="form-control" name="type">
                <option value="-1" selected disabled>Select Department</option>
                <option value="etrx">ETRX</option>
                <option value="comps">Computer Science</option>
                <option value="instru">Instrumentation</option>
                <option value="extc">EXTC</option>
                <option value="it">Information Technology</option>
                <option value="mca">MCA</option>
                <option value="hs">Humanities and Sciences</option>
                <option value="me">ME</option>
            </select>
        </div>
        <div class="col-sm-3">
            <label>Designation : </label>
            <input type="text" class="form-control" name="designation">
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-3">
            <label>Date of Birth : </label>
            <input type="date" class="form-control" name="dob">
        </div>
        <div class="col-sm-2">
            <label>Gender : </label>
            <select class="form-control" name="type">
                <option value="-1" selected disabled>Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </div>
        <div class="col-sm-3">
            <label>Email ID : </label>
            <input type="email" class="form-control" name="email">
        </div>
        <div class="col-sm-2">
            <label>Mobile Number : </label>
            <input type="text" class="form-control" name="mobile">
        </div>
        <div class="col-sm-2">
            <label>Landline : </label>
            <input type="text" class="form-control" name="landline">
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-4">
            <label>Address : </label>
            <textarea rows="4" class="form-control" name="address"></textarea>
        </div>
        <div class="col-sm-2">
            <label>Pincode : </label>
            <input type="number" class="form-control" name="pincode">
        </div>
        <div class="col-sm-2">
            <label>Aadhar Number : </label>
            <input type="number" class="form-control" name="aadhar">
        </div>
        <div class="col-sm-2">
            <label>PAN Card Number : </label>
            <input type="text" class="form-control" name="pancard">
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-2">
            <label>Date of Joining : </label>
            <input type="date" class="form-control" name="doj">
        </div>
        <div class="col-sm-2">
            <label>Date of Leaving : </label>
            <input type="date" class="form-control" name="dol">
        </div>
        <div class="col-sm-2">
            <label>Concol Number : </label>
            <input type="text" class="form-control" name="concol">
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-3">
            <label>Probation Start Date : </label>
            <input type="date" class="form-control" name="psd">
        </div>
        <div class="col-sm-3">
            <label>Probation End Date : </label>
            <input type="date" class="form-control" name="ped">
        </div>
    </div>
    <br>
    <div class=row>
        <div class="col-sm-4">
            <label>Expertise : </label>
            <textarea rows="3" class="form-control" name="expertise"></textarea>
        </div>
        <div class="col-sm-3">
            <label>Number of research papers : </label>
            <input type="number" class="form-control" name="noofpapers">
        </div>
    </div>
    <br>
    <br>
    <br>
    <div class="row">
        <div class="col-sm-5"></div>
        <div class="col-sm-2">
            <button type="submit" class="btn btn-success btn-lg btn-huge">Submit</button>
        </div>
    </div>
    {!! Form::close() !!}
</div>
@stop