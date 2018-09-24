<style>

    .is-compact .mdl-layout__title span {
        display: none;
    }

    .portfolio-blog-card-bg >  {
        height: 52px;
        padding: 16px;
        background: rgba(0, 0, 0, 0.2);
    }

    img.article-image {
        width: 100%;
        height: auto;
    }

    .no-left-padding{
        padding-left: 0;
    }

    .padding-top {
        padding: 10px 0 0;
    }

    .portfolio-share-btn {
        position: relative;
        float: right;
        top: -4px;
    }

    .portfolio-contact form {
        max-width: 550px;
        margin: auto;
    }

    a {
        text-decoration: none;
        color: #636363;
    }


</style>


<div class="mdl-grid mdl-cell mdl-cell--12-col mdl-cell--4-col-tablet mdl-card mdl-shadow--4dp">
    <div class="mdl-card__media mdl-cell mdl-cell--12-col-tablet">
        <img class="article-image" src="{{ img }}" border="0" alt="">
    </div>
    <div class="mdl-cell mdl-cell--8-col">
        <h2 class="mdl-card__title-text">{{ title }}</h2>
        <div class="mdl-card__supporting-text padding-top">
            <span>{{  status_text }}</span>
            {% if edit_link %}
            <a href="{{ edit_link }}"  id="tt1" class=" icon material-icons portfolio-share-btn">edit</a>
                <div class="mdl-tooltip" for="tt1">
                    Редактировать
                </div>
            {% endif %}
        </div>
        <div class="mdl-card__supporting-text no-left-padding">
            <p>{{ description }}</p>
        </div>
        <div align="left">
            <a href="{{ link }}" type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">{{ button }}</a>
        </div>
    </div>
</div>