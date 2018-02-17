@extends('faculty.layouts.dashboard')
@section('page_heading','Student Results')
@section('section')

{{ Form::open(['action' => 'ExamDeptController@show_update_result', 'method'=>'GET']) }}
@include('faculty.exam.layouts.filters')

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


@if(isset($request))
<div class="col-sm-1"></div>
    <div class="col-sm-10">
        <div class="container-fluid bg-2 ">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
            <br>
                {{-- This form is for downloading marksheet --}}
                {{ Form::open(['action' => 'ExamDeptController@download_csv', 'method'=>'GET']) }}
                    <div class="row form group">
                        {{Form::submit('Download Marksheet',['class'=>'btn btn-default btn-block '])}}
                    </div>
                {{ Form::close() }}
                
                <br><br>
                <div class="jumbotron">
                Please download the blank marksheet csv file for this class, fill in the marks and upload
                </div>
                
                {{-- This form is for Uploading marksheet --}}
                {{ Form::open(['action' => 'ExamDeptController@upload_csv', 'method'=>'POST', 'enctype'=>'multipart/formdata','files'=>'true']) }}
                <div class="row form-group">
                    <div class="input-group">
                        <label class="input-group-btn">
                            <span class="btn btn-primary ">
                                    Upload Marksheet File<input type="file" style="display: none;" name="file" id="file"  required >
                            </span>
                        </label>
                        <input type="text" class="form-control" readonly>  
                    </div>
                    <br>
                    <div class="form-group col-sm-4 pull-right">
                        {{Form::submit('Submit',['class'=>'btn btn-success btn-block '])}}
                    </div>
                </div>
            </div>
            {{ Form::close() }}    
        </div>
    </div>
</div>
@endif
@stop