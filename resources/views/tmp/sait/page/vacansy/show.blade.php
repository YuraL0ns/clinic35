@extends('tmp.main.default')
@section('content')
<div class="vacancy_page"></div>
    <div class="vacancy-container">
        <div class="vacancy-item">
            <h2 class="vacancy-item__heading">{{ $vacancy->vacancy_title }}</h2>
            {!! $vacancy->vacancy_description !!}
            <p class="vacancy-item__text">{{ $vacancy->vacancy_price }}</p>
        </div>
    </div>
</div>
@endsection