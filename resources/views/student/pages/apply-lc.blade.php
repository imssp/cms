@extends('student.layouts.dashboard')
@section('page_heading','Apply for Leaving Certificate')
@section('section')
    <!-- Your Code Here -->
<script>//Script for file upload
$(function() {

  // We can attach the `fileselect` event to all file inputs on the page
  $(document).on('change', ':file', function() {
    var input = $(this),
        numFiles = input.get(0).files ? input.get(0).files.length : 1,
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [numFiles, label]);
  });

  // We can watch for our custom `fileselect` event like this
  $(document).ready( function() {
      $(':file').on('fileselect', function(event, numFiles, label) {

          var input = $(this).parents('.input-group').find(':text'),
              log = numFiles > 1 ? numFiles + ' files selected' : label;

          if( input.length ) {
              input.val(log);
          } else {
              if( log ) alert(log);
          }

      });
  });

}); 
</script>

@if($students->TypeOfAdmission==0) <!--If student's type of admission is FE -->
{!! Form::open(['method'=>'POST']) !!}
<div class="col-sm-1"></div>
<div class="col-sm-10">
	<div class="jumbotron ">
		<div class="container-fluid bg-3 ">
			<div class="col-sm-1"></div>
			<div class="col-sm-10">
				<div class="form-group">
						{{ Form::date('appdate',\Carbon\Carbon::now(),['class' => 'form-control','placeholder'=>'Application Date','disabled'])}}
				</div>
				<div class="form-group">
						{{ Form::text('stuname',$students->first_name.' '.$students->last_name,['class' => 'form-control','placeholder'=>'Student Name','disabled'])}}
				</div>
				<div class="form-group">
						{{ Form::number('phoneno',$students->mobile_no,['class' => 'form-control','placeholder'=>'Mobile Number','disabled'])}}
				</div>
				<div class="form-group">
						{{ Form::date('dob',$students->date_of_birth,['class' => 'form-control','placeholder'=>'Date of Birth','disabled'])}}
				</div>
				<div class="form-group">
						{{ Form::text('branch',$students->branch,['class' => 'form-control','placeholder'=>'Branch','disabled'])}}
				</div>
				<div class="form-group">
						{{ Form::text('academicyearAdmission',$students->admission_year,['class' => 'form-control','placeholder'=>'Academic Year Of Admission','disabled'])}}
				</div>
				<div class="form-group">
						{{ Form::text('yearofPass', '',['class' => 'form-control','placeholder'=>'Year of Passing' ,'required'])}}
				</div>
				<div class="form-group">
						{{ Form::text('percentage', '',['class' => 'form-control','placeholder'=>'Percentage','required'])}}
				</div>
				<div class="form-group">
						{{ Form::text('caste',$students->category,['class' => 'form-control','placeholder'=>'Caste','disabled'])}}
				</div>
				<div class="form-group">
						{{ Form::text('subCaste', '',['class' => 'form-control','placeholder'=>'Sub-Caste','required'])}}
				</div>
				<div class="form-group">
						{{ Form::text('feDse', 'FE',['class' => 'form-control','placeholder'=>'First year of admission/ Direct year of admission','disabled'])}}
				</div>
				<div class="form-group">
						{{ Form::text('lastSchname', '',['class' => 'form-control','placeholder'=>'Last School Name','required'])}}
				</div>
				<!--feild for uploading signatue-->
				<div class="input-group">
						<label class="input-group-btn btn-primary">
							<span class="btn btn-custom">
									Upload signature <input type="file" style="display: none;" name="Signature" id="Signature"  required >
							</span>
						</label>
						<input type="text" class="form-control" readonly>
				</div>
				<br>
				<!-- Feilds for uploading documents -->
				<div class="input-group">
						<label class="input-group-btn btn-primary">
							<span class="btn btn-custom">
									Upload BE Marksheet Xerox <input type="file" style="display: none;" name="Signature" id="Signature"  required >
							</span>
						</label>
						<input type="text" class="form-control" readonly>
				</div>
				<br>
				
				<div class="input-group">
						<label class="input-group-btn btn-primary">
							<span class="btn btn-custom">
									Upload BE Passing Certificate <input type="file" style="display: none;" name="Signature" id="Signature"  required >
							</span>
						</label>
						<input type="text" class="form-control" readonly>
				</div>
				<br>
				<div class="input-group">
						<label class="input-group-btn btn-primary">
							<span class="btn btn-custom">
									Upload Nationality Proof <input type="file" style="display: none;" name="Signature" id="Signature"  required >
							</span>
						</label>
						<input type="text" class="form-control" readonly>
				</div>
				<br>              
				<div class="input-group">
						<label class="input-group-btn btn-primary">
							<span class="btn btn-custom">
									Upload Previous Leaving Xerox <input type="file" style="display: none;" name="Signature" id="Signature"  required >
							</span>
						</label>
						<input type="text" class="form-control" readonly>
				</div>
				<br><br>
				{{Form::submit('APPLY',['class'=>'btn btn-success btn-block'])}}
				</div>
			</div>
			{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@else <!-- If student's type of admission is DSE --> 
 {!! Form::open(['method'=>'POST']) !!}
<div class="col-sm-1"></div>
<div class="col-sm-10">
	<div class="jumbotron ">		
		<div class="container-fluid bg-3 ">
			<div class="col-sm-2"></div>
			<div class="col-sm-8">
				<div class="form-group">
						{{ Form::date('appdate',\Carbon\Carbon::now(),['class' => 'form-control','placeholder'=>'Application Date','disabled'])}}
				</div>
				<div class="form-group">
						{{ Form::text('stuname',$students->first_name.' '.$students->last_name,['class' => 'form-control','placeholder'=>'Student Name','disabled'])}}
				</div>
				<div class="form-group">
						{{ Form::number('phoneno',$students->mobile_no,['class' => 'form-control','placeholder'=>'Mobile Number','disabled'])}}
				</div>
				<div class="form-group">
						{{ Form::date('dob',$students->date_of_birth,['class' => 'form-control','placeholder'=>'Date of Birth','disabled'])}}
				</div>
				<div class="form-group">
						{{ Form::text('branch',$students->branch,['class' => 'form-control','placeholder'=>'Branch','disabled'])}}
				</div>
				<div class="form-group">
						{{ Form::text('academicyearAdmission',$students->admission_year,['class' => 'form-control','placeholder'=>'Academic Year Of Admission','disabled'])}}
				</div>
				<div class="form-group">
						{{ Form::text('yearofPass', '',['class' => 'form-control','placeholder'=>'Year of Passing' ,'required'])}}
				</div>
				<div class="form-group">
						{{ Form::text('percentage', '',['class' => 'form-control','placeholder'=>'Percentage','required'])}}
				</div>
				<div class="form-group">
						{{ Form::text('caste',$students->category,['class' => 'form-control','placeholder'=>'Caste','disabled'])}}
				</div>
				<div class="form-group">
						{{ Form::text('subCaste', '',['class' => 'form-control','placeholder'=>'Sub-Caste','required'])}}
				</div>
				<div class="form-group">
						{{ Form::text('feDse', 'DSE',['class' => 'form-control','placeholder'=>'First year of admission/ Direct year of admission','disabled'])}}
				</div>
				<div class="form-group">
						{{ Form::text('lastSchname', '',['class' => 'form-control','placeholder'=>'Last School Name','required'])}}
				</div>
				<!--feild for uploading signatue-->
				<div class="input-group">
						<label class="input-group-btn btn-primary">
							<span class="btn btn-custom">
									Upload signature <input type="file" style="display: none;" name="Signature" id="Signature"  required >
							</span>
						</label>
						<input type="text" class="form-control" readonly>
				</div>
				<br>
				<!-- Feilds for uploading documents -->
				<div class="input-group">
						<label class="input-group-btn btn-primary">
							<span class="btn btn-custom">
									Upload BE Marksheet Xerox <input type="file" style="display: none;" name="Signature" id="Signature"  required >
							</span>
						</label>
						<input type="text" class="form-control" readonly>
				</div>
				<br>
				
				<div class="input-group">
						<label class="input-group-btn btn-primary">
							<span class="btn btn-custom">
									Upload BE Passing Certificate <input type="file" style="display: none;" name="Signature" id="Signature"  required >
							</span>
						</label>
						<input type="text" class="form-control" readonly>
				</div>
				<br>
				<div class="input-group">
						<label class="input-group-btn btn-primary">
							<span class="btn btn-custom">
									Upload Nationality Proof <input type="file" style="display: none;" name="Signature" id="Signature"  required >
							</span>
						</label>
						<input type="text" class="form-control" readonly>
				</div>
				<br>              
				<div class="input-group">
						<label class="input-group-btn btn-primary">
							<span class="btn btn-custom">
									Upload Previous Leaving Xerox <input type="file" style="display: none;" name="Signature" id="Signature"  required >
							</span>
						</label>
						<input type="text" class="form-control" readonly>
				</div>
				<br><br>
				{{Form::submit('APPLY',['class'=>'btn btn-success btn-block'])}}
				</div>
			</div>
			{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@endif
@stop