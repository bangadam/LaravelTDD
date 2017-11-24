@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">My Blog</h3>
                    </div>
                    <div class="panel-body">
                        @foreach($posts as $post)
                            <article>
                                <h3><a href="/blog/{{$post->id}}">{{ $post['title'] }}</a></h3>
                                <div class="body">{{ $post['body'] }}</div>
                            </article>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection