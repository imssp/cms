{{-- @extends('student.layouts.dashboard')
@section('page_heading','Dashboard')
@section('section')

    <div class="col-md-10 col-sm-10">
        <iframe src="https://calendar.google.com/calendar/embed?showTitle=0&amp;showPrint=0&amp;showTz=0&amp;height=600&amp;wkst=2&amp;bgcolor=%23FFFFFF&amp;src=ves.ac.in_bql0ajrt7acnqvafac8di9e1nc%40group.calendar.google.com&amp;color=%23A32929&amp;src=ves.ac.in_1h06mbn2nhd98nj3747afssvac%40group.calendar.google.com&amp;color=%235229A3&amp;ctz=Asia%2FCalcutta" style="border-radius: 0px 0px 15px 15px" width="100%" height="500" frameborder="0" scrolling="no"></iframe>
    </div> --}}

@extends('layouts.plane')

@section('body')
<div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url ('/staff/home') }}">
                    <img src="{{ URL::to('images/cms-brand.png') }}" alt="brand logo">
                </a>
            </div>
            <!-- /.navbar-header -->

            <!-- <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <!-- <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <!-- /.dropdown-alerts -->
                <!-- </li>  -->
                <!-- /.dropdown -->
                <!-- <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> {{session('uid')}} <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                    </ul> -->
                    <!-- /.dropdown-user -->
                <!-- </li> -->
                <!-- /.dropdown -->
            <!-- </ul>  -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>

        <br><br><br><br><br>

        <div class="container">
            <div class="jumbotron">
                <h1>Page under Construction!</h1>
                <p class="lead-details">
                    Pretty soon, using this page you will be able to</p>
                    <ul>
                        <li>View and Update your profile.</li>
                        <li>View your attendance.</li>
                        <li>Check out your past internal and end semester examination results.</li>
                        <li>Do various applications.</li>
                    </ul>

                <p class="lead-details"> . . and much more.</p>
                <p class="lead-details">
                    We will update you once this page is functional. Thanks for your patience.
                </p>
                <p data-toggle="modal" data-target="#myModal">
                    <a><i class="fa fa-sign-out fa-fw"></i> Click here  to Logout</a>
                </p>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
            
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Logout Confirmation</h4>
                </div>
                <div class="modal-body">
                    <a
                        class="btn btn-primary"
                        onclick='document.location.href = "https://www.google.com/accounts/Logout?continue=https://appengine.google.com/_ah/logout?continue=http://cms.dev/logout";'>
                        <i class="fa fa-sign-out fa-fw"></i>
                        Logout from Google and CMS
                    </a>
                    <a
                        class="btn btn-primary"
                        href="/logout">
                        <i class="fa fa-sign-out fa-fw"></i>
                        Logout from CMS
                    </a>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
             
            </div>
        </div>
<!--
    <div class="page-container">
        <div class="row">
            <div class="col-sm-2 card">
                <header>Total Faculty</header>
                <p class="main">345</p>
            </div>

            <div class="col-sm-2 card">
                <header>Total Students</header>
                <p class="main">2783</p>
            </div>

            <div class="col-sm-2 card">
                <header>Teaching staff</header>
                <p class="main">221</p>
            </div>

        </div>
    </div>-->
@stop