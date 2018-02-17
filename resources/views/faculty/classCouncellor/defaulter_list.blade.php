@extends('faculty.layouts.dashboard') 
@section('page_heading','Defaulter List') 
@section('section') 
{{--HOD --}}


@if($query->dept_id==5)
	<div class="row">
		{{ Form::open(['action'=>'Councellor@defaulter_list', 'method'=>'GET']) }}
		<div class="col-sm-2">
			<div class="form-group">
				<select name="department" class="form-control">
					<option value="D5">D5</option>
					<option value="D10">D10</option>
					<option value="D15">D15</option>
					<option value="D20">D20</option>
				</select>
			</div>
		</div>
		{{Form::submit('Search', ['class'=>'btn btn-success',"name"=>"Search"])}}
		{{ Form::close() }}
	</div>
@elseif($query->dept_id==4)
	<div class="row">
		{{ Form::open([ 'method'=>'GET']) }}
		<div class="col-sm-2">
			<div class="form-group">
				<select name="department" class="form-control" value="">
					<option value="D4" >D4</option>
					<option value="D9" >D9</option>
					<option value="D14" >D14</option>
					<option value="D19">D19</option>
				</select>
			</div>
		</div>
		{{Form::submit('Search', ['class'=>'btn btn-success',"name"=>"Search"])}}
		{{ Form::close() }}
	</div>
@elseif($query->dept_id==3)
	<div class="row">
		{{ Form::open([ 'method'=>'GET']) }}
		<div class="col-sm-2">
			<div class="form-group">
				<select name="department" class="form-control">
					<option value="D5">D2</option>
					<option value="D10">D7</option>
					<option value="D15">D12</option>
					<option value="D20">D17</option>
				</select>
			</div>
		</div>
		{{Form::submit('Search', ['class'=>'btn btn-success',"name"=>"Search"])}}
		{{ Form::close() }}
	</div>
@elseif($query->dept_id==4)
	<div class="row">
		{{ Form::open([ 'method'=>'GET']) }}
		<div class="col-sm-2">
			<div class="form-group">
				<select name="department" class="form-control" value="">
					<option value="D4" >D4</option>
					<option value="D9" >D9</option>
					<option value="D14" >D14</option>
					<option value="D19">D19</option>
				</select>
			</div>
		</div>
		{{Form::submit('Search', ['class'=>'btn btn-success',"name"=>"Search"])}}
		{{ Form::close() }}
	</div>
@elseif($query->dept_id==3)
	<div class="row">
		{{ Form::open([ 'method'=>'GET']) }}
		<div class="col-sm-2">
			<div class="form-group">
				<select name="department" class="form-control">
					<option value="D3">D3</option>
					<option value="D8">D8</option>
					<option value="D13">D13</option>
					<option value="D18">D18</option>
					
				</select>
			</div>
		</div>
		{{Form::submit('Search', ['class'=>'btn btn-success',"name"=>"Search"])}}
		{{ Form::close() }}
	</div>
@elseif($query->dept_id==2)
	<div class="row">
		{{ Form::open([ 'method'=>'GET']) }}
		<div class="col-sm-2">
			<div class="form-group">
				<select name="department" class="form-control">
					<option value="D2">D2</option>
					<option value="D7">D7</option>
					<option value="D12">D12</option>
					<option value="D17">D17</option>
				</select>
			</div>
		</div>
		{{Form::submit('Search', ['class'=>'btn btn-success',"name"=>"Search"])}}
		{{ Form::close() }}
	</div>
@elseif($query->dept_id==1)
	<div class="row">
		{{ Form::open([ 'method'=>'GET']) }}
		<div class="col-sm-2">
			<div class="form-group">
				<select name="department" class="form-control">
					<option value="D1">D1</option>
					<option value="D6">D6</option>
					<option value="D11">D11</option>
					<option value="D16">D16</option>
				</select>
			</div>
		</div>
		{{Form::submit('Search', ['class'=>'btn btn-success',"name"=>"Search"])}}
		{{ Form::close() }}
	</div>
@endif

@if(isset($input))
	<div class="row ">
		<div class="col-sm-12">
			<div class="panel panel-default">
				<div class="panel-heading">

					<h3 class="panel-title">{{$dept}}	</h3>
				</div>
				<div class="panel-body">
					<table class="table table-striped">
						<thead>
							<tr>
							<th> Student Name</th>
							<th>Roll_No</th>
							<th>Subject</th>
							<th>Attendance</th>
							</tr>
						</thead>
						@foreach($students as $students)
						<tbody>
							<tr>
								<td>{{$students->FirstName}} </td>
								<td>john@gmail.com</td>
								<td>London, UK</td>
								<td>London, UK</td>
							</tr>
						</tbody>
						@endforeach
					</table>		
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<!--HOD-->
@endif
@stop