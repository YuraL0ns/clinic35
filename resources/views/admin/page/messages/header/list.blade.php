@extends('admin.template.default')
@section('admin_page_title', 'Контакты из шапки сайта')
@section('admin_area')

@if(Session::has('success'))
<div class="alert alert-primary alert-dismissible bg-success text-white border-0 fade show" role="alert">
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
    {{session('success')}}
  </div>
@endif




<table class="table">
    <thead>
        <tr>
            <th>Имя</th>
            <th>Телефон</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($mfhs as $item )
        <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->phone}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
