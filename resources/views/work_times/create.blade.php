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
            const startTimeValue = document.getElementById('startTime').value;
            const endTimeValue = document.getElementById('endTime').value;
            const timeSlotsContainer = document.getElementById('timeSlots');

            // Очистить предыдущие интервалы
            timeSlotsContainer.innerHTML = '';

            // Разбиваем время начала и конца на часы и минуты
            const [startHour, startMinute] = startTimeValue.split(':').map(Number);
            const [endHour, endMinute] = endTimeValue.split(':').map(Number);

            // Получаем текущую дату
            const currentDate = new Date();

            // Устанавливаем начальное и конечное время с учетом текущей даты
            let startTime = new Date(currentDate);
            startTime.setHours(startHour);
            startTime.setMinutes(startMinute);

            let endTime = new Date(currentDate);
            endTime.setHours(endHour);
            endTime.setMinutes(endMinute);

            // Генерация интервалов времени
            while (startTime <= endTime) {
                const timeSlot = document.createElement('div');
                timeSlot.className = 'form-group time-slot';

                const input = document.createElement('input');
                input.type = 'datetime-local';
                input.className = 'form-control';
                input.name = 'work_time[]';
                input.value = formatTime(startTime);

                timeSlot.appendChild(input);
                timeSlotsContainer.appendChild(timeSlot);

                // Добавляем 15 минут к текущему времени
                startTime.setMinutes(startTime.getMinutes() + 15);
            }
        });

        // Функция для форматирования времени в строку для ввода datetime-local
        function formatTime(date) {
            const year = date.getFullYear();
            const month = padZero(date.getMonth() + 1);
            const day = padZero(date.getDate());
            const hour = padZero(date.getHours());
            const minute = padZero(date.getMinutes());
            return `${year}-${month}-${day}T${hour}:${minute}`;
        }

        // Функция для добавления ведущего нуля к числу, если оно меньше 10
        function padZero(num) {
            return num < 10 ? '0' + num : num;
        }

    </script>
@stop