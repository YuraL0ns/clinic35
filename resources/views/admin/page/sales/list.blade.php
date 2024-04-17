@extends('adminlte::page')

@section('title', 'Панель управления - Первая многопрофильная клиника')

@section('content_header')
    <h1 class="m-0 text-dark">Список всех акций</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Изображение</th>
                    <th>Название акции</th>
                    <th>Дата создания акции</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($sales as $sale)
                    <tr>
                        <td>
                            <img class="direct-chat-img" src="{{ $sale->sales_img }}"
                                 alt="{{ $sale->sales_title }}">
                        </td>
                        <td>{{ $sale->sales_title }}</td>
                        <td>{{ $sale->created_at }}</td>

                        <td>
                            <a href="{{route('sait.page.sales.info', $sale->sales_alias)}}" class="btn btn-warning btn-xs">Просмотр</a>
                            <a href="{{route('admin.sales.edit', $sale->id)}}" class="btn btn-info btn-xs">Изменить</a>
                            <form action="{{ route('admin.sales.destroy', $sale->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-xs btn-danger">Удалить</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@stop

@section('js')
    <script>
        @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Данные внесены',
            text: '{{ session('success') }}',
        });
        @endif
    </script>
@stop