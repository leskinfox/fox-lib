<style>
    .wide {
        width: 500px
    }

    .f {
        width: 600px;
    }

    img {
        max-height: 300px;
    }

</style>

<form action={{ action }} method={{ method }} class="mdl-layout__content mdl-color--grey-100">
    <div class="user-form f">
        <h3>
            {{ title }}
        </h3>
        <h5>
            {{ description }}
        </h5>
        {% for el in elements %}

        {% if el['type']=="input" %}
        <div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label wide">
                <input class="mdl-textfield__input" value="{{ el['value'] }}" name="{{ el['name'] }}" type="text" id="{{ el['name'] }}">
                <label class="mdl-textfield__label" for={{ el['name'] }}>{{ el['label'] }}</label>
            </div>
        </div>

        {% elseif el['type']=="et_input" %}
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label wide">
            <input class="mdl-textfield__input"  value="{{ el['value'] }}" name="{{ el['name'] }}" type="text" id="{{ el['name'] }}" pattern="\+7\d{10}|8\d{10}|\d{10}|\w+@\w+\.\w+">
            <label class="mdl-textfield__label" for="{{ el['name'] }}">{{ el['label'] }}</label>
            <span class="mdl-textfield__error">{{ el['error'] }}</span>
        </div>

        {% elseif el['type']=="multiple_input" %}
        <div>
            <div class="mdl-textfield mdl-js-textfield wide">
                <textarea class="mdl-textfield__input" rows="10" name="{{ el['name'] }}" id="{{ el['name'] }}">{{ el['value'] }}</textarea>
                <label class="mdl-textfield__label" for="{{ el['name'] }}">{{ el['label'] }}</label>
            </div>
        </div>

            {% elseif el['type']=="img" %}
            <div class="wide">
                <img src={{ el['img'] }}>
            </div>

        {% elseif el['type']=="captcha" %}
        <div class="g-recaptcha" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"></div>
        <script src='https://www.google.com/recaptcha/api.js'></script>

        {% elseif el['type']=="button" %}
        <div align="{{ el['align'] }}">
            <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">{{ el['label'] }}</button>
        </div>

         {% elseif el['type']=="qr" %}

              <script type="text/javascript" src="/public/js/instascan.min.js"></script>
              <video id="preview"></video>
              <script type="text/javascript">
                  let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
                  scanner.addListener('scan', function (content) {
                      console.log(content);
                  });
                  Instascan.Camera.getCameras().then(function (cameras) {
                      if (cameras.length > 0) {
                          scanner.start(cameras[0]);
                      } else {
                          console.error('No cameras found.');
                      }
                  }).catch(function (e) {
                      console.error(e);
                  });
              </script>

         {% elseif el['type']=="checkbox" %}

            <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-1">
                <input type="checkbox" id="checkbox-1" name="{{ el['name'] }}" class="mdl-checkbox__input"
                       {%  if el['checked']|default(true) %}
                           checked
                           {% endif %}>
                <span class="mdl-checkbox__label">{{ el['label'] }}</span>
            </label>

         {% elseif el['type']=="radio" %}
            {% for it in el['items'] %}
            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="{{ it['name'] }}">
                <input type="radio" id="{{ it['name'] }}" class="mdl-radio__button" name="radio" value="{{ it['name'] }}"
                {% if el['checked']==it['name'] %} checked {% endif %}>
                <span class="mdl-radio__label">{{ it['label'] }}</span>
            </label>
            {% endfor %}


        {% endif %}
        {% endfor %}
    </div>
</form>
<script src='https://www.google.com/recaptcha/api.js'></script>