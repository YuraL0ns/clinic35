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
                    <th>Название раздела</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($razdels as $razdel)
                    <tr>
                        <td>
                            <img class="direct-chat-img" src="{{ $razdel->razdel_images }}"
                                 alt="{{ $razdel->razdel_title }}">
                        </td>
                        <td>{{ $razdel->razdel_title }}</td>

                        <td>
                            <a href="{{route('sait.razdel.show', $razdel->razdel_alias)}}" class="btn btn-warning btn-xs">Просмотр</a>
                            <a href="{{route('admin.razdel.edit', $razdel->id)}}" class="btn btn-info btn-xs">Изменить</a>
                            <form action="{{ route('admin.razdel.destroy', $razdel->id) }}" method="POST">
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