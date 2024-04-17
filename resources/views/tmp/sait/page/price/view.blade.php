@extends('tmp.main.default')
@section('content')

    <div class="sales_page">
        <h2 class="section_title">Скидки и акции от нашей клиники</h2>
        <div class="sales_page-box">
            @foreach($sales as $item)
          <div class="sales_page-box-card card-mob">
            <h5 class="sales_page-box-card-title">{{$item->sales_title}}</h5>
            <small class="sales_page-box-card-date">{{$item->created_at}}</small>
            <img src="{{$item->sales_img}}" class="sales_page-box-card-images" alt="{{$item->sales_title}}" />
            <a class="sales_page-box-card-button" href="{{route('sait.page.sales.info', $item->sales_alias)}}">Подробнее</a>
          </div>
          @endforeach
        </div>
      </div>
</div>
@endsection
