@extends('faculty.layouts.dashboard')
@section('page_heading','View Comments')
@section('section')

    <div class="page-container">

        @foreach($comments as $index => $comment)

            <div class="row">
                <div class="col-sm-10">
                    {{ Form::open(['action' => ['CommentController@destroy',  $comment->comment_id],  'method' => 'DELETE']) }}
                    <p>{{$students[$index]->uid}}</p>
                    <h3>{{$students[$index]->first_name}} {{$students[$index]->last_name}}</h3>
                    <p class="lead-details">{{$comment->comment}}</p>
                    <p class="details">{{$comment->created_at}}</p>
                    <input type="hidden" value="{{$comment->comment_id}}" name="delete">
                </div>
                <div class="col-sm-2">
                    {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                </div>
            </div>
            {{ Form::close() }}
            <hr>
        @endforeach
    </div>

@stop