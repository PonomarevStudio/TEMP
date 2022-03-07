<header>
    <input class="hide" id="headerMenuState" onchange="document.body.classList.toggle('disable-scroll', this.checked)"
           type="checkbox">
    <label class="header-button open-menu-button hide-on-desktop" for="headerMenuState" title="Открыть меню"></label>
    <a class="logo" href="/">
        <img alt="ЖК Темп" height="41" loading="eager"
             src="<?php bloginfo( 'template_url' ); ?>/assets/images/logo.svg">
    </a>
    <div class="menu hide-on-mobile">
        <nav>
            <label class="sub-menu">
                <input class="hide" type="checkbox">
                <span class="label">Описание ЖК</span>
                <div class="content">
                    <a href="overview.html">Обзор ЖК</a>
                    <a href="apartments.html">Квартиры</a>
                    <a href="infrastructure.html">Инфраструктура</a>
                    <a href="space.html">Дворы и общественное пространство</a>
                </div>
            </label>
            <a href="plans.html">Планировки</a>
            <a href="buy.html">Как купить</a>
            <a href="contacts.html">Контакты</a>
        </nav>
        <a class="open-widget-button hide-on-desktop" href="overview.html">Выбрать квартиру</a>
        <label for="headerMenuState" class="close-menu-layer hide-on-desktop" title="Закрыть меню"></label>
    </div>
    <a class="header-button call-phone-button" href="tel:+7 (343) 288 55 66"><span
                class="hide-on-mobile">+7 (343) 288 55 66</span></a>
    <a class="open-widget-button hide-on-mobile" href="overview.html">Выбрать<br>квартиру</a>
</header>