@extends('adminlte::page')

@section('title', 'Панель управления - Первая многопрофильная клиника')

@section('content_header')
    <h1 class="m-0 text-dark">Список всех пользователй</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Аватар</th>
                    <th>ФИО</th>
                    <th>Группа</th>
                    <th>Пол</th>
                    <th>Номер телефона</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                   <tr>
                       <td>Аватар</td>
                       <td>
                           {{$user->name}}
                       </td>
                       @foreach($user->roles as $role)
                        <td><span class="text-{{$role->role_color}}">{{$role->role_name}}</span></td>
                       @endforeach
                       <td>Мужской</td>
                       <td>+7 (992) 288 3858</td>
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