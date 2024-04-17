@extends('adminlte::page')

@section('title', 'Панель управления - Первая многопрофильная клиника')

@section('content_header')
    <h1 class="m-0 text-dark">Вакансия {{$vacancy->vacancy_title}}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <div class="card-header">
                    <h3>{{$vacancy->vacancy_title}}</h3>
                    <small>{{$vacancy->vacancy_alias}}</small>
                </div>
                <div class="card-body">
                    <label>Активная вакансия:                        @if($vacancy->vacancy_visible == 1)
                            <b class="text-success">Да - вакансия активна</b>
                        @elseif($vacancy->vacancy_visible == 0)
                            <b class="text-gray">Нет - вакансия закрыта</b>
                        @endif
                    </label>
                    <p>
                        <img class="img-thumbnail" src="{{$vacancy->vacancy_images}}" alt="{{$vacancy->vacancy_title}}">
                    </p>
                    <p>
                        {!!  $vacancy->vacancy_description!!}
                    </p>

                    <h2>{{$vacancy->vacancy_price}} Рублей/Месяц</h2>
                </div>
            </div>
        </div>
    </div>
@stop