@extends('adminlte::page')

@section('title', 'Панель управления - Первая многопрофильная клиника')

@section('content_header')
    <h1 class="m-0 text-dark">Список всех докторов</h1>
@stop

@section('content')
     <div class="row">
        <div class="col-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Аватар</th>
                        <th>Имя доктора</th>
                        <th>Показывать?</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($doctors as $doctor)
                        <tr>
                            <td>
                                <img class="direct-chat-img" src="{{ $doctor->doctor_images }}"
                                    alt="{{ $doctor->doctor_name }}">
                            </td>
                            <td>{{ $doctor->doctor_name }}</td>
                            <td>
                                @if ($doctor->doctor_visible == 1)
                                    <span class="badge badge-success">
                                        Не скрыт</span>
                                @else
                                    <span class="badge badge-danger">
                                        Cкрыт</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('sait.doctor.show', $doctor->doctor_alias)}}" class="btn btn-warning btn-xs">Просмотр</a>
                                <a href="{{route('admin.doctors.edit', $doctor->id)}}" class="btn btn-info btn-xs">Изменить</a>
                                <form action="{{ route('admin.doctors.destroy', $doctor->id) }}" method="POST">
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