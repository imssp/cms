@extends('student.layouts.dashboard')
@section('page_heading','Comments by Teachers')
@section('section')
    <div class="panel-body">
        <ul class="chat">
            
            @foreach($comments as $index => $comment)
            <li class="right clearfix">
                <span class="chat-img pull-left">
                    <img src="http://placehold.it/50/55C1E7/fff" alt="User Avatar" class="img-circle" />
                </span>
                <div class="chat-body clearfix">
                    <div class="header">
                        <strong class="primary-font">{{$faculties[$index]->first_name}} {{$faculties[$index]->last_name}}</strong>
                        <small class="pull-right text-muted">
                            <i class="fa fa-clock-o fa-fw"></i> 
                            {{$comment->created_at}}
                            </small>
                    </div>
                    <p>
                        {{$comment->comment}}    
                    </p>
                </div>
            </li>
            @endforeach
        </ul>
        {{-- This section will be used when teachers want to comment on students --}}
        {{-- <div class="panel-footer">
            <div class="input-group">
                <input id="btn-input" type="text" class="form-control input-sm" placeholder="Type your message here..." />
                <span class="input-group-btn">
                    <button class="btn btn-warning btn-sm" id="btn-chat">
                        Send
                    </button>
                </span>
            </div>
        </div> --}}
    </div>
@stop