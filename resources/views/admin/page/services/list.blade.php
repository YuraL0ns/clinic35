@extends('adminlte::page')

@section('title', 'Панель управления - Первая многопрофильная клиника')

@section('content_header')
    <h1 class="m-0 text-dark">Список всех услуг</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Изображение</th>
                    <th>Наименование</th>
                    <th>Раздел</th>
                    <th>Действия</th>
                    <th>Доктора</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($services as $service)
                    <tr>
                        <td>
                            <img class="direct-chat-img" src="{{ $service->service_images }}"
                                 alt="{{ $service->service_title }}">
                        </td>
                        <td>{{ $service->service_title }}</td>
                        <td>{{$service->razdel->razdel_title}}</td>
                        <td>
                            <a href="{{ route('sait.razdel.show.services', [
                                    'razdel_alias' => $service->razdel->razdel_alias,
                                    'alias' => $service->service_alias
                                ]) }}" class="btn btn-warning btn-xs">Просмотр</a>
                            <a href="{{route('admin.services.edit', $service->id)}}" class="btn btn-info btn-xs">Изменить</a>
                            <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-xs btn-danger">Удалить</button>
                            </form>
                        </td>
                        <td>
                            <a href="#" class="btn btn-xs btn-outline-success show-doctors" data-toggle="modal" data-target="#doctorsModal" data-service-id="{{$service->id}}">Список докторов</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Модальное окно -->
    <!-- Модальное окно -->
    <div class="modal fade" id="doctorsModal" tabindex="-1" role="dialog" aria-labelledby="doctorsModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="doctorsForm">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="doctorsModalLabel">Список докторов</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Существующие врачи -->
                        @foreach($service->doctors as $doctor)
                            <div class="form-check">
                                <input class="form-check-input existing-doctor" type="checkbox" value="{{ $doctor->id }}" id="doctor{{ $doctor->id }}">
                                <label class="form-check-label" for="doctor{{ $doctor->id }}">
                                    {{ $doctor->doctor_name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                        <button type="submit" class="btn btn-primary" id="save-doctors-btn">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{--    Модал--}}

@stop

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Находим все кнопки для показа врачей и добавляем к ним обработчик событий
            document.querySelectorAll('.show-doctors').forEach(function(button) {
                button.addEventListener('click', function() {
                    const serviceId = this.getAttribute('data-service-id');
                    fetchDoctors(serviceId);
                });
            });
        });

        function fetchDoctors(serviceId) {
            // Отправляем запрос к серверу для получения списка врачей
            fetch('/admin/services/' + serviceId + '/doctors')
                .then(response => response.json())
                .then(data => {
                    const modalBody = document.querySelector('#doctorsModal .modal-body');
                    modalBody.innerHTML = ''; // Очищаем содержимое модального окна
                    data.doctors.forEach(doctor => {
                        const checkbox = document.createElement('div');
                        checkbox.className = 'form-check';
                        checkbox.innerHTML = `
                    <input class="form-check-input existing-doctor" type="checkbox" value="${doctor.id}" id="doctor${doctor.id}" ${doctor.is_associated ? 'checked' : ''}>
                    <label class="form-check-label" for="doctor${doctor.id}">
                        ${doctor.doctor_name}
                    </label>
                `;
                        modalBody.appendChild(checkbox);
                    });
                })
                .catch(error => console.error('Error:', error));
        }

        document.addEventListener('DOMContentLoaded', function () {
            const saveDoctorsBtn = document.getElementById('save-doctors-btn');
            saveDoctorsBtn.addEventListener('click', function(event) {
                event.preventDefault(); // Предотвращаем стандартное поведение формы
                saveDoctors();
            });
        });

        function saveDoctors() {
            const selectedDoctors = Array.from(document.querySelectorAll('.existing-doctor:checked')).map(checkbox => checkbox.value);
            const serviceId = document.querySelector('.show-doctors').getAttribute('data-service-id');

            fetch('/admin/services/' + serviceId + '/doctors/add', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'), // Добавляем CSRF токен
                },
                body: JSON.stringify({
                    doctors: selectedDoctors
                }),
            })
                .then(response => {
                    if (response.ok) {
                        return response.json();
                    }
                    throw new Error('Network response was not ok.');
                })
                .then(data => {
                    console.log('Success:', data);
                    document.querySelector('#doctorsModal').classList.remove('show'); // Закрываем модальное окно
                })
                .catch(error => console.error('Error:', error));
        }

    </script>
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