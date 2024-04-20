@extends('tmp.main.default')
@section('content')

    <div class="vacancy_page">
        <div class="vacancy-container">
            <div class="vacancy-box">
                @foreach($vacansies as $vacancy)
                    <a class="vacancy-item" href="{{route('sait.vacancy.show', $vacancy->vacancy_alias)}}">
                        <img class="vacancy-item__images" src="{{$vacancy->vacancy_images}}" alt="">
                        <h3 class="vacancy-item__header">{{$vacancy->vacancy_title}}</h3>
                        <p class="vacancy-item__look">Подробнее</p>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

@stop