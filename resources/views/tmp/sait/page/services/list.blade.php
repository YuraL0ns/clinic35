@extends('tmp.main.default')
@section('content')
    @foreach($razdels as $raz)
        <li>
           <a href="{{route('sait.razdel.show', $raz->razdel_alias)}}">{{$raz->razdel_title}}</a>
        </li>
    @endforeach
@endsection
