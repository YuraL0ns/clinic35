@extends('tmp.main.default')
@section('content')

    <div class="doctor_page_view">

        <div class="doctor_page_view-box">
            <div class="doctor_page_view-box-item">
                <img class="doctor_page_view-box-item-images" src="{{$doctor->doctor_images}}" alt="{{$doctor->doctor_name}}">
            </div>
        </div>



        <div class="nth-box">
            <div class="doctor_page_view-box">
                <div class="doctor_page_view-box-item ">
                    <h3 class="doctor_page_view-box-item-title">{{$doctor->doctor_name}}</h3>
                </div>
            </div>

          <div class="doctor_page_view-box">
            <div class="doctor_page_view-box-item ">
              <div class="doctor_page_view-box-item-box">
                <p class="doctor_page_view-box-item-box-desc">Специальности</p>
                <p class="doctor_page_view-box-item-box-desc-text">{!!  $doctor->doctor_spec!!}</p>
              </div>
            </div>
          </div>

            <div class="doctor_page_view-box">
                <div class="doctor_page_view-box-item">
                    <div class="doctor_page_view-box-item-box">
                        <p class="doctor_page_view-box-item-box-desc">Стаж работы</p>
                        <p class="doctor_page_view-box-item-box-desc-text">c {{$doctor->doctor_exp}} года</p>
                    </div>
                </div>
            </div>

            <div class="doctor_page_view-box">
                <div class="doctor_page_view-box-item">
                    <div class="doctor_page_view-box-item-box">
                        <p class="doctor_page_view-box-item-box-desc">Место обучения</p>
                        <p class="doctor_page_view-box-item-box-desc-text">

                            {!! $doctor->doctor_students !!}

                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="doctor_page_view-box">
            <div class="doctor_page_view-box-item">
                <div class="flexibel-cont">
                    <h2 class="doctor_page_view-box-item-box-desc">Стоимость приёма</h2>

                    <div class="doctor_page_view-box-item-box-price">
                        <div class="doctor_page_view-box-item-box-price-item">
                            <h3>Первичный прием</h3>
                            @if($doctor->doctor_initial == NULL)
                                <span>1600 Рублей</span>
                            @else
                                <span>{{$doctor->doctor_initial}} Рублей</span>
                            @endif
                        </div>
                        <div class="doctor_page_view-box-item-box-price-item">
                            <h3>Вторичный прием</h3>
                            @if($doctor->doctor_secondary == NULL)
                                <span>1600 Рублей</span>
                            @else
                                <span>{{$doctor->doctor_secondary}} Рублей</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
