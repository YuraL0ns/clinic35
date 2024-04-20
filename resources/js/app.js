import './bootstrap';

// Обработчик готовности DOM
document.addEventListener("DOMContentLoaded", () => {
    const navbarMenuBtn = document.querySelector(".navbar-menu-btn");
    const navbarMenuList = document.querySelector(".navbar-menu-list");

    // Переключение класса active для меню при клике
    navbarMenuBtn.addEventListener("click", () => {
        if (window.innerWidth >= 320 && window.innerWidth <= 997) {
            navbarMenuList.classList.toggle("active");
        }
    });

    // Закрытие меню при клике вне его области
    document.addEventListener("click", (event) => {
        if (!event.target.closest(".navbar-menu")) {
            navbarMenuList.classList.remove("active");
        }
    });
});

const form = document.getElementById('myForm');
form.addEventListener('submit', async (e) => {
    e.preventDefault();
    try {
        const formData = new FormData(form);
        const response = await fetch('/submit-form-header', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
        });

        if (response.ok) {
            await Swal.fire({
                title: 'Успех!',
                text: 'Ваше сообщение успешно отправлено.',
                icon: 'success',
            });
            form.reset();
        } else {
            throw new Error('Сетевая ошибка');
        }
    } catch (error) {
        Swal.fire({
            title: 'Ошибка!',
            text: error.message || 'Произошла ошибка при отправке формы.',
            icon: 'error',
        });
    }


});



