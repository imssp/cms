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

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> {{session('uid')}} <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li data-toggle="modal" data-target="#myModal">
                            <a><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li {{ (Request::is('student') ? 'class="active"' : '') }}>
                            <a href="{{ url ('student/') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
                        </li>
                        <li >
                            <a href="#"><i class="fa fa-user-plus fa-fw"></i> Profile<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li {{ (Request::is('student/personal') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/student/personal') }}">Personal</a>
                                </li>
                                <li {{ (Request::is('student/academic') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('student/academic' ) }}">Academic<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li {{ (Request::is('student/current-academic') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('student/current-academic') }}">Current-Academic</a>
                                        </li>
                                        <li {{ (Request::is('student/pre-academic') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('student/pre-academic') }}">Pre-Academic</a>
                                        </li>
                                    </ul>
                                </li>
                                <li {{ (Request::is('student/achievements') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('student/achievements' ) }}">Achievements</a>
                                </li>
                                <li {{ (Request::is('student/responsibilities') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('student/responsibilities' ) }}">Roles & Responsibilities</a>
                                </li>
                                <li {{ (Request::is('student/mentor') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('student/mentor' ) }}">Mentor</a>
                                </li>
                                <li {{ (Request::is('student/remarks') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('student/remarks' ) }}">Remarks</a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        
                        <li {{ (Request::is('student/attendance') ? 'class="active"' : '') }}>
                            <a href="{{ url ('student/attendance' ) }}"><i class="fa  fa-check-square-o fa-fw "></i> Attendance</a>
                        </li>

                        <li {{ (Request::is('student/applications') ? 'class="active"' : '') }}>
                            <a href="{{ url ('student/applications') }}"><i class="fa fa-edit fa-fw"></i> </i> Applications<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li {{ (Request::is('student/apply-lc') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('student/apply-lc' ) }}">Leaving Certificate</a>
                                </li>
                                <li {{ (Request::is('student/apply-clearance') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('student/apply-clearance' ) }}">Clearance</a>
                                </li>
                                <li {{ (Request::is('student/apply-railway') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('student/apply-railway' ) }}">Railway Concession</a>
                                </li>
                                <li {{ (Request::is('student/apply-bonafide') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('student/apply-bonafide' ) }}">Bonafide</a>
                                </li>
                                <li {{ (Request::is('student/apply-transcript') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('student/apply-transcript' ) }}">Transcript</a>
                                </li>
                            </ul>
                        </li>
                        <li {{ (Request::is('student/report') ? 'class="active"' : '') }}>
                            <a href="{{ url ('student/report') }}"><i class="fa fa-exclamation"></i> Report Discrepancies</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

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

        <div id="page-wrapper">
			 <div class="row">
                <div class="col-lg-12">
                   
                    <div id="page-heading"></div>
                </div>
                <!-- /.col-lg-12 -->
           </div>
			<div class="row">
                   
				@yield('section')

            </div>
            <!-- /#page-wrapper -->
        </div>
    </div>

@stop

