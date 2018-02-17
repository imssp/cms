@extends('student.layouts.dashboard')
@section('page_heading','Roles & Responsibilities')
@section('section')
    <ul class="timeline">
        <li>
            <div class="timeline-badge"><i class="fa fa-check"></i>
            </div>
            <div class="timeline-panel">
                <div class="timeline-heading">
                    <h4 class="timeline-title">Sem 1</h4>
                    
                </div>
                <div class="timeline-body">
                    <br>
                    <ul>
                        <li class="list-group-item">Role 1</li>
                        <li class="list-group-item">Role 2</li>
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
                        <li class="list-group-item">Role 1</li>
                        <li class="list-group-item">Role 2</li>
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
                        <li class="list-group-item">Role 1</li>
                        <li class="list-group-item">Role 2</li>
                    </ul>
                </div>
            </div>
        </li>
    </ul>
@stop