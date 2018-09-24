<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    {% block stylesheet %}
    {% endblock %}
    {% include 'parts/css.volt' %}
    <link rel="SHORTCUT ICON" href="img/fox_icon.png" type="image/png">
    <title>Библиотека семьи Лескиных</title>
</head>
<body>
{% block body %}
{% endblock   %}
{% block scripts %}
{% endblock %}
{% include 'parts/scripts.volt' %}
</body>
</html>