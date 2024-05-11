<div class="nav-header">
    <div class="nav-header__container">
      <div class="nav-header__phone">
        <ul class="nav-header__phone-list">
          <li class="nav-header__phone-list-item">
            <a class="nav-header__phone-list-item-link" href="tel:+79212524002">+79212524002</a>
          </li>
          <li class="nav-header__phone-list-item">
            <a class="nav-header__phone-list-item-link" href="tel:88202302028">(8202) 30-20-28</a>
          </li>
        </ul>
      </div>
      <div class="nav-header__ta">
        <div class="nav-header__ta-lr">
          <div class="nav-header__ta-lr-l">
            <span class="nav-header__ta-lr-l-item">г. Череповец, ул. Архангельская, 7 "Б"</span>
          </div>
          <ul class="nav-header__ta-lr-r">
            <li class="nav-header__ta-lr-r-item">
              <span class="nav-header__ta-lr-r-item-span">Пн-Пт — с 08:00 до 20:00</span>
            </li>
            <li class="nav-header__ta-lr-r-item">
              <span class="nav-header__ta-lr-r-item-span">Сб-Вс — с 09:00 до 17:00</span>
            </li>
          </ul>
        </div>
      </div>

{{--      <div class="block">--}}
{{--        <a href="{{route('register.user.online')}}" class="nav-header__onCall-item js-static-modal-toggle">Онлайн регистрация</a>--}}
{{--      </div>--}}

      <div class="nav-header__onCall">
        <button type="button" class="nav-header__onCall-item js-static-modal-toggle" onclick="openModal()">Записаться на приём</button>
      </div>



      <div id="myModal" class="modal">
        <div class="modal-content">
          <span class="close">&times;</span>
          <h3 class="modal-title">Оставьте свои данные и наш менеджер свяжется с вами в кратчайшие сроки</h3>
          <form id="myForm" class="modal-form" action="{{route('send.from.header')}}" method="post">
            @csrf
            <div class="modal-form-row">
                <input class="modal-form-input" type="text" name="name" placeholder="Ваше имя">
                <input class="modal-form-input" type="text" name="phone" placeholder="Ваш номер телефона">
                <input type="hidden" name="from" value="header">
            </div>
            <button class="modal-form-button" type="submit">Отправить</button>
        </form>
        </div>
      </div>


    </div>
  </div>

  <section class="navbar">
    <div class="navbar__container">
      <div class="navbar-logo">
        <a class="navbar-logo-item" href="{{route('sait.home.page')}}">
          <img class="navbar-logo-item-img" src="{{ asset('template/navbar/logo.png') }}" alt="Первая многопрофильная клиника">
        </a>
      </div>
      <div class="navbar-menu">
        <a class="navbar-menu-btn" href="#">
          <ion-icon name="menu"></ion-icon>
        </a>
        <ul class="navbar-menu-list">
          <li class="navbar-menu-list-item">
            <a href="{{route('sait.home.page')}}">Главная</a>
          </li>
          <li class="navbar-menu-list-item">
            <a href="{{route('sait.home.services.list')}}/adult">Услуги</a>
          </li>
          <li class="navbar-menu-list-item">
            <a href="{{route('sait.doctor.list')}}">Специалисты</a>
          </li>

          <li class="navbar-menu-list-item">
            <a href="{{route('sait.page.price')}}">Акции</a>
          </li>
          <li class="navbar-menu-list-item">
            <a href="{{env('APP_URL')}}/page/documents">Документы</a>
          </li>
          <li class="navbar-menu-list-item">
            <a href="{{route('sait.vacancy.main')}}">Вакансии</a>
          </li>
          <li class="navbar-menu-list-item">
            <a href="{{route('contact')}}">Контакты</a>
          </li>
        </ul>
      </div>
    </div>
  </section>

@section('js')
  <script>
    const modal = document.getElementById("myModal");
    const closeBtn = document.querySelector(".close");

    closeBtn.onclick = closeModal;

    window.onclick = (event) => {
      if (event.target === modal) {
        closeModal();
      }
    };
    function openModal() {
      modal.style.display = "block";
    }
    function closeModal() {
      modal.style.display = "none";
    }
  </script>
@stop
