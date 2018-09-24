{% extends "templates/main.volt" %}
{% block content %}

    <style>



        h3 {
            margin-left: 24px;
        }

        .demo-card-square.mdl-card {
            width: 320px;
            height: 600px;
            float: left;
            margin-top: 12px;
            margin-left: 12px;
        }

        .demo-card-square > .mdl-card__title {
            color: #fff;
            min-height: 70px;




        }

        .author {
            margin-top: 2px;
            margin-bottom: 2px;
            font-size: large;
        }
    </style>



    <h3>Резултаты поиска:</h3>


    {% for book in books %}


        <div class="demo-card-square mdl-card mdl-shadow--2dp">
            <div class="mdl-card__title mdl-card--expand"
                    {% if book.img == "" %}
                        style='background: url("/public/img/books.jpg"); background-size: cover;'>
                    {% else %}
                        style='background: url("{{ book.img }}"); background-size: cover;'>
                    {% endif %}
                <h2 class="mdl-card__title-text">{{ book.name }}</h2>
            </div>
            <div class="mdl-card__supporting-text author">
                {{ book.author }} ({{ book.fond }})
            </div>
            <div class="mdl-card__supporting-text">
                {{ book.about }}
            </div>
            <div class="mdl-card__actions mdl-card--border">
                <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                    Подробнее
                </a>
                {% if book.state == "" %}
                    <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                        Заказать
                    </a>
                {% endif %}
            </div>
        </div>

    {% endfor %}

{% endblock %}