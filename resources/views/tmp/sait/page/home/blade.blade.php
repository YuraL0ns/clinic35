@extends('tmp.main.default')
@section('content')

<!-- <section class="hero">
    <div class="hero__container">
      <div class="hero-box">
        Slider Hero Box - Container
      </div>
    </div>
  </section> -->

  <section class="services">
    <div class="services__container">
      <h2 class="section_title">Услуги</h2>
      <div class="services-box">
      @foreach($razdels as $razdel)
        <a href="{{env('APP_URL')}}/services/{{$razdel->razdel_alias}}" class="services-box-item">
         <img class="services-box-item-images" src="{{asset('storage/template/icons/'.$razdel->razdel_images)}}" alt="{{$razdel->razdel_title}}">
          <h4>{{$razdel->razdel_title}}</h4>
        </a>
        @endforeach
      </div>
    </div>
  </section>

  <section class="doctors">
    <div class="doctors__container">
      <h2 class="section_title">Специалисты</h2>
      <div class="doctors-box">
      @foreach($doctors as $doctor)
        <div class="doctors-box-item">
          <a href="{{route('sait.doctor.show', $doctor->doctor_alias)}}" class="doctors-box-item-link">
            <img class="doctors-box-item-link-images" src="{{$doctor->doctor_images}}" alt="{{$doctor->doctor_name}}">
            <p class="doctors-box-item-link-name">{{$doctor->doctor_name}}</p>
          </a>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  <section class="contacts">
    <div class="contacts__container">
      <h2 class="section_title">Контакты</h2>
      <div class="contacts-box">
        <div class="contacts-box-left">
          <div class="contacts-box-item">
            <p class="contacts-box-item-text">
              <a href="#">+7(921) 252-40-02</a> <br>
              <a href="#">8 (8202) 30-20-28</a>
            </p>
          </div>
          <div class="contacts-box-item">
            <p class="contacts-box-item-text">
              <a href="#">01.pmk@mail.ru</a>
            </p>
          </div>
          <div class="contacts-box-item">
            <p class="contacts-box-item-text">
              г. Череповец, ул. Архангельская, 7Б
            </p>
          </div>
          <div class="contacts-box-item with-span">
            <span>Пн-Пт — 8:00-20:00</span>
            <span>Сб-Вс — 9:00-15:00</span>
          </div>
        </div>
        <div class="contacts-box-right">
          <div id="mymap"></div>
        </div>
      </div>
    </div>
  </section>

  <script
    type="text/javascript"
    charset="utf-8"
    async
    src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Ae678f456a02f1511f48524e370b40c702c66a97b7bc6f989486402fbdb3719dd&amp;width=660&amp;height=400&amp;lang=ru_RU&amp;scroll=true&amp;apikey=b848418e-6c82-49a0-9218-471b64dab114&amp;id=mymap"></script>

    </div>
@endsection
