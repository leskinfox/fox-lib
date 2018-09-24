<form action={{ action }} method={{ method }} class="mdl-layout__content mdl-color--grey-100">
    <div class="user-form">
        <h3>
            {{ title }}
        </h3>
        <h5>
            {{ description }}
        </h5>
        {% for el in elements %}

        {% if el['type']=="input" %}
        <div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" value="{{ el['value'] }}" name="{{ el['name'] }}" type="text" id="{{ el['name'] }}">
                <label class="mdl-textfield__label" for={{ el['name'] }}>{{ el['label'] }}</label>
            </div>
        </div>

        {% elseif el['type']=="et_input" %}
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input"  value="{{ el['value'] }}" name="{{ el['name'] }}" type="text" id="{{ el['name'] }}" pattern="\+7\d{10}|8\d{10}|\d{10}|\w+@\w+\.\w+">
            <label class="mdl-textfield__label" for="{{ el['name'] }}">{{ el['label'] }}</label>
            <span class="mdl-textfield__error">{{ el['error'] }}</span>
        </div>

        {% elseif el['type']=="multiple_input" %}
        <div>
            <div class="mdl-textfield mdl-js-textfield">
                <textarea class="mdl-textfield__input" type="text" value="{{ el['value'] }}" rows="10" name="{{ el['name'] }}" id="{{ el['name'] }}"></textarea>
                <label class="mdl-textfield__label" for="{{ el['name'] }}">{{ el['label'] }}</label>
            </div>
        </div>

        {% elseif el['type']=="captcha" %}
        <div class="g-recaptcha" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"></div>
        <script src='https://www.google.com/recaptcha/api.js'></script>

        {% elseif el['type']=="button" %}
        <div align="{{ el['align'] }}">
            <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">{{ el['label'] }}</button>
        </div>

        {% endif %}
        {% endfor %}
    </div>
</form>
<script src='https://www.google.com/recaptcha/api.js'></script>