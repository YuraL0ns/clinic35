@extends('adminlte::page')

@section('title', 'Панель управления - Первая многопрофильная клиника')

@section('content_header')
    <h1 class="m-0 text-dark">Список вакансий</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Название вакансии</th>
                    <th>Дата создания</th>
                    <th>Показывать?</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($vacansies as $vacancy)
                    <tr>
                        <td>{{$vacancy->vacancy_title}}</td>
                        <td>{{$vacancy->created_at}}</td>
                        <td>{{$vacancy->vacancy_visible}}</td>
                        <td>
                            <div class="row">
                                <a href="#" class="mr-2 btn btn-success btn-xs">Просмотр на сайте</a>
                                <a href="{{route('admin.vacancy.show', $vacancy->vacancy_alias)}}" class="mr-2 btn btn-primary btn-xs">Просмотр в ПУ</a>
                                <a href="{{route('admin.vacancy.edit', $vacancy->id)}}" class="mr-2 btn btn-info btn-xs">Изменить</a>
                                <form action="{{ route('admin.vacancy.delete', $vacancy->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-xs h-100 w-100 btn-danger">Удалить</button>
                                </form>
                            </div>
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