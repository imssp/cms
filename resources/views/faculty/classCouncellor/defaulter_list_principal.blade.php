@extends('faculty.layouts.dashboard') 
@section('page_heading','Defaulter List') 
@section('section') 
{{--Principal--}}
<script type="text/javascript">
     function configureDropDownLists(ddl1,ddl2) {
    var Inft= ['','D5', 'D10', 'D15','D20'];
    var comps= ['','D2', 'D7', 'D12','D17'];
   	var Extc= ['','D4', 'D9', 'D14','D19'];
	var Etrx= ['','D1', 'D6', 'D11','D16'];
    switch (ddl1.value) {
        case 'INFT':
            ddl2.options.length = 0;
            for (i = 0; i < Inft.length; i++) {
                createOption(ddl2, Inft[i], Inft[i]);
            }
            break;
        case 'CMPN':
            ddl2.options.length = 0; 
        for (i = 0; i < comps.length; i++) {
            createOption(ddl2, comps[i], comps[i]);
            }
            break;
        case 'EXTC':
            ddl2.options.length = 0;
            for (i = 0; i <  Extc.length; i++) {
                createOption(ddl2,  Extc[i],  Extc[i]);
            }
            break;
			case 'ETRX':
            ddl2.options.length = 0;
            for (i = 0; i <  Etrx.length; i++) {
                createOption(ddl2,  Etrx[i],  Etrx[i]);
            }
            break;

            default:
                ddl2.options.length = 0;
            break;
    }

}

    function createOption(ddl, text, value) {
        var opt = document.createElement('option');
        opt.value = value;
        opt.text = text;
        ddl.options.add(opt);
    }
</script>

{{ Form::open(['action'=>'Councellor@defaulter_list', 'method'=>'GET', 'required']) }}
<div class="col-sm-2">
    <div class="form-group">
        <select name="branch" class="form-control" onchange="configureDropDownLists(this,document.getElementById('ddl2'))" id="ddl1" required>
			<option value="-1">All</option>
			<option value="INFT">Information Technology</option>
			<option value="CMPN">Computer Science</option>
			<option value="ETRX">Electronics</option>
			<option value="EXTC">EXTC</option>
			<option value="INST">Intrumentation</option>
			<option value="MCA">MCA</option>
			<option value="H and S">H and S</option>
        </select>
    </div>
</div>
<div class="col-sm-2">
	<div class="form-group">
		<select id="ddl2"  class="form-control" name='department'>
		</select>
	</div>
</div>

{{Form::submit('Search', ['class'=>'btn btn-success','name'=>'Search'])}}
{{ Form::close() }}			
@if(isset($input))
    @if($flag==1)
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading">

				<h3 class="panel-title">{{$branch}}--{{$dept}}	</h3>
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
					<tbody>
					@foreach($students as $s)
						<tr>
							<td>{{$s->FirstName}}</td>
							<td>john@gmail.com</td>
							<td>London, UK</td>
							<td>London, UK</td>
						</tr>
					@endforeach
					</tbody>
				</table>		
				</div>
			</div>
		</div>
	</div>
</div>
@else
  @foreach($students as s)
      <div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading">

				<h3 class="panel-title">{{$branch}}--{{$dept}}	</h3>
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
					<tbody>
					@foreach($students as $s)
						<tr>
							<td>{{$s->FirstName}}</td>
							<td>john@gmail.com</td>
							<td>London, UK</td>
							<td>London, UK</td>
						</tr>
					@endforeach
					</tbody>
				</table>		
				</div>
			</div>
		</div>
	</div>
</div>
    @endforeach

@endif
@stop