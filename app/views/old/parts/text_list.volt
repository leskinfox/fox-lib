
    <style>
        .demo-card-event.mdl-card {
            width: 256px;
            height: 256px;
            background: #fb8c00;
            float: left;
            margin-top: 12px;
            margin-left: 12px;
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

    {% for item in items %}
        <div class="demo-card-event mdl-card mdl-shadow--2dp">
            <div class="mdl-card__title mdl-card--expand">
                <h4>
                    {{ item['text'] }}
                </h4>
            </div>
            <div class="mdl-card__actions mdl-card--border">
                <a>
                    {{ item['subtext'] }}
                </a>

                <div class="mdl-layout-spacer"></div>
                <a href="{{ item['link'] }}" class="material-icons">{{ item['button'] }}</a>
            </div>
        </div>
    {% endfor %}
