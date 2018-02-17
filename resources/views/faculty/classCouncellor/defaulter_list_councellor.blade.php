@extends('faculty.layouts.dashboard') 
@section('page_heading','Defaulter List') 
@section('section') 
<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-default">
				<div class="panel-heading">

					<h3 class="panel-title">D10	</h3>
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
@stop