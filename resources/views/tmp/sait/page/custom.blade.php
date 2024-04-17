@extends('tmp.main.default')
@section('content')

    <div class="custom_page-view">
    <h1>{{$page->page_title}}</h1>
        {!! $page->page_description !!}

        @foreach($page->getFiles as $file)
            <ul>
                <li>
                    {{$file->custom_name}}
                </li>
            </ul>
        @endforeach
    </div>

@endsection
