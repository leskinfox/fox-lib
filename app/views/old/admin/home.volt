{% extends "templates/main.volt" %}
{% block content %}
    <style>
        .demo-card-wide.mdl-card {
            margin: 15px 15px 15px 15px;
            width: 600px;
        }
        .demo-card-wide > .mdl-card__title {
            color: #fff;
            height: 176px;
            background: url('/public/img/mater1.jpg') center / cover;
        }
        .demo-card-wide > .mdl-card__menu {
            color: #fff;
        }
    </style>

    <div class="demo-card-wide mdl-card mdl-shadow--2dp">
        <div class="mdl-card__title">
            <h2 class="mdl-card__title-text ">Режим администратора</h2>
        </div>
        <div class="mdl-card__supporting-text">
            Вы находитесь в режими администратора.
        </div>
        <div class="mdl-card__actions mdl-card--border">
            <a href="/user/search" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                Перейти к заказам
            </a>
        </div>
    </div>
{% endblock %}

{% block menu %}
    {% include 'parts/admin_menu.volt' %}
{% endblock %}