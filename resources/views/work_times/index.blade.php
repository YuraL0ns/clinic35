{{-- resources/views/work_times/index.blade.php --}}
@extends('adminlte::page')

@section('title', 'Время работы спецалиста')

@section('content_header')
    <h1>Время работы спецалиста</h1>
    <a href="{{ route('admin.work_times.create') }}" class="btn btn-primary">Добавить</a>
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
@section('content')
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Имя специалиста</th>
            <th>Время работы</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($workTimes as $workTime)
            <tr>
                <td>{{ $workTime->id }}</td>
                <td>{{ $workTime->doctor->doctor_name }}</td>
                <td>{{ $workTime->work_time }}</td>
                <td>
                    <a href="{{ route('admin.work_times.show', $workTime) }}" class="btn btn-xs btn-success">Просмотр</a>
                    <a href="{{ route('admin.work_times.edit', $workTime) }}" class="btn btn-xs btn-info">Изменить</a>
                    <form action="{{ route('admin.work_times.destroy', $workTime) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-xs btn-danger" onclick="return confirm('Вы уверены?')">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop

