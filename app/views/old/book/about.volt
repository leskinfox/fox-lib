{% extends "templates/main.volt" %}
{% block content %}
    <style>
        .demo-card-image.mdl-card {
            width: 256px;
            height: 256px;
            background: url('../assets/demos/image_card.jpg') center / cover;
        }
        .demo-card-image > .mdl-card__actions {
            height: 52px;
            padding: 16px;
            background: rgba(0, 0, 0, 0.2);
        }
        .demo-card-image__filename {
            color: #fff;
            font-size: 14px;
            font-weight: 500;
        }
    </style>

    <div class="demo-card-image mdl-card mdl-shadow--2dp">
        <div class="mdl-card__title mdl-card--expand"></div>
        <div class="mdl-card__actions">
            <span class="demo-card-image__filename">Image.jpg</span>
        </div>
    </div>
    <!-- Event card -->
    <style>
        .demo-card-event.mdl-card {
            width: 256px;
            height: 256px;
            background: #3E4EB8;
        }
        .demo-card-event > .mdl-card__actions {
            border-color: rgba(255, 255, 255, 0.2);
        }
        .demo-card-event > .mdl-card__title {
            align-items: flex-start;
        }
        .demo-card-event > .mdl-card__title > h4 {
            margin-top: 0;
        }
        .demo-card-event > .mdl-card__actions {
            display: flex;
            box-sizing:border-box;
            align-items: center;
        }
        .demo-card-event > .mdl-card__actions > .material-icons {
            padding-right: 10px;
        }
        .demo-card-event > .mdl-card__title,
        .demo-card-event > .mdl-card__actions,
        .demo-card-event > .mdl-card__actions > .mdl-button {
            color: #fff;
        }
    </style>

    <div class="demo-card-event mdl-card mdl-shadow--2dp">
        <div class="mdl-card__title mdl-card--expand">
            <h4>
                Featured event:<br>
                May 24, 2016<br>
                7-11pm
            </h4>
        </div>
        <div class="mdl-card__actions mdl-card--border">
            <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                Add to Calendar
            </a>
            <div class="mdl-layout-spacer"></div>
            <i class="material-icons">event</i>
        </div>
    </div>
{% endblock %}