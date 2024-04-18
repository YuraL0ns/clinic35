<section class="zapis">
  <div class="zapis__container">
    <div class="zapis-box">
      <h3 class="zapis-box-heading">
        Запишитесь на прием
      </h3>
      <h1 class="zapis-box-text">
        Заполните контактные данные, и мы свяжемся с Вами в течении 5 минут. 
      </h1>

      <div class="zapis-box-form">
        <form action="{{route('send.from.footer')}}" method="post" class="zapis-box-form-forms">
          @csrf
          <div class="zapis-box-form-row">
            <input type="text" name="name" placeholder="Ваше имя" class="zapis-box-form-input">
            <input type="text" name="phone" placeholder="Ваш номер телефона" class="zapis-box-form-input">
            <input type="hidden" name="from" value="footer">
          </div>
          <button class="zapis-box-form-button" type="submit">Заказать звонок</button>
          <div class="zapis-box-form-small">
            <p class="zapis-box-form-small-text">Нажимая на кнопку, вы даете согласие на обработку персональных данных и соглашаетесь c политикой конфиденциальности</p>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
