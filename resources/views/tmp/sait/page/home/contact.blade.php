@extends('tmp.main.default')
@section('content')

<div itemscope itemtype="http://schema.org/Organization">
    <h1 class="section_title">
        <span itemprop="name">{{ env('APP_NAME') }}</span>
    </h1>
    
    <h4>
        <span itemprop="url"> {{ env('APP_URL') }}</span>
    </h4>


    <strong>Режим работы:</strong>
    <div>
      <div>
        <time
            itemprop="openingHours"
            datetime="Mo,Fr 08:00−20:00">По вторникам и четвергам с 08.00 до 20.00
            </time>
        </div>
      <div>
        <time
            itemprop="openingHours"
            datetime="Sa,Su 08:00−15:00">По субботам и воскресениям с 09.00 до 17.00
            </time>
      </div>
    </div>
    
    <div class="contacts_page-div" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
      <strong>Адрес:</strong>
      <ul class="contacts_page-list-inline">
        <li class="contacts_page-list-inline-item"><span itemprop="postalCode">162601,</span></li>
        <li class="contacts_page-list-inline-item"><span itemprop="addressRegion">Вологодская область,</span></li>
        <li class="contacts_page-list-inline-item"><span itemprop="addressLocality">г. Череповец,</span></li>
        <li class="contacts_page-list-inline-item"><span itemprop="streetAddress">ул. Архангельская, 7 "Б"</span></li>
      </ul>
    </div>
    <ul class="contacts_page-list">
        <li class="contacts_page-list-item">
            Телефон:<span itemprop="telephone">+7 921 252-40-02</span>
        </li>
        <li class="contacts_page-list-item">
            Телефон:<span itemprop="telephone">8 (8202) 302-028</span>
        </li>
        <li class="contacts_page-list-item">
            Электронная почта: <span itemprop="email">01.pmk@mail.ru</span>
        </li>
    </ul>
  </div>

@endsection
