@extends('tmp.main.default')
@section('content')

<ul>
    @foreach($posts as $post)


        <li>
                <a href="
            {{route('sait.category.list.show.news.show', ['cat_alias' => $getAliasCat, 'post_alias' => $post->post_alias])}}
            ">
                {{$post->title}}
            </a>
        </li>
      @endforeach

</ul>

@endsection
