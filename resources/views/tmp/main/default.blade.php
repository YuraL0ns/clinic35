<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {!! SEO::generate() !!}
    @vite(['resources/sass/app.scss'])
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<x-header />
<section class="main">
    <div class="main__container">
        @yield('content')
        </div>
  </section>
<x-callback />
<x-footer/>
</body>
{{--<script src="./js/main.js"></script>--}}
<script>
    // Получаем ссылку на модальное окно и кнопку закрытия
    var modal = document.getElementById("myModal");
    var closeBtn = document.getElementsByClassName("close")[0];

    // Обработчик клика по кнопке закрытия
    closeBtn.onclick = function() {
        closeModal();
    };

    function openModal() {
        modal.style.display = "block";
    }
    // Обработчик клика вне модального окна
    window.onclick = function(event) {
        if (event.target == modal) {
            closeModal();
        }
    };

    function closeModal() {
        modal.style.display = "none";
    }

    var form = document.getElementById('myForm');

    form.addEventListener('submit', function(e) {
        e.preventDefault();

        closeModal();


    });
</script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/laravel-echo/dist/echo.iife.min.js"></script>

<script>
    window.Echo = new Echo({
        broadcaster: 'pusher',
        key: '95b49b74390be3e3997b',
        cluster: 'eu',
        forceTLS: true
    });

    var channel = Echo.channel('FormChannel');
    channel.listen('.MyListener', function(data) {
        console.log(data);
        // alert(JSON.stringify(data));
    });

</script>
<script>
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    document.getElementById('myForm').addEventListener('submit', function(e) {
        e.preventDefault();

        var formData = new FormData(this);

        fetch('/submit-form-header', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': csrfToken,
            },
        })
            .then(response => {
                if (response.ok) {
                    Swal.fire({
                        title: 'Успех!',
                        text: 'Ваше сообщение успешно отправлено.',
                        icon: 'success',
                    });
                    document.getElementById('myForm').reset();
                } else {
                    Swal.fire({
                        title: 'Ошибка!',
                        text: 'Что-то пошло не так. Попробуйте еще раз.',
                        icon: 'error',
                    });
                }
            })
            .catch(error => {
                Swal.fire({
                    title: 'Ошибка!',
                    text: 'Произошла ошибка при отправке формы.',
                    icon: 'error',
                });
            });
    });
</script>
</html>
