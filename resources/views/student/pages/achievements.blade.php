@extends('student.layouts.dashboard')
@section('page_heading','Achievements')
@section('section')
    <!-- Your Code Here -->
    {{--This view defines the achievements of a student.  It displays the data in a responisve[T.B.D.] timeline fashion.--}}
    <ul class="timeline">
        <li>
            <div class="timeline-badge"><i class="fa fa-check"></i>
            </div>
            <div class="timeline-panel">
                <div class="timeline-heading">
                    <h4 class="timeline-title">Sem 1</h4>
                    <p><small class="text-muted"><i class="fa fa-clock-o"></i> 11 hours ago via Twitter</small>
                    </p>
                </div>
                <div class="timeline-body">
                    <br>
                    <ul>
                        <li class="list-group-item">Achievement 1</li>
                        <li class="list-group-item">Achievement 2</li>
                    </ul>
                </div>
            </div>
        </li>
        <li class="timeline-inverted">
            <div class="timeline-badge warning"><i class="fa fa-credit-card"></i>
            </div>
            <div class="timeline-panel">
                <div class="timeline-heading">
                    <h4 class="timeline-title">Sem 2</h4>
                </div>
                <div class="timeline-body">
                    <br>
                    <ul>
                        <li class="list-group-item">Achievement 1</li>
                        <li class="list-group-item">Achievement 2</li>
                    </ul>
                </div>
            </div>
        </li>
        <li>
            <div class="timeline-badge danger"><i class="fa fa-bomb"></i>
            </div>
            <div class="timeline-panel">
                <div class="timeline-heading">
                    <h4 class="timeline-title">Sem 3</h4>
                </div>
                <div class="timeline-body">
                    <br>
                    <ul>
                        <li class="list-group-item">Achievement 1</li>
                        <li class="list-group-item">Achievement 2</li>
                    </ul>
                </div>
            </div>
        </li>
    </ul>                    
@stop