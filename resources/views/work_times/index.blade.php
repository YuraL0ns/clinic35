{{-- resources/views/work_times/index.blade.php --}}
@extends('adminlte::page')

@section('title', 'Время приёма')

@section('content_header')
    <h1>Приём специалистов</h1>
@stop

@section('content')
    <div class="mb-3">
        <input type="text" id="searchInput" class="form-control" placeholder="Поиск по докторам...">
    </div>
    <div class="accordion" id="doctorsAccordion">
        @foreach ($doctors as $index => $doctor)
            <div class="card">
                <div class="card-header" id="heading{{ $index }}">
                    <h2 class="mb-0 d-flex justify-content-between">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse{{ $index }}" aria-expanded="true" aria-controls="collapse{{ $index }}">
                                {{ $doctor->doctor_name }}
                            </button>
                        <a href="{{ route('admin.work_times.create', ['doctor_id' => $doctor->id]) }}" class="btn btn-sm btn-primary float-right">Добавить время</a>

                    </h2>
                </div>

                <div id="collapse{{ $index }}" class="collapse {{ $index == 0 ? 'show' : '' }}" aria-labelledby="heading{{ $index }}" data-parent="#doctorsAccordion">
                    <div class="card-body">
                        <ul class="">
                            @foreach ($doctor->workTimes as $workTime)
                                <li>{{ $workTime->work_time}}
                                    <form class="ml-3" action="{{ route('admin.work_times.destroy', $workTime) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-xs btn-danger" onclick="return confirm('Вы уверены?')"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@stop

@section('myJs')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.getElementById('searchInput');
            const accordions = document.querySelectorAll('.card');

            searchInput.addEventListener('keyup', function() {
                const searchText = searchInput.value.toLowerCase();

                accordions.forEach(card => {
                    const doctorName = card.querySelector('.btn-link').textContent.toLowerCase();
                    if (doctorName.includes(searchText)) {
                        card.style.display = '';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });
    </script>
@endsection