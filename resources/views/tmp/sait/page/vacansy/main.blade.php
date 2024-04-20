@extends('tmp.main.default')
@section('content')

    @foreach($vacansies as $vacancy)
        <li>
            <a href="{{route('sait.vacancy.show', $vacancy->vacancy_alias)}}">
                {{$vacancy->vacancy_title}}
            </a>
        </li>
    @endforeach

@stop