@extends('student.layouts.dashboard')
@section('page_heading','Apply for Transcript')
@section('section')
    <!-- Your Code Here -->

<script>
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
{!! Form::open(['method'=>'POST']) !!}

<div class="col-sm-1"></div>
    <div class="col-sm-10">
        <div class="jumbotron text-center">
            <div class="container-fluid bg-3 text-center">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <div class="form-group">
                    {{ Form::text('stuname',$students->first_name.' '.$students->last_name,['class' => 'form-control','placeholder'=>'Student Name','disabled' ,'required'])}}
                    </div>
                    <div class="form-group">
                    {{ Form::text('stuid',$students->uid,['class' => 'form-control','placeholder'=>'Student ID','disabled' ,'required'])}}
                    </div>
                    <div class="form-group">
                    {{ Form::text('branch',$students->branch,['class' => 'form-control','placeholder'=>'Branch','disabled' ,'required'])}}
                    </div>
                    <div class="form-group">
                    {{ Form::textarea('purpose','',['class' => 'form-control','placeholder'=>'Purpose of transcript','rows' => '3','required' ])}}
                    </div>
                    <br>              
                    <div class="input-group">
                        <label class="input-group-btn btn-primary">
                            <span class="btn btn-custom">
                            Upload Proof of Purpose <input type="file" style="display: none;" name="Signature" id="Signature"  required >
                            </span>
                        </label>
                        <input type="text" class="form-control" readonly>
                    </div>
                    <br>
                    <div class="form group">
                        {{Form::submit('APPLY',['class'=>'btn btn-success btn-block'])}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--THIS IS FOR APPLICATION OF TRANSCRIPTS--> 
{!! Form::close() !!}
@stop