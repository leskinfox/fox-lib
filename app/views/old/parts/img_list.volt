
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


{% for item in items %}


<div class="demo-card-square mdl-card mdl-shadow--2dp">
    <div class="mdl-card__title mdl-card--expand"
            {% if item['img'] == "" %}
         style='background: url("/public/img/default.jpg"); background-size: cover;'>
        {% else %}
            style='background: url("{{ item['img'] }}"); background-size: cover;'>
        {% endif %}
        <h2 class="mdl-card__title-text">{{ item['title'] }}</h2>
    </div>
    <div class="mdl-card__supporting-text author">
        {{ item['subtitle'] }}
    </div>
    <div class="mdl-card__supporting-text">
        {{ item['text'] }}
    </div>
    <div class="mdl-card__actions mdl-card--border">
        <a href="{{ item['link'] }}" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
            {{ item['text_link'] }}
        </a>
    </div>
</div>

{% endfor %}