@extends('adminlte::page')

@section('title', 'Панель управления - Первая многопрофильная клиника')

@section('content_header')
    <h1 class="m-0 text-dark">Список всех расценок</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-6">
            <div class="card-body">
                <div class="callout callout-info">
                    <h5>Внимание!</h5>
                    <p>Для редактирования строки нажимаем на интересующие нас поле, после чего вводим необходимые изменения,
                        и по завершению редактирования нажимаем <b>ЛКМ(левая конпка мыши)</b> на <u>пустом поле</u> - для
                        сохранения изменений в редактируемом блоке</p>
                </div>
            </div>
        </div>
       <div class="col-6">
           <div class="card-body">
               <div class="callout callout-danger">
                   <h5>Внимание!</h5>
                   <p>Возможно зависание полей при редактировании, ошибку уберём со временем. <br>Так как функция эта должна
                       работать исправно и в другой части кода.<br>
                    Так же как и функция <span class="badge badge-danger">удаления</span> будет <i>доступна позднее</i>
                   </p>
               </div>
           </div>
       </div>
        <div class="col-12">
            <div class="card-body">
                <div class="callout callout-warning">
                    <h5>Памятка!</h5>
                    <p>Страница и код будет со временем обновлятся, будут появлятся новые функции и разделы. </p>
                </div>
            </div>
        </div>


        <div class="col-12">

            @foreach($servicesPoint as $service)
                <div id="accordion">
                    <div class="card ">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                <a href="#collapse{{$service->service_alias}}" class="d-block w-100 collapsed"
                                   aria-expanded="false" data-toggle="collapse">
                                    {{$service->service_title}}
                                </a>
                            </h4>
                        </div>
                        <div class="collapse" data-parent="#accordion" id="collapse{{$service->service_alias}}">
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>ОКВД</th>
                                        <th>Наименование</th>
                                        <th>Цена, Руб</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($service->points as $point)
                                        @csrf
                                        <tr>
                                            <td>
                                                <span class="editable" data-point-id="{{$point->id}}"
                                                      data-field="point_okvd">{{$point->point_okvd}}</span>
                                                <input type="text" class="form-control d-none"
                                                       data-point-id="{{$point->id}}" data-field="point_okvd">
                                            </td>
                                            <td>
                                                <span class="editable" data-point-id="{{$point->id}}"
                                                      data-field="point_title">{{$point->point_title}}</span>
                                                <input type="text" class="form-control d-none"
                                                       data-point-id="{{$point->id}}" data-field="point_title">
                                            </td>
                                            <td>
                                                <span class="editable" data-point-id="{{$point->id}}"
                                                      data-field="point_price">{{$point->point_price}}</span>
                                                <input type="text" class="form-control d-none"
                                                       data-point-id="{{$point->id}}" data-field="point_price">

                                                Руб
                                            </td>

                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="3">
                                            <a href="{{route('admin.point.create')}}" class="btn btn-primary">Добавить новую
                                                запись
                                            </a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>


                            </div>
                        </div>

                    </div>
                </div>
            @endforeach

        </div>
    </div>

    {{--    Модалка--}}
    <!-- Модальное окно для добавления новой записи -->
    <div class="modal fade" id="addPointModal" tabindex="-1" role="dialog" aria-labelledby="addPointModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addPointModalLabel">Добавить новую запись</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="addPointForm">
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <div class="modal-body">
                        <!-- Скрытое поле для передачи идентификатора сервиса -->
                        <input type="hidden" name="service_id" id="service_id">
                        <!-- Поля для ввода данных -->
                        <div class="form-group">
                            <label for="point_okvd">ОКВД:</label>
                            <input type="text" class="form-control" id="point_okvd" name="point_okvd">
                        </div>
                        <div class="form-group">
                            <label for="point_title">Наименование:</label>
                            <input type="text" class="form-control" id="point_title" name="point_title">
                        </div>
                        <div class="form-group">
                            <label for="point_price">Цена:</label>
                            <input type="text" class="form-control" id="point_price" name="point_price">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{--    Модалка--}}

@stop
@section('js')
    <script>
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        document.addEventListener('DOMContentLoaded', function () {
            // Открытие модального окна для добавления новой записи
            const addPointButton = document.getElementById('addPointButton');
            if (addPointButton) {
                addPointButton.addEventListener('click', function() {
                    const serviceId = this.getAttribute('data-service-id');
                    document.getElementById('service_id').value = serviceId;
                    // Здесь должен быть ваш код для отображения модального окна
                    // Например, если вы используете Bootstrap модальные окна без jQuery, вам нужно будет использовать новый Bootstrap Modal API
                });
            }

            // Обработка отправки формы добавления нового поинта
            const addPointForm = document.getElementById('addPointForm');
            if (addPointForm) {
                addPointForm.addEventListener('submit', function (event) {
                    event.preventDefault(); // Предотвращаем стандартное поведение формы
                    const formData = new FormData(this); // Получаем данные формы

                    fetch('/admin/prices/add', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken, // Добавляем CSRF токен
                        },
                        body: formData,
                    }).then(response => {
                        if (response.ok) {
                            alert('Новый поинт успешно добавлен!');
                        }
                    }).catch(error => {
                        alert('Произошла ошибка: ' + error);
                    });
                });
            }

            // Переключение между режимами просмотра и редактирования
            document.querySelectorAll('.editable').forEach(function(element) {
                element.addEventListener('dblclick', function() {
                    const pointId = this.getAttribute('data-point-id');
                    const field = this.getAttribute('data-field');
                    this.classList.add('d-none');
                    const input = this.nextElementSibling;
                    input.classList.remove('d-none');
                    input.value = this.innerText;
                    input.focus();
                });
            });

            // Функция сохранения изменений
            document.querySelectorAll('.form-control').forEach(function(input) {
                input.addEventListener('blur', function() {
                    saveChanges(this);
                });
            });

            function saveChanges(input) {
                const pointId = input.getAttribute('data-point-id');
                const field = input.getAttribute('data-field');
                const newValue = input.value;

                if (pointId) {
                    fetch('/admin/prices/' + pointId, {
                        method: 'PUT',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({ [field]: newValue }),
                    }).then(response => {
                        if (response.ok) {
                            alert('Данные успешно сохранены!');
                        }
                    }).catch(error => {
                        alert('Произошла ошибка: ' + error);
                    });
                } else {
                    alert('Ошибка: идентификатор точки не определен');
                }
            }
        });
    </script>
@stop
