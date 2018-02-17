@extends('faculty.layouts.dashboard')
@section('page_heading','Student Attendance')
@section('section')

<?php use App\HelperFunctions; ?>

<div class="col-md-12">
	<!--Card-->
	@if(count($subject_details)>0)
	@foreach($subject_details as $subject_detail)
<div class="card col-md-4">

    <!--Card image-->
    <!--<img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20%282%29.jpg" alt="Card image cap">-->
    <!--/.Card image-->

	<script>
		var form = document.getElementById("next");

		form.addEventListener("click", function () {
			form.submit();
		});

	</script>

    <!--Card content-->
    <div class="card-block">

        <form id="next" action="student/addattendancerecord" method="POST"> 
			<!--Title-->
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<input type="hidden" name="suballotid" value="{{ $subject_detail->sub_allotment_id }}">
			<input type="hidden" name="termid" value="{{ $subject_detail->term_id }}">
	        <input type="hidden" name="div" value="{{ $subject_detail->division }}">
			

			<h3 class="card-title" >
				{{ $subject_detail->course_name }}
			</h3>

	        <!--Text-->
			<p class="card-left-text">
				{{ HelperFunctions::getDepartment($subject_detail->term_id) }} - {{$subject_detail->division}}
			</p>

	        <p class="card-right-text">
	        	{{ HelperFunctions::getFullContactHead($subject_detail->contact_head) }}
	        </p>
		<!--<input type="submit" name="submit" value="Go" class="btn btn-primary btn-lg">-->
        </form>
    </div>
    <!--/.Card content-->

</div>
@endforeach
<!--/.Card-->
	<!--
		
		
		
	-->
	@endif
</div>
@stop