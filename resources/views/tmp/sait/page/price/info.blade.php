@extends('tmp.main.default')
@section('content')

    <div class="sales_page-view">
        <h2 class="sales_page-view-title">Акция: {{$sale->sales_title}}</h2>
        <small class="sales_page-view-date">{{$sale->created_at}}</small>
        <img class="sales_page-view-images" src="{{asset($sale->sales_img)}}" alt="{{$sale->sales_title}}">
        @if($sale->sale_desc == NULL)
        <p class="sales_page-view-text">
          {!!$sale->sales_desc!!}
        </p>
        @endif
        
      </div>
      <div class="sales_page-under">
        <p class="sales_page-under-text">Чтобы записаться на процедуру по акции — напишите нам в сообщения группы <a href="https://vk.com/clinic35ru">https://vk.com/clinic35ru</a> или звоните по телефону <a href="tel:88202302028">8 (8202) 30-20-28</a>.</p>
      </div>

@endsection
