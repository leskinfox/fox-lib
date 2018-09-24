<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    {% include 'templates/css.volt' %}
    <link rel="stylesheet" href="/public/css/login.css">
    <link rel="SHORTCUT ICON" href="img/fox_icon.png" type="image/png">
    <title>Библиотека семьи Лескиных</title>
</head>
<body>
<div class="head-line">
    <h2>Библиотека семьи Лескиных</h2>
    <h4>для продолжения введите ваши данные</h4>
</div>

<form action="/login/go" method="post">
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
    <div class="g-recaptcha" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"></div>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <div align="center" class="button">
        <button type="submit" id="btn" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored element">
            Вход
        </button>
    </div>
</form>

<footer><img src="/public/img/fox_logo.png">
    <p>Уши, лапы, хвост <a href="http://www.leskinfox.ru/" target="_blank">LeskinFOX</a></p>
</footer>
{% include 'templates/scripts.volt' %}
</body>
</html>