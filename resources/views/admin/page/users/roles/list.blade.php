@extends('adminlte::page')

@section('title', 'Панель управления - Первая многопрофильная клиника')

@section('content_header')
    <h1 class="m-0 text-dark">Список всех ролей</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Иконка | Цвет группы | Название группы</th>
                    <th>Кол-во пользователей в группе</th>
                    <th>EXP доступа</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>


                @foreach($roles as $role)
                    <tr>
                    <td> <i class="text-{{$role->role_color}} fas {{$role->role_icon}}"></i> | {{$role->role_name}}</td>
                    <td>{{count($role->users)}}</td>
                    <td>{{$role->role_exp}}</td>
                        <td>
                            <a href="#" class="btn btn-success btn-xs">Текст кнопки</a>
                            <a href="#" class="btn btn-danger btn-xs">Текст кнопки</a>
                            <a href="#" class="btn btn-dark btn-xs">Текст кнопки</a>
                            <a href="#" class="btn btn-warning btn-xs">Текст кнопки</a>
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