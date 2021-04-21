<section class="page-full">
    <div class="container">
      <div class="login-form">
        <div class="login-form__heading">Вход</div>
        <div class="login_block">
          <form class="login_form" action="/users/login" class="login_body"  id="UserLoginForm" method="POST" accept-charset="utf-8">
            <div class="input_block">
              <div class="input_name">Адрес эдектронной почты</div>
              <input class="form_input" type="email" name="data[User][username]"required="">
            </div>
            <div class="input_block pass_input_block">
              <div class="input_name">Пароль</div>
              <input class="form_input pass_input pass_input__pass" type="password" name="data[User][password]" required="">
              <div class="input_err pass_err"></div>
              <div class="pass_eye"></div>
            </div>
            <div class="login_buttons login_buttons--top">
              <button class="login_form_btn gray_btn" type="submit">Войти</button>
            </div>
          </form>
          <div class="login_buttons login_buttons--bot">
            <div class="login_bottom_text">Забыли пароль?</div>
            <a class="login_link" href="javascript:;">Восстановить пароль</a>
          </div>
        </div>
      </div>
    </div>
</section>


