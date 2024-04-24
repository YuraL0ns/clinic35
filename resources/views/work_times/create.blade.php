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
        <div id="timeSlots">
            <div class="form-group time-slot">
                <label for="work_time">Время работы</label>
                <input type="datetime-local" class="form-control" name="work_time[]" id="work_time" required>
            </div>
        </div>
        <button type="button" class="btn btn-secondary" id="addTimeSlot">Добавить интервал</button>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
@stop
@section('myJs')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

    <script>
        document.getElementById('addTimeSlot').addEventListener('click', function() {
            let lastInput = document.querySelectorAll('.time-slot:last-child input')[0];
            let newTime = moment(lastInput.value);

            // Добавляем 15 минут к текущему времени с учетом часового пояса
            newTime.add(15, 'minutes');

            let newInput = lastInput.cloneNode(true);
            // Обновляем значение input, устанавливая форматированное локальное время
            newInput.value = newTime.format('YYYY-MM-DDTHH:mm');

            let newDiv = document.createElement('div');
            newDiv.className = 'form-group time-slot';

            let label = document.createElement('label');
            label.textContent = 'Время работы';
            newDiv.appendChild(label);

            newDiv.appendChild(newInput);

            document.getElementById('timeSlots').appendChild(newDiv);
        });

    </script>
@stop