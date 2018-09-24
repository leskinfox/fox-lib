<form action="/index/signin" method="post">
    <div class="element">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label wide-input">
            <input class="mdl-textfield__input wide-input" name="name" value="{{ name }}" type="text" id="name">
            <label class="mdl-textfield__label wide-input" for="name">Имя</label>
            <span class="mdl-textfield__error wide-input">Имя не должно быть путым</span>
        </div>
    </div>
    <div class="element">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" name="contact" value="{{ contact }}" type="text" id="login" pattern="\+7\d{10}|8\d{10}|\d{10}|\w+@\w+\.\w+">
            <label class="mdl-textfield__label" for="login">Телефон или email</label>
            <span class="mdl-textfield__error">Введите корректный адрес или телефон</span>
        </div>
    </div>
    <div align="center" class="button">
        <button type="submit" id="btn" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored element">
            Вход
        </button>
    </div>

</form>