{% extends "templates/base.volt" %}
{% block stylesheet %}
    <link rel="stylesheet" href="../../../public/css/login.css">
{% endblock %}

{% block body %}
    <div class="head-line">
        <h2>{{ text }}</h2>
        <h4><a href="{{ link }}">{{ text_link }}</a></h4>
    </div>
{% endblock %}