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
            <h2 class="mdl-card__title-text ">О чтении</h2>
        </div>
        <div class="mdl-card__supporting-text">
            «От чтения, как от каждого шага и дыхания в жизни, следует чего-то ждать, отдавать силы, чтобы собирать урожай сил еще больших, терять себя, чтобы обретать себя вновь еще более сознательного. Не имеет смысла знать историю литературы, если каждая прочитанная книга не стала для нас радостью или утешением, силой или душевным покоем. Бездумное, рассеянное чтение - это то же, что прогулка по прекрасной местности с завязанными глазами. Читать мы должны не для того, чтобы забыть самих себя и нашу повседневную жизнь, а чтобы твердо удерживать кормило жизни с еще более зрелым сознанием. Мы должны подходить к книгам не как боязливые школяры к высокомерным учителям и не как бездельники к бутылке шнапса, а как скалолазы к Альпам, как бойцы к арсеналу; не как беглецы, спасающиеся от жизни, а как добрые люди приходят к друзьям и помощникам. И если бы все было и происходило так, то вряд ли бы читалась и десятая доля того, что читается ныне, а все бы мы были в десятки раз веселей и богаче.»
        </div>
        <div class="mdl-card__actions mdl-card--border">
            <a href="/search/index" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                Начать
            </a>
        </div>
    </div>
{% endblock %}
