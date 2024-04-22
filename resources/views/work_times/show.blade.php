{{-- resources/views/work_times/show.blade.php --}}
@extends('adminlte::page')

@section('title', 'Время приема')

@section('content_header')
    <h1>Время приема, {{ $workTime->doctor->doctor_name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <p><strong>Имя доктора:</strong> {{ $workTime->doctor->doctor_name }}</p>
            <p><strong>Время приема специалиста:</strong> {{ $workTime->work_time }}</p>
        </div>
    </div>
@stop
