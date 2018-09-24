
<form action="/user/send_feedback" method="post" class="mdl-layout__content mdl-color--grey-100">
    <div class="user-form">
        <h5>
            Обратная связь
        </h5>
        <div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" value={{ name }} name="name" type="text" id="name">
                <label class="mdl-textfield__label" for="name">Имя</label>
            </div>
        </div>
        <div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" value={{ contact }} name="contact" type="text" id="contact">
                <label class="mdl-textfield__label" for="contact">Контакт</label>
            </div>
        </div>
        <div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" name="subject" type="text" id="subject">
                <label class="mdl-textfield__label" for="subject">Тема</label>
            </div>
        </div>
        <div>
            <div class="mdl-textfield mdl-js-textfield">
                <textarea class="mdl-textfield__input" type="text" rows="10" name="message" id="message"></textarea>
                <label class="mdl-textfield__label" for="message">Сообщение</label>
            </div>
        </div>
        <div class="g-recaptcha" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"></div>
        <div align="right">
            <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">Отправить</button>
        </div>

    </div>
</form>
<script src='https://www.google.com/recaptcha/api.js'></script>