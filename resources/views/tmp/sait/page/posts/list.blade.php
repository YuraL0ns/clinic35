@extends('tmp.main.default')
@section('content')
    @foreach($posts as $post)
        {{$post->title}} <br>
        <a href="{{route('sait.news.info', $post->post_alias)}}">{{$post->post_alias}}</a>
        <hr>
    @endforeach
@endsection
