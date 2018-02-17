@extends('faculty.layouts.attendance')
@section('page_heading','Student Attendance')
@section('content')
{{-- {{$Subject}}
{{$Course[1][2]}} --}}
@if($errors->any())
<div class="alert alert-danger text-center">
	{{ $errors->first() }}
</div>
@endif
<?php $id = 0?>
@if(count($Subject)>0)
@foreach($Subject as $Subject)
<div class="col-sm-offset-1 col-sm-10">
	<div class="panel-group" id="accordion">
		<div class="panel panel-default">
			<a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$id}}" style="text-decoration: none;">
				<div class="row">
					<div class="panel-heading">
						
						<div class="col-lg-5 input-lg">
							<h3 class="panel-title"><i class="fa fa-caret-down" aria-hidden="true"></i> {{$Course[$id][2]}}</h3>
						</div>
						<?php $count = 0; ?>
						<div class="col-lg-offset-1 col-lg-5 input-lg">
							@foreach($Class as $class)
							@if($count == substr($Subject->term_id, -3, 1))
							<h4 class="panel-title">
							{{$class['courseName']}} / {{$class['branches'][substr($Subject->term_id, -2, 1) - 1]['name']}} / SEM-{{substr($Subject->term_id, -1, 1)}} / DIV-{{$Subject->division}} / {{$Subject->contact_head}}
							</h4>
							<?php $count++; ?>
							@endif
							@endforeach
						</div>
					</div>
				</div>
			</a>
			<div id="collapse{{$id++}}" class="panel-collapse collapse">
				<div class="panel-body text-center">
					<!-- <hr> -->
					
					@if(count($roll[$id-1])>0)
						<h3>One or more Students are not assigned roll number(s). Please contact Class Teacher.</h3>
					@else
					{!! Form::open(['action'=>'StudentAttendanceController@date', 'method'=>'POST']) !!}
					<input type="hidden" name="SubAllotId" value="{{$Subject->sub_allotment_id}}">
					<input type="hidden" name="TermID" value="{{$Subject->term_id}}">
					<input type="hidden" name="Division" value="{{$Subject->division}}">
					<input type="hidden" name="ContactHead" value="{{$Subject->contact_head}}">
					<div class="row">
						<div class="col-md-10 col-md-offset-1">
							<div class="btn-block btn-group ">
								<button type="submit" name="submit" class="btn btn-primary col-xs-3" value="Add">ADD</button>
								<button type="submit" name="submit" class="btn btn-success col-xs-3" value="Update">UPDATE</button>
								<button type="submit" name="submit" class="btn btn-info col-xs-3" value="View">VIEW</button>
								<button type="submit" name="submit" class="btn btn-danger col-xs-3" value="Delete">DELETE</button>
							</div>
						</div>
					</div>
					{!! Form::close() !!}
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
@endforeach
@else
	<h3>No subjects are alloted to you! Please contact time table incharge.<h3>
@endif
@stop