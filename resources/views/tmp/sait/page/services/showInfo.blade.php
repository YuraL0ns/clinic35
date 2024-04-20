@extends('tmp.main.default')
@section('content')
<section class="main">
    <div class="main__container">
        <div class="service_page-view">
            
            <h1 class="service_page-view-title">{{ $service->service_title }}</h1>
            <p class="service_page-view-desc">{{$service->service_description}}</p>
            @if ($service->doctors->isNotEmpty())
            <h3 class="service_page-view-title">Доктора</h3>
            <div class="service_page-view-doctor-box">
                @foreach($service->doctors as $doc)
                <div class="service_page-view-doctor-box-block">
                    <a class="service_page-view-doctor-box-block-link" href="{{route('sait.doctor.show', $doc->doctor_alias)}}">
                        <img class="service_page-view-doctor-box-block-link-images" src="/{{$doc->doctor_images}}" alt="{{$doc->doctor_name}}">
                        <span class="service_page-view-doctor-box-block-link-name">{{$doc->doctor_name}}</span>
                    </a>
                </div>
                @endforeach
            </div>
            @endif



        @if(count($service->points) == 0)
            <table class="no-display">
                <thead>
                <th>Наименование услуги</th>
                <th>Цена</th>
                </thead>
                <tbody>

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                </tbody>
            </table>
        @elseif($service->points)
            <table class="table-services">
                <thead class="table-services-thead">
                    <tr class="table-services-thead-tr">
                        <th class="table-services-thead-tr-th">Наименование услуги</th>
                        <th class="table-services-thead-tr-th">Цена</th>
                    </tr>
                </thead>
                <tbody class="table-services-tbody">
                @foreach($service->points as $point)
                    <tr class="table-services-tbody-tr">
                        <td class="table-services-tbody-tr-td table-services-tbody-tr-td-title">{{$point->point_title}}</td>
                        <td class="table-services-tbody-tr-td table-services-tbody-tr-td-price">{{$point->point_price}} ₽</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif

        </div>
    </div>
</section>
@endsection
