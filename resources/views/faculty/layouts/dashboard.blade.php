@extends('layouts.plane')
@section('body')

@include('faculty.layouts.cms_roles')

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
                <!-- To be added later when notifications are enabled -->
                {{-- <li class="dropdown">
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
                </li> --}}

                <!-- /.dropdown -->
                

                <!-- <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-adjust fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="/theme/red">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> Red
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="/theme/blue">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> Blue
                                </div>
                            </a>
                        </li>
                    </ul>
                </li> -->


                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li>
                            <a><big><i class="fa fa-user fa-fw"></i> {{session('first_name')}} {{session('last_name')}}</big></a>
                            <a>&nbsp;&nbsp;<i class="fa fa-angle-double-right fa-fw"></i><small> EID - {{session('e_id')}}</small></a>
                            <a>&nbsp;&nbsp;<i class="fa fa-angle-double-right fa-fw"></i><small> {{session('email')}}</small></a>
                        </li> 
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
                        <li class="sidebar-search">
                        {{ Form::open(['action' => ['FacultyController@searchStudent'], 'method' => 'GET']) }}
                            <div class="input-group custom-search-form">
                            
                                <input type="text" class="form-control" placeholder="Search Student.." name="q" id="q">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit" name="Search">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            
                            </div>
                            {{ Form::close() }}
                            <!-- /input-group -->
                        </li>
                        {{-- <li class="sidebar-search">
                            <div class="input-group custom-search-form" >


                            
                               {{-- {!! Form::open(['action'=> 'PagesController@search_result' , 'method' => 'GET']) !!}
                                  <div class="col-sm-8">  {{Form::text('search', '' , ['class'=>'form-control ', 'placeholder' => 'Search..'])}} </div>
                                    {{Form::submit('Search' , ['class' => 'btn btn-default'])}}
                               {!! Form::close() !!} --}}
                                {{-- <input type="text" class="form-control" placeholder="Search..."> 
                                
                                <div class="col-sm-8">
                                    {{ Form::text('q', '', ['id' =>  'q', 'placeholder' =>  'Student', 'class' => 'form-control'])}}
                                </div>
                                    {{ Form::submit('Search', array('class' => 'btn btn-default')) }}
                                
                                {{-- <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                                </span>  
                            </div>
                             input-group
                        </li> --}}
                        
                        <li {{ (Request::is('/staff/home') ? 'class="active"' : '') }}>
                            <a href="{{ url ('/staff/home') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>

                        <li >
                            <a href="#"><i class="fa  fa-user fa-fw "></i> Personal<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li {{ (Request::is('/staff/profile') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/staff/profile') }}"><i class="fa  fa-user-plus fa-fw"></i> Profile</a>
                                </li>
                                <li {{ (Request::is('/staff/attendance/faculty') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/staff/attendance/faculty' ) }}"><i class="fa fa-pencil-square-o"></i> My Attendance</a>
                                </li>
                                <li {{ (Request::is('/staff/remarks') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/staff/remarks' ) }}"><i class="fa fa-comment"></i> My Remarks</a>
                                </li>
                                @foreach(session('types') as $type)
                                    @if($type == STAFF)
                                        <li {{ (Request::is('/staff/courses') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('/staff/courses') }}"><i class="fa fa-book fa-fw"></i> Courses Taught</a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                        @foreach(session('types') as $type)
                            @if($type == STAFF)

                                <li {{ (Request::is('/staff/StudentAttendance') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/staff/StudentAttendance') }}"><i class="fa fa-pencil-square-o"></i>Student Attendance</a>
                                </li>
                            @endif
                        @endforeach

                        {{-- For now Report Generation is through HOD and principal --}}
                        {{-- @foreach(session('roles') as $role)
                            @if($role == HOD)
                                <li {{ (Request::is('/staff/report') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/staff/report') }}"><i class="fa  fa-list-alt fa-fw"></i> Generate Report</a>
                                </li>
                            @endif
                        @endforeach --}}

                        @foreach(session('roles') as $role)
                            @if($role == 1)
                                <li {{ (Request::is('/staff/principal/report') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/staff/principal/report') }}"><i class="fa  fa-list-alt fa-fw"></i> Reports</a>
                                </li>
                            @endif
                        @endforeach

                        @foreach(session('roles') as $role)
                            @if($role == 2)
                                <li {{ (Request::is('/staff/hod/report') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/staff/hod/report') }}"><i class="fa  fa-list-alt fa-fw"></i> Reports</a>
                                </li>
                            @endif
                        @endforeach

                        @foreach(session('roles') as $role)
                            @if($role == 4)
                                <li {{ (Request::is('/staff/syllabus') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/staff/syllabus') }}"><i class="fa  fa-book fa-fw"></i> Update Syllabus Schema</a>
                                </li>
                            @endif
                        @endforeach

                        @foreach(session('roles') as $role)
                            @if($role == 9)
                                <li {{ (Request::is('/staff/course/assign') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/staff/course/assign') }}"><i class="fa  fa-refresh fa-fw"></i> Assign Staff</a>
                                </li>
                            @endif
                        @endforeach

                        @foreach(session('roles') as $role)
                            @if($role == 303)
                                <li >
                                    <a href="#"><i class="fa fa-clipboard"></i> Exam Department<span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        <li {{ (Request::is('/staff/exam/update/student') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('/staff/exam/update/student') }}">Update Student List</a>
                                        </li>
                                        {{-- <li {{ (Request::is('/staff/exam/update/reval') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('/staff/exam/update/reval' ) }}">Revaluation Update</a>
                                        </li> --}}
                                    </ul>
                                    <!-- /.nav-second-level -->
                                </li>
                            @endif
                        @endforeach

                        @foreach(session('roles') as $role)
                            @if($role == 306)
                                <li >
                                    <a href="#"><i class="fa fa-list-ul"></i> Exam Department<span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        <li {{ (Request::is('/staff/exam/update/result') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('/staff/exam/update/result' ) }}">Update Results</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-second-level -->
                                </li>
                            @endif
                        @endforeach
                                
                        
                        @foreach(session('roles') as $role)
                            @if($role == 304)
                                <li >
                                    <a href="#"><i class="fa  fa-user-circle"></i> Clerk<span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        <li {{ (Request::is('/staff/update_student') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('/staff/update_student') }}"><i class="fa fa-pencil-square-o"></i> Update Student Data </a>
                                        </li>
                                        <li {{ (Request::is('/staff/update_staff') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('/staff/update_staff' ) }}"><i class="fa fa-pencil-square-o"></i> Update Staff Data</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-second-level -->
                                </li>
                            @endif
                        @endforeach

                        @foreach(session('roles') as $role)
                            @if($role == 305)
                                <li >
                                    <a href="#"><i class="fa fa-edit"></i> Approve Applications<span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        <li {{ (Request::is('/staff/approve-clearance') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('/staff/approve-clearance') }}"><i class="fa fa-calendar fa-fw"></i> Clearance </a>
                                        </li>
                                        <li {{ (Request::is('/staff/approve-bonafide') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('/staff/approve-bonafide' ) }}"><i class="fa fa-calendar fa-fw"></i> Bonafide </a>
                                        </li>
                                        <li {{ (Request::is('/staff/approve-transcript') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('/staff/approve-transcript' ) }}"><i class="fa fa-calendar fa-fw"></i> Transcript </a>
                                        </li>
                                        <li {{ (Request::is('/staff/approve-lc') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('/staff/approve-lc' ) }}"><i class="fa fa-calendar fa-fw"></i> Leaving Certificate </a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-second-level -->
                                </li>
                            @endif
                        @endforeach


                        @foreach(session('roles') as $role)
                            @if($role == 7)
                                <li >
                                    <a href="#"><i class="fa fa-user-secret"></i>Class Councellor<span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                    <li {{ (Request::is('/staff/defaulterList') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('/staff/defaulterList' ) }}"><i class="fa fa-check-square-o"></i>Defaulter List</a>
                                    </ul>
                                </li>
                            @endif
                        @endforeach
                            
                                
                        @foreach(session('roles') as $role)
                            @if($role == 6)
                                <li >
                                    <a href="#"><i class="fa fa-user-secret"></i> Class Teacher<span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        <li {{ (Request::is('/staff/assign_uid') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('/staff/assign_uid') }}"><i class="fa fa-bookmark-o"></i>  Assign UIDs to Batches </a>
                                        </li>
                                        <li {{ (Request::is('/staff/assign_roll') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('/staff/assign_roll' ) }}"><i class="fa fa-bookmark-o"></i>  Assign Roll no </a>
                                        </li>
                                        <li {{ (Request::is('/staff/attendance_report') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('/staff/attendance_report') }}"><i class="fa fa-bookmark-o"></i>  Generate Attendance Report </a>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                        @endforeach


                        @foreach(session('roles') as $role)
                            @if($role == 8)
                                <li >
                                    <li {{ (Request::is('/staff/assign/CTCC') ? 'class="active"' : '') }}>
                                        <a href="{{ url ('/staff/assign/CTCC') }}"><i class="fa fa-bookmark-o"></i>  Assign Class Teacher</a>
                                    </li>
                                </li>
                            @endif
                        @endforeach

                        @foreach(session('roles') as $role)
                            @if($role == 0)
                                <li >
                                    <li {{ (Request::is('/staff/admin') ? 'class="active"' : '') }}>
                                        <a href="{{ url ('/staff/admin') }}"><i class="fa fa-users fa-fw"></i>  Assign Roles</a>
                                    </li>
                                </li>
                            @endif
                        @endforeach

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