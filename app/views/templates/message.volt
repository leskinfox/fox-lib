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
        <h2>{{ text }}</h2>
        <h4><a href="{{ link }}">{{ text_link }}</a></h4>
        <img src={{ img }}>
    </div>
</body>
</html>