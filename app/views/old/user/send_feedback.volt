{% extends "templates/base.volt" %}
{% block stylesheet %}
    <link rel="stylesheet" href="../../../public/css/login.css">
{% endblock %}

{% block body %}
    <div class="head-line">
        <h2>{{ message }}</h2>
        <h4><a href="/user/home">на главную</a></h4>
    </div>
{% endblock %}