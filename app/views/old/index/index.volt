{% extends "templates/base.volt" %}

{% block stylesheet %}
    <link rel="stylesheet" href="/public/css/login.css">
{% endblock %}

{% block body %}
    <div class="head-line">
        <h2>Библиотека семьи Лескиных</h2>
        <h4>для продолжения введите ваши данные</h4>
    </div>

    {% include "forms/auth.volt"%}

    <footer><img src="/public/img/fox_logo.png">
        <p>Уши, лапы, хвост <a href="http://www.leskinfox.ru/" target="_blank">LeskinFOX</a></p>
    </footer>
{% endblock %}
