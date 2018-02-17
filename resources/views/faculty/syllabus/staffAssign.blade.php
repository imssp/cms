@extends('faculty.layouts.dashboard')
@section('page_heading','Profile')
@section('section')

{{ Form::open(['action' => 'FacultyController@courseassign', 'method'=>'GET']) }}
@include('faculty.exam.layouts.filters')

<div class="page-container">
    @if(isset($div))
    {{ Form::open(['action' => 'FacultyController@submitCourse', 'method'=>'POST']) }}   
        @foreach($courses as $course)
            <div class="row">
                    <h3>{{$course->course_code}} &nbsp;&nbsp;&nbsp {{$course->course_name}}</h3>
            </div>

            <section>
                @if($course->th_hrs > 0)
                    <p class="lead-details">Theory</p>
                    @for($i=0; $i < $course->th_hrs; $i++) 
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="ith_{{str_replace(' ', '', $course->course_code)}}" class="details">Hour {{$i+1}} Assigned to: 
                                    <span class="match"></span>
                                </label>
                                <input type="hidden" name="hth_{{str_replace(' ', '', $course->course_code)}}" class="hidden-input">
                                <input type="text" name="ith_{{str_replace(' ', '', $course->course_code)}}" class="form-control {{$i}} staff-input" required>
                            </div>
                        </div>
                    @endfor
                    
                @endif
            </section>
            
            <section>
                @if($course->pr_hrs > 0)
                    <?php
                        $batches = array_map('intval', explode(',',$course->pr_batches));
                        $batchCount = $batches[$div-1];
                    ?>
                    <p class="lead-details">Practical</p>
                    @for($j=0; $j<$batchCount; $j++)
                        <p class="lead-details">Batch {{chr($j+65)}}</p>
                        <section>
                        @for($i=0; $i < $course->pr_hrs; $i++) 
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="iph_{{$course->course_code}}" class="details">Hour {{$i+1}} Assigned to: 
                                        <span class="match"></span>
                                    </label>
                                    <input type="hidden" name="hph_{{str_replace(' ', '', $course->course_code)}}_{{chr($j+65)}}" class="hidden-input">
                                    <input type="text" name="iph_{{$course->course_code}}_{{chr($j+65)}}" class="form-control {{$i}} staff-input" required>
                                </div>
                            </div>
                        @endfor
                        </section>
                    @endfor
                @endif
            </section>
        
            <section>
                @if($course->tut_hrs > 0)
                    <?php
                        $batches = array_map('intval', explode(',',$course->tut_batches));
                        $batchCount = $batches[$div-1];
                    ?>
                    <p class="lead-details">Tutorial</p>
                    @for($j=0; $j<$batchCount; $j++)
                        <p class="lead-details">Batch {{chr($j+65)}}</p>
                        <section>
                        @for($i=0; $i < $course->tut_hrs; $i++) 
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="iuh_{{$course->course_code}}" class="details">Hour {{$i+1}} Assigned to: 
                                        <span class="match" name="ouh_{{$course->course_code}}"></span>
                                    </label>
                                    <input type="hidden" name="huh_{{str_replace(' ', '', $course->course_code)}}_{{chr($j+65)}}" class="hidden-input">
                                    <input type="text" name="iuh_{{$course->course_code}}_{{chr($j+65)}}" class="form-control {{$i}} staff-input" required>
                                </div>
                            </div>
                        @endfor
                        </section>
                    @endfor
            @endif
            </section>
            
            <hr>
        @endforeach
        <input type="submit" value="Submit" class="btn btn-success">
        {{ Form::close() }}
    @else
        <p class="lead-details">Please enter a valid class</p>
    @endif
</div>


{{-- <script src="{{ mix('js/app.js') }}"></script> --}}
<script type="text/javascript">
    $(document).ready(function(){

        $(document).on('change','.staff-input', function(){
            var staff_name = $(this).val();
            var staff_input = $(this);
            var row = $(this).parent();
            // var div = row.find('.match').html(staff_name);
            var op = "";
            $.ajax({
                type:'get',
                url:'{!!URL::to('staff/faculty/match')!!}',
                data:{'term': staff_name},
                success:function(match){
                    console.log(match);
                    row.find('.match').html(match['first_name']+' '+match['last_name']);
                    row.find('.staff-input').val(match['first_name']+' '+match['last_name']);
                    row.find('.hidden-input').val(match['e_id']);
                    console.log(staff_input.hasClass('0'));
                    if(staff_input.hasClass('0')){
                        console.log("this is 0");
                        var parent_div = staff_input.parent().parent().parent();
                        parent_div.find('.match').html(match['first_name']+' '+match['last_name']);
                        parent_div.find('.staff-input').val(match['first_name']+' '+match['last_name']);
                        parent_div.find('.hidden-input').val(match['e_id']);
                    }
                },
                error:function(){
                    console.log("Error");
                }
            });
        });

    });
</script>

@stop