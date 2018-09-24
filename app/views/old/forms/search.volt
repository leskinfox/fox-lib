<form action="/search/result" method="get" class="mdl-layout__content mdl-color--grey-100">
    <div class="user-form">
        <h5>
            Найти книгу
        </h5>
        <div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" name="name" type="text" id="name">
                <label class="mdl-textfield__label" for="name">Название</label>
            </div>
        </div>
        <div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" name="author" type="text" id="author">
                <label class="mdl-textfield__label" for="author">Автор</label>
            </div>
        </div>
        <div align="right">
            <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">Найти</button>
        </div>
    </div>
</form>