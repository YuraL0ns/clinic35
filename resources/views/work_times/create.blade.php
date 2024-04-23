{{-- resources/views/work_times/create.blade.php --}}
@extends('adminlte::page')

@section('title', 'Новое время приёма')

@section('content_header')
    <h1>Новое время приема</h1>
@stop

@section('content')
    <form action="{{ route('admin.work_times.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="doctor_id">Выберите специалиста</label>
            <select class="form-control" name="doctor_id">
                @foreach($doctors as $doctor)
                    <option value="{{ $doctor->id }}" {{ $selectedDoctorId == $doctor->id ? 'selected' : '' }}>{{ $doctor->doctor_name }}</option>
                @endforeach
            </select>

        </div>
        <div class="form-group">
            <label for="work_time">Время работы</label>
            <input type="datetime-local" class="form-control" name="work_time" id="work_time" required>
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
@stop

@section('myJs')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const selectedDoctorId = "{{ $selectedDoctorId }}";
            console.log('Selected Doctor ID:', selectedDoctorId);
            if (!selectedDoctorId) {
                console.error('Doctor ID is not set');
            }
        });
    </script>
@endsection