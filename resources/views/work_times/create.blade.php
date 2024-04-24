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
            <label for="startTime">Начальное время</label>
            <input type="time" class="form-control" name="startTime" id="startTime" required>
        </div>
        <div class="form-group">
            <label for="endTime">Конечное время</label>
            <input type="time" class="form-control" name="endTime" id="endTime" required>
        </div>
        <div id="timeSlots"></div>
        <button type="button" class="btn btn-secondary" id="generateSlots">Сгенерировать интервалы</button>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
@stop
@section('myJs')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

    <script>
        document.getElementById('generateSlots').addEventListener('click', function() {
            const startTime = document.getElementById('startTime').value;
            const endTime = document.getElementById('endTime').value;
            const timeSlotsContainer = document.getElementById('timeSlots');

            // Очищаем предыдущие интервалы
            timeSlotsContainer.innerHTML = '';

            let currentTime = new Date();
            currentTime.setHours(startTime.split(':')[0], startTime.split(':')[1], 0, 0);
            const end = new Date();
            end.setHours(endTime.split(':')[0], endTime.split(':')[1], 0, 0);

            while (currentTime <= end) {
                const timeSlot = document.createElement('div');
                timeSlot.className = 'form-group time-slot';

                const input = document.createElement('input');
                input.type = 'datetime-local';
                input.className = 'form-control';
                input.name = 'work_time[]';
                input.value = currentTime.toISOString().substring(0, 16);

                timeSlot.appendChild(input);
                timeSlotsContainer.appendChild(timeSlot);

                // Добавляем 15 минут
                currentTime.setMinutes(currentTime.getMinutes() + 15);
            }
        });

    </script>
@stop