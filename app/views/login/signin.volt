{% extends "templates/base.volt" %}
{% block stylesheet %}
    <link rel="stylesheet" href="/public/css/login.css">
{% endblock %}

{% block body %}
    <div class="head-line">
        <h2>{{ message }}</h2>
        <h4><a href="/index">попробовать еще раз</a></h4>
    </div>
{% endblock %}