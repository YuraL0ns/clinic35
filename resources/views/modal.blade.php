@extends('tmp.main.default')
<div x-data="{ showModal: false, name: '', phone: '' }">
    <!-- Кнопка для открытия модального окна -->
    <button @click="showModal = true">Открыть модальное окно</button>

    <!-- Модальное окно -->
    <div x-show="showModal" @click.away="showModal = false">
        <div>
            <!-- Форма для ввода данных -->
            <form @submit.prevent="submitForm">
                <input type="text" x-model="name" placeholder="Имя">
                <input type="text" x-model="phone" placeholder="Телефон">
                <button type="submit">Отправить</button>
            </form>
        </div>
    </div>

    <!-- Закрытие модального окна -->
    <div x-show="showModal">
        <div @click="showModal = false">
            <!-- Здесь можно добавить разметку для сообщения об успешной отправке -->
        </div>
    </div>
</div>

<script>
    function submitForm() {
        // Здесь можно добавить AJAX-запрос для отправки данных формы на сервер
        // В этом примере показываем сообщение об успешной отправке
        console.log('Отправлено!');
        // Очистка полей формы после отправки
        this.name = '';
        this.phone = '';
        // Закрытие модального окна через 20 секунд
        setTimeout(() => { this.showModal = false; }, 20000);
    }
</script>
