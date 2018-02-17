@extends('faculty.layouts.dashboard') 
@section('page_heading','Defaulter List') 
@section('section') 
<div class="container">
{{--@if($query->dept_id==5)--}}
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
{{--@elseif($query->dept_id==4)
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
@endif--}}


    <button  class="btn btn-default  " data-toggle="collapse" data-target="#demo" style="width:40%">Collapsible</button>
    <div id="demo" class="collapse" style="width:40%;border:solid lightgrey 1px;margin:0.4% 0 0 0 ">
       {{count($students)}}
    </div>
</div>

@stop