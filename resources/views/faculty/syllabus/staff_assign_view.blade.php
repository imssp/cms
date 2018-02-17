@extends('faculty.exam.layouts.filters')
@section('page_heading','Assign Staff')
@section('submit')
{{ Form::open(['action' => 'FacultyController@viewassign', 'method'=>'GET']) }}
@endsection
@section('exam')

<div class="page-container">
    @if(isset($div))
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
                                <label for="ith{{$course->course_code}}{{$i}}" class="details">Hour {{$i+1}} Assigned to: 
                                    <span class="match" name="oth{{$course->course_code}}{{$i}}"></span>
                                </label>
                                
                                <input type="search" name="ith{{$course->course_code}}{{$i}}" class="form-control {{$i}} staff-input" required>
                            </div>
                        </div>
                    @endfor
                    
                @endif
            </section>
            
            <section>
                @if($course->pr_hrs > 0)
                    <p class="lead-details">Practical</p>
                    @for($i=0; $i < $course->pr_hrs; $i++) 
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="ith{{$course->course_code}}{{$i}}" class="details">Hour {{$i+1}} Assigned to: 
                                    <span class="match" name="oth{{$course->course_code}}{{$i}}"></span>
                                </label>
                                <input type="text" name="iph{{$course->course_code}}{{$i}}" class="form-control {{$i}} staff-input" required>
                            </div>
                        </div>
                    @endfor
                    
                @endif
            </section>
        
            <section>
                @if($course->tut_hrs > 0)
                <p class="lead-details">Tutorial</p>
                @for($i=0; $i < $course->tut_hrs; $i++) 
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="iuh{{$course->course_code}}{{$i}}" class="details">Hour {{$i+1}} Assigned to: 
                                <span class="match" name="ouh{{$course->course_code}}{{$i}}"></span>
                            </label>
                            <input type="text" name="iuh{{$course->course_code}}{{$i}}" class="form-control {{$i}} staff-input" required>
                        </div>
                    </div>
                @endfor
                
            @endif
            </section>
            
            <hr>
        @endforeach
    @else

    @endif
</div>
@stop

<script src="{{ mix('js/app.js') }}"></script>
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
                },
                error:function(){
                    console.log("Error");
                }
            });
        });

    });
</script>