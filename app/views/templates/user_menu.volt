<div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-400 ">
    <header class="demo-drawer-header">
        <img src="/public/img/fox_logo.png" class="demo-avatar">
        <div class="demo-avatar-dropdown">
            <span>{{ user_name }}</span>
            <div class="mdl-layout-spacer"></div>
            <button id="accbtn" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
                <i class="material-icons" role="presentation">arrow_drop_down</i>
                <span class="visuallyhidden">Account</span>
            </button>
            <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="accbtn">
                <a href="/login/exit" class="mdl-menu__item">Выход</a>
            </ul>
        </div>
    </header>

    <nav class="demo-navigation mdl-navigation mdl-color-item--orange-400">
        <a class="mdl-navigation__link" href="/home"><i class="material-icons" role="presentation">home</i>Домой</a>
        <a class="mdl-navigation__link" href="/search/index"><i class="material-icons" role="presentation">search</i>Найти книгу</a>
        <a class="mdl-navigation__link" href="/gift"><i class="material-icons" role="presentation">card_giftcard</i>Подарить книгу</a>
        <a class="mdl-navigation__link" href="/feedback"><i class="material-icons" role="presentation">supervisor_account</i>Обратная связь</a>
        <a class="mdl-navigation__link" href="/history"><i class="material-icons" role="presentation">history</i>Мои заказы</a>
    </nav>
</div>