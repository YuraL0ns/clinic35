@extends('adminlte::page')

@section('title', 'Панель управления - Первая многопрофильная клиника')

@section('content_header')
    <h1 class="m-0 text-dark">Главная страница CRM системы</h1>
@stop



@section('content')
@if(Session::has('success'))
<div class="alert alert-primary alert-dismissible bg-success text-white border-0 fade show" role="alert">
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
    {{session('success')}}
  </div>
@endif



    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <p class="mb-0">
                        <a class="btn btn-lg btn-success" href="{{route('admin.form.list')}}">Перейти на заявки</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/laravel-echo/dist/echo.iife.min.js"></script>

    <script>
        Pusher.logToConsole = true
        const echo = new Echo({
            broadcaster: 'pusher',
            key: '95b49b74390be3e3997b', // Замените на ваш реальный ключ
            cluster: 'eu', // Замените на ваш кластер
            forceTLS: true
        });
        echo.channel('FormChannel')
            .listen('.MyListener', (e) => {
                // Предполагая, что в e.message есть текст сообщения
                console.log(e.message); // Отладка

                // Пример добавления уведомления в список уведомлений AdminLTE
                const notificationsMenu = $('#notifications-menu');
                const notificationsCountElem = $('#notifications-count'); // Предположим, что у вас есть элемент для подсчёта уведомлений
                let notificationsCount = parseInt(notificationsCountElem.text()) || 0;

                notificationsMenu.prepend(`<li>${e.message}</li>`); // Добавляем новое уведомление в начало списка
                notificationsCount += 1;
                notificationsCountElem.text(notificationsCount); // Обновляем счётчик уведомлений
            });
    </script>
@endsection
