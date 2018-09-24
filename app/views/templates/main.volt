<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    {% include 'templates/css.volt' %}
    <link rel="SHORTCUT ICON" href="/public/img/fox_icon.png" type="image/png">
    <link rel="stylesheet" href="/public/css/styles.css">
    <title>Библиотека семьи Лескиных</title>
</head>
<body>
<div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">

    {% if admin|default(0) %}
        {% include 'templates/admin_header.volt' %}
    {% else %}
        {% include 'templates/user_header.volt' %}
    {% endif %}

    {% if admin|default(0) %}
        {% include 'templates/admin_menu.volt' %}
    {% else %}
        {% include 'templates/user_menu.volt' %}
    {% endif %}

    <main class="mdl-layout__content mdl-color--grey-100">
        {% block content %}
        {% endblock %}
    </main>

    {% include 'templates/scripts.volt' %}

</div>
</body>
</html>





