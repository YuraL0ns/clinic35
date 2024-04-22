{{-- resources/views/work_times/edit.blade.php --}}
@extends('adminlte::page')

@section('title', 'Изменить приём врача')

@section('content_header')
    <h1>Изменить приём врача</h1>
@stop

@section('content')
    <form action="{{ route('admin.work_times.update', $workTime) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="doctor_id">Выберите доктора</label>
            <select class="form-control" name="doctor_id">
                @foreach($doctors as $doctor)
                    <option value="{{ $doctor->id }}" {{ $workTime->doctor_id == $doctor->id ? 'selected' : '' }}>{{ $doctor->doctor_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="work_time">Время работы</label>
            <input type="datetime-local" class="form-control" name="work_time" value="{{ $workTime->work_time }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Изменить</button>
    </form>
@stop
