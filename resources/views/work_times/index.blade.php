{{-- resources/views/work_times/index.blade.php --}}
@extends('adminlte::page')

@section('title', 'Время приёма')

@section('content_header')
    <h1>Приём специалистов</h1>
@stop

@section('content')
    <div class="accordion" id="doctorsAccordion">
        @foreach ($doctors as $index => $doctor)
            <div class="card">
                <div class="card-header" id="heading{{ $index }}">
                    <h2 class="mb-0 d-flex justify-content-between">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse{{ $index }}" aria-expanded="true" aria-controls="collapse{{ $index }}">
                                {{ $doctor->doctor_name }}
                            </button>
                            <!-- Кнопка для добавления новой даты -->
                        <span class="badge badge-primary">{{ route('admin.work_times.create', ['doctor_id' => $doctor->id]) }}</span>
                        <a href="{{ route('admin.work_times.create', ['doctor_id' => $doctor->id]) }}" class="btn btn-sm btn-primary float-right">Добавить время</a>

                    </h2>
                </div>

                <div id="collapse{{ $index }}" class="collapse {{ $index == 0 ? 'show' : '' }}" aria-labelledby="heading{{ $index }}" data-parent="#doctorsAccordion">
                    <div class="card-body">
                        <ul>
                            @foreach ($doctor->workTimes as $workTime)
                                <li>@customDate($workTime->work_time)</li>


                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@stop

@section('css')

@stop

@section('js')
    <script>
    </script>
@stop
