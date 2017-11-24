@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{ $post->title }}</h3>
                    </div>
                    <div class="panel-body">
                        <article>
                            <body>{{$post->body}}</body>
                        </article>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-sm-12">
                @foreach($post->comment as $comment)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                           <b>{{$comment->creator->name}}</b> - {{$comment->created_at->diffForHumans()}}</h3>
                    </div>
                    <div class="panel-body">
                        <article>
                            <body>{{$comment->body}}</body>
                        </article>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection