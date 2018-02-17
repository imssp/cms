@extends('faculty.layouts.attendance')
@section('page_heading','Select Date')
@section('content')
<div class="">
	<div class="row"> 
		@if($request->submit == 'View')
			<h3>Show attendance by date: </h3><br>
			
			<div class="col-sm-10 col-sm-offset-1">
			{!! Form::open(['action'=>'StudentAttendanceController@control', 'method'=>'POST']) !!}
				<div class="col-sm-offset-2 col-sm-4">
					<div class="form-group ">
						@if(strtotime($Date['end_date']) > time())
							<input class="form-control text-center input-lg" id="date" name="Date" max="{{date("Y")}}-{{date("m")}}-{{date("d")}}" min="{{$Date['start_date']}}" onfocus="(this.type='date')" onblur="(this.type='text')" placeholder="ENTER DATE" value="{{date("Y")}}-{{date("m")}}-{{date("d")}}" required/>
						@else
							<input class="form-control text-center input-lg" id="date" name="Date" max="{{$Date['end_date']}}" min="{{$Date['start_date']}}" onfocus="(this.type='date')" onblur="(this.type='text')"  placeholder="ENTER DATE" value="{{date("Y")}}-{{date("m")}}-{{date("d")}}" required/>
						@endif
					</div>
					<input type="hidden" name="SubAllotId" value="{{$request->SubAllotId}}">
					<input type="hidden" name="TermID" value="{{$request->TermID}}">
					<input type="hidden" name="Division" value="{{$request->Division}}">
					<input type="hidden" name="ContactHead" value="{{$request->ContactHead}}">
					<input type="hidden" name="submit" value="{{$request->submit}}">

				</div>
				<div class="col-sm-2">
					<button type="submit" name="next" class="btn btn-danger btn-lg" value="submit">Next</button>
				</div>	
			{!! Form::close() !!}
		</div>	
		@elseif($request->submit == 'Update')

		<div class="col-sm-offset-1 col-sm-10">
			<div class="panel-group" id="accordion">
				<div class="panel panel-default">
					<a data-toggle="collapse" data-parent="#accordion" href="#collapse0" style="text-decoration: none;">
						<div class="row">
							<div class="panel-heading">
								
								<div class="col-lg-5 input-lg">
									<h3 class="panel-title"><i class="fa fa-caret-down" aria-hidden="true"></i> Update Record Of Entire Class </h3>
								</div>
								<div class="col-lg-offset-1 col-lg-5 input-lg">
									
								</div>
							</div>
						</div>
					</a>
					<div id="collapse0" class="panel-collapse collapse in">
						<div class="panel-body text-center">
							

							{!! Form::open(['action'=>'StudentAttendanceController@control', 'method'=>'POST']) !!}
						<div class="col-sm-offset-2 col-sm-4">
							<div class="form-group ">
								@if(strtotime($Date['end_date']) > time())
									<input class="form-control text-center input-lg" id="date" name="Date" max="{{date("Y")}}-{{date("m")}}-{{date("d")}}" min="{{$Date['start_date']}}" onfocus="(this.type='date')" onblur="(this.type='text')" placeholder="ENTER DATE" value="{{date("Y")}}-{{date("m")}}-{{date("d")}}" required/>
								@else
									<input class="form-control text-center input-lg" id="date" name="Date" max="{{$Date['end_date']}}" min="{{$Date['start_date']}}" onfocus="(this.type='date')" onblur="(this.type='text')"  placeholder="ENTER DATE" value="{{date("Y")}}-{{date("m")}}-{{date("d")}}" required/>
								@endif
							</div>
							<input type="hidden" name="SubAllotId" value="{{$request->SubAllotId}}">
							<input type="hidden" name="TermID" value="{{$request->TermID}}">
							<input type="hidden" name="Division" value="{{$request->Division}}">
							<input type="hidden" name="ContactHead" value="{{$request->ContactHead}}">
							<input type="hidden" name="submit" value="{{$request->submit}}">

						</div>
						<div class="col-sm-2">
							<button type="submit" name="next" class="btn btn-danger btn-lg" value="submit">Next</button>
						</div>	
					{!! Form::close() !!}
						</div>
					</div>
				</div>
			

		
				<div class="panel panel-default">
					<a data-toggle="collapse" data-parent="#accordion" href="#collapse1" style="text-decoration: none;">
						<div class="row">
							<div class="panel-heading">
								
								<div class="col-lg-5 input-lg">
									<h3 class="panel-title"><i class="fa fa-caret-down" aria-hidden="true"></i> Update Record Of Particular Student </h3>
								</div>
								
								<div class="col-lg-offset-1 col-lg-5 input-lg">	
								</div>
							</div>
						</div>
					</a>
					<div id="collapse1" class="panel-collapse collapse ">
						<div class="panel-body text-center">	
							<div class="row">
								<div class="col-md-10 col-md-offset-1">
									{!! Form::open(['action'=>'StudentAttendanceController@showParticularStudent', 'method'=>'POST']) !!}
						<div class="col-sm-offset-2 col-sm-4">
							<div class="form-group ">
								
								<input class="form-control text-center input-lg" type="number" id="roll" name="Roll" min="1" placeholder="ENTER ROLL NO" required/>
								
							</div>
							<input type="hidden" name="SubAllotId" value="{{$request->SubAllotId}}">
							<input type="hidden" name="TermID" value="{{$request->TermID}}">
							<input type="hidden" name="Division" value="{{$request->Division}}">
							<input type="hidden" name="ContactHead" value="{{$request->ContactHead}}">
							<input type="hidden" name="submit" value="{{$request->submit}}">

						</div>
						<div class="col-sm-2">
							<button type="submit" name="next" class="btn btn-danger btn-lg" value="submit">Next</button>
						</div>	
					{!! Form::close() !!}
									</div>
								</div>
							</div>
						</div>
					</div>
				
			</div>
		</div>
		@else
			<h3 class="col-sm-offset-3 col-xs-offset-1">Select date: </h3><br>
			<div class="col-sm-10 col-sm-offset-1">
			{!! Form::open(['action'=>'StudentAttendanceController@control', 'method'=>'POST']) !!}
				<div class="col-sm-offset-2 col-sm-4">
					<div class="form-group ">
						@if(strtotime($Date['end_date']) > time())
							<input class="form-control text-center input-lg" id="date" name="Date" max="{{date("Y")}}-{{date("m")}}-{{date("d")}}" min="{{$Date['start_date']}}" onfocus="(this.type='date')" onblur="(this.type='text')" placeholder="ENTER DATE" value="{{date("Y")}}-{{date("m")}}-{{date("d")}}" required/>
						@else
							<input class="form-control text-center input-lg" id="date" name="Date" max="{{$Date['end_date']}}" min="{{$Date['start_date']}}" onfocus="(this.type='date')" onblur="(this.type='text')"  placeholder="ENTER DATE" value="{{date("Y")}}-{{date("m")}}-{{date("d")}}" required/>
						@endif
					</div>
					<input type="hidden" name="SubAllotId" value="{{$request->SubAllotId}}">
					<input type="hidden" name="TermID" value="{{$request->TermID}}">
					<input type="hidden" name="Division" value="{{$request->Division}}">
					<input type="hidden" name="ContactHead" value="{{$request->ContactHead}}">
					<input type="hidden" name="submit" value="{{$request->submit}}">

				</div>
				<div class="col-sm-2">
					<button type="submit" name="next" class="btn btn-danger btn-lg" value="submit">Next</button>
				</div>	
			{!! Form::close() !!}
		</div>
		@endif
		
	</div>
	</div>
	@if($request->submit == 'View')
		<hr>
		<h3>Download Class report</h3><br>
		<div class="row">
		{!! Form::open(['action'=>'StudentAttendanceController@retrieveexcel', 'method'=>'POST']) !!}
			<div class="col-sm-10 col-sm-offset-1">
				<div class="col-sm-4 col-sm-offset 1">
					<div class="form-group">
					<label>From Date:</label>
						@if(strtotime($Date['end_date']) > time())
							<input class="form-control text-center  input-lg" id="date" name="SDate" max="{{date("Y")}}-{{date("m")}}-{{date("d")}}" min="{{$Date['start_date']}}" onfocus="(this.type='date')" onblur="(this.type='text')" placeholder="ENTER DATE" value="{{date("Y")}}-{{date("m")}}-{{date("d")}}" required/>
						@else
							<input class="form-control text-center" id="date" name="SDate" max="{{$Date['end_date']}}" min="{{$Date['start_date']}}" onfocus="(this.type='date')" onblur="(this.type='text')"  placeholder="ENTER DATE" value="{{date("Y")}}-{{date("m")}}-{{date("d")}}" required/>
						@endif
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
					<label>To Date:</label>
						@if(strtotime($Date['end_date']) > time())
							<input class="form-control text-center  input-lg" id="date" name="EDate" max="{{date("Y")}}-{{date("m")}}-{{date("d")}}" min="{{$Date['start_date']}}" onfocus="(this.type='date')" onblur="(this.type='text')" placeholder="ENTER DATE" value="{{date("Y")}}-{{date("m")}}-{{date("d")}}" required/>
						@else
							<input class="form-control text-center  input-lg" id="date" name="EDate" max="{{$Date['end_date']}}" min="{{$Date['start_date']}}" onfocus="(this.type='date')" onblur="(this.type='text')"  placeholder="ENTER DATE" value="{{date("Y")}}-{{date("m")}}-{{date("d")}}" required/>
						@endif
					</div>
				</div>
				<div class="col-sm-2">
					<br>
					<button type="submit" name="next" class="btn btn-danger btn-lg" value="submit">Download Report</button>
				</div>
			</div>
			<input type="hidden" name="SubAllotId" value="{{$request->SubAllotId}}">
		{!! Form::close() !!}
		</div> 
	@endif
@stop