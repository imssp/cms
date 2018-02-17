@extends('student.layouts.dashboard')
@section('page_heading','Pre Academics')
@section('section')
<!-- Your Code Here -->
<h3 align="center">Secondary School Certificate</h3>
{!! Form::open(['method'=>'POST']) !!}
<!--FE Marksheet details-->
	<div class="container">
			<div class="form-group" style="padding:0 0 0 1.2%">
				{{Form::label('schoolname','School Name')}}
				{{ Form::text('schoolName','Model English School',['class' => 'form-control','disabled'])}}
			</div>

			<div class="form-group ">
				<div class="col-xs-3">
					{{Form::label('totalmarks','Total Marks')}}
					{{ Form::text('totalMarks','488.67',['class' => 'form-control','disabled'])}}
				</div>
			</div>

			<div class="form-group">
				<div class="col-xs-3">
					{{Form::label('outof','Out Of')}}
					{{ Form::text('outOf','650',['class' => 'form-control','disabled'])}}
				</div>
			</div>
			<div class="form-group">
				<div class="col-xs-3">
					{{Form::label('percentageo','Percentage obtained')}}
					{{ Form::text('percentage',$preAcademics->ssc,['class' => 'form-control','disabled'])}}
				</div>
			</div>
<br>
<br><br>

<h3 align="center">Higher Secondary School Certificate</h3>
		<div class="form-group" style="padding:0 0 0 1.2%">
				{{Form::label('juniorclg','Junior College Name')}}
				{{ Form::text('juniorClg','MH Junior College and High School',['class' => 'form-control','disabled'])}}
		</div>
		<div class="container" style="padding:0 0 0 0.6%">
				<div class="form-group">
					<div class="col-xs-3">
						{{Form::label('phy','Physics Marks')}}
						{{ Form::text('phyScore','92',['class' => 'form-control','disabled'])}}
					</div>
					<div class="col-xs-3">
						{{Form::label('chem','Chemistry Marks')}}
						{{ Form::text('chemScore','87',['class' => 'form-control','disabled'])}}
					</div>
					<div class="col-xs-3">
						{{Form::label('maths','Mathematics Marks:')}}
						{{ Form::text('mathsScore','98',['class' => 'form-control','placeholder'=>'Mathematics Score..','disabled'])}}
					</div>
				</div>
		</div>
<br>
		<div class="container" style="padding:0 0 0 0.5%">
			<div class="form-group">
				<div class="col-xs-3">
						{{Form::label('totalmarks','Total Marks')}}
						{{ Form::text('totalMarks','',['class' => 'form-control','disabled'])}}
				</div>
				<div class="col-xs-3">
						{{Form::label('outof','Out Of')}}
						{{ Form::text('outOf','650',['class' => 'form-control','disabled'])}}
				</div>
		       <div class="col-xs-3">
						{{Form::label('percentage','Percentage')}}
						{{ Form::text('percentage',$preAcademics->hsc,['class' => 'form-control','disabled'])}}
		       </div>
		    </div>
		</div>
<br>
		<div class="container" style="padding:0 0 0 0.5%">
			<div class="form-group">
				<div class="col-xs-3">
						{{Form::label('juniorclg','CET Marks')}}
						{{ Form::text('CetMarks',$preAcademics->cet_score,['class' => 'form-control','disabled'])}}
				</div>
				<div class="col-xs-3">
						{{Form::label('jee_physics','JEE Physics Marks')}}
						{{ Form::text('jeeMarks',$preAcademics->jee_physics,['class' => 'form-control','disabled'])}}
				</div>
				<div class="col-xs-3">
						{{Form::label('jee_chemistry','JEE Chemistry Marks')}}
						{{ Form::text('jeeMarks',$preAcademics->jee_chemistry,['class' => 'form-control','disabled'])}}
				</div>
				<div class="col-xs-3">
						{{Form::label('jee_maths','JEE Maths Marks')}}
						{{ Form::text('jeeMarks',$preAcademics->jee_maths,['class' => 'form-control','disabled'])}}
				</div>
				<div class="col-xs-3">
						{{Form::label('jee','JEE Total Marks')}}
						{{ Form::text('jeeMarks',$preAcademics->jee_score,['class' => 'form-control','disabled'])}}
				</div>
				<div class="col-xs-3">
						{{Form::label('jeeadv','JEE Advanced Marks')}}
						{{ Form::text('jeeadvMarks','',['class' => 'form-control','placeholder'=>'JEE Advanced Marks','disabled'])}}
				</div>
			</div>
		</div>
	</div>
<br>
{!! Form::close() !!}
@stop