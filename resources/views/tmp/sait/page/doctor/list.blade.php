@extends('tmp.main.default')
@section('content')
    
    <div class="doctor_page">
        <h2 class="section_title">Специалисты нашей клиники</h2>
        <div class="doctor_page-box">
        @foreach($doctors as $doctor)
          <a href="{{route('sait.doctor.show', $doctor->doctor_alias)}}" class="doctor_page-box-card card-mob">
            <img class="doctor_page-box-card-images" src="{{$doctor->doctor_images}}" alt="{{$doctor->doctor_name}}">
            <h5 class="doctor_page-box-card-title">{{$doctor->doctor_name}}</h5>
          </a>
          @endforeach
        </div>
      </div>
@endsection
