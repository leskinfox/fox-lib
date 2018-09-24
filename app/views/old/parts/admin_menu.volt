<div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-400 ">
    <header class="demo-drawer-header">
        <img src="/public/img/fox_logo.png" class="demo-avatar">
        <div class="demo-avatar-dropdown">
            <span>Имя пользователя</span>
            <div class="mdl-layout-spacer"></div>
            <button id="accbtn" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
                <i class="material-icons" role="presentation">arrow_drop_down</i>
                <span class="visuallyhidden">Account</span>
            </button>
            <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="accbtn">
                <li class="mdl-menu__item">Выход</li>
            </ul>
        </div>
    </header>

    <nav class="demo-navigation mdl-navigation mdl-color-item--orange-400">
        <a class="mdl-navigation__link" href="/admin/home"><i class="material-icons" role="presentation">home</i>Домой</a>
        <a class="mdl-navigation__link" href="/search/index"><i class="material-icons" role="presentation">search</i>Найти книгу</a>
        <a class="mdl-navigation__link" href="/admin/orders"><i class="material-icons" role="presentation">supervisor_account</i>Заказы</a>
        <a class="mdl-navigation__link" href="/admin/gifts"><i class="material-icons" role="presentation">card_giftcard</i>Подарки</a>
    </nav>
</div>