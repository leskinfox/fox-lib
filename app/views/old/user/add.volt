{% extends "templates/main.volt" %}
{% block content %}
    <main class="mdl-layout__content mdl-color--grey-100">
        <div class="user-form">
            <h5>
                Добавление книги
            </h5>
            <div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label wide-input">
                    <input class="mdl-textfield__input wide-input" type="text" id="name" pattern="[A-Z,a-z, ]*">
                    <label class="mdl-textfield__label wide-input" for="name">Название...</label>
                    <span class="mdl-textfield__error wide-input">Letters and spaces only</span>
                </div>
            </div>
            <div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="text" id="author" pattern="[A-Z,a-z, ]*">
                    <label class="mdl-textfield__label" for="author">Автор...</label>
                    <span class="mdl-textfield__error">Letters and spaces only</span>
                </div>
            </div>
            <div>
                <div class="mdl-textfield mdl-js-textfield">
                    <textarea class="mdl-textfield__input" type="text" rows="10" id="about"></textarea>
                    <label class="mdl-textfield__label" for="about">Описание книги</label>
                </div>
            </div>
            <div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="text" id="url">
                    <label class="mdl-textfield__label" for="url">Адрес обложки...</label>
                </div>
            </div>
            <button type="button" class="mdl-button mdl-js-button">Найти описание и обложку</button>

            <div align="right">
                <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">Добавить</button>
            </div>
        </div>
    </main>
{% endblock %}