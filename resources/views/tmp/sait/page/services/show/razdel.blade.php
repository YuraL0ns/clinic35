@extends('tmp.main.default')
@section('content')


<div class="service_page">
        <h2 class="section_title">Услуги нашей клиники</h2>
        <div class="service_page-box">
        @foreach($showAllService as $service)
          <a href="{{route('sait.razdel.show.services',
            [
                'razdel_alias' => $getCatAlias,
                'alias' => $service->service_alias
            ])}}" class="service_page-box-card card-mob">
            <img class="service_page-box-card-images" src="/storage/template/icons/{{$service->service_images}}" alt="{{$service->service_title}}">
            <h4 class="service_page-box-card-title">{{$service->service_title}}</h4>
          </a>
          @endforeach
        </div>
      </div>
@endsection
