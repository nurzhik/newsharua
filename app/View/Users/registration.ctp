<section class="check perc">
    <div class="container">
        <div class="check_wrapper">
            <div class="check_title">регистрация</div>
            <form action="/users/registration" method="POST" class="check_blog">
                <div class="check-row">
                    <div class="check-title">ФИО</div>
                    <input type="text" name="data[User][fio]" required placeholder="Фамилия, Имя, Отчество">
                </div>
                 <div class="check-row">
                    <div class="check-title">ИИН</div>
                    <input type="number" name="data[User][iin]" required placeholder="Фамилия, Имя, Отчество">
                </div>
                <div class="check-row">
                    <div class="check-title">Номер телефона</div>
                    <input type="text" name="data[User][phone]" required placeholder="Введите ваш номер телефона">
                </div>
                <div class="check-row">
                    <div class="check-title"  >Придумайте пароль</div>
                    <input type="password" name="data[User][password]" required>
                </div>
                <div class="check-row">
                    <div class="check-title">Повторите пароль</div>
                    <input type="password" name="data[User][password_repeat]"required>
                </div>
                <div class="check-row">
                    <div class="check-title">E-mail</div>
                    <input type="email" name="data[User][username]"  required>
                </div>
                <a href="javascript:;" class="checkbox"><input id="check" required type="checkbox"><label for="check">Согласие на сбор и обработку персональных данных</label></a>
                <button class="popup-sbt" type="submit">зарегистрироваться</button>
            </form>
        </div>
    </div>
</section>