<main class="plans-container">
    <div class="plans-header hide-on-desktop">
        <span class="title">Планировки квартир</span>
        <div class="plans-switcher-section">Выбрать:
            <select id="plans-switcher">
                <option selected disabled>Тип квартир</option>
                <option value="studios">Студии</option>
                <option value="1rooms">1-к квартиры</option>
                <option value="2rooms">2-к квартиры</option>
                <option value="3rooms">3-к квартиры</option>
                <option value="4rooms">4-к квартиры</option>
            </select>
        </div>
    </div>
    <article class="single" id="studios">
        <h2 class="hide-on-mobile">Студии</h2>
        <div class="wrapper">
            <div class="variants">
                <div class="variant">
                    <div class="title" style="--left-margin: -100">
                        <p>Студия.</p>
                        <p>Площадь — 37,87 кв. м.</p>
                    </div>
                    <img alt="Студия — 37,87 кв. м." src="/images/plans/plan.1.svg">
                </div>
            </div>
            <div class="content">
                Компактная студия позволит вместить все необходимое благодаря продуманной планировке и выделенными
                местами под хранение. Студии представлены с теплыми лоджиями, где можно обустроить зону для работы или
                фитнеса, и палисадниками, которые станут приватным пространством для отдыха и встреч с друзьями.
            </div>
        </div>
        <a onclick="pb_front_widget.show({url: 'plans?filter=property.status:AVAILABLE&filter=property.roomType.isStudio:true'});">Каталог
            квартир</a>
    </article>
    <article id="1rooms">
        <h2 class="hide-on-mobile">1-комнатные квартиры</h2>
        <div class="wrapper">
            <div class="variants">
                <div class="variant">
                    <div class="title">
                        <p>Вариант 1.</p>
                        <p>Площадь - 51,32 кв. м.</p>
                    </div>
                    <img alt="1-комнатные квартира - 51,32 кв. м."
                         src="/images/plans/plan.2.1.svg">
                </div>
                <div class="variant">
                    <div class="title">
                        <p>Вариант 2.</p>
                        <p>Площадь - 46,64 кв. м.</p>
                    </div>
                    <img alt="1-комнатные квартира - 46,64 кв. м."
                         src="/images/plans/plan.2.2.svg">
                </div>
            </div>
            <div class="content">
                Пространство квартиры используется эффективно: большая кухня-гостиная легко делится на обеденную зону и
                место для отдыха и приема гостей, а выделенная гардеробная позволит не перегружать комнаты шкафами.
            </div>
        </div>
        <a onclick="pb_front_widget.show({url:'?filter=property.status:AVAILABLE&filter=property.count:1'});">Каталог
            квартир</a>
    </article>
    <article class="column" id="2rooms">
        <h2 class="hide-on-mobile">2-комнатные квартиры</h2>
        <div class="wrapper">
            <div class="variants">
                <div class="variant">
                    <div class="title">
                        <p>Вариант 1.</p>
                        <p>Площадь — 75,21 кв. м.</p>
                    </div>
                    <img alt="2-комнатные квартира — 75,21 кв. м."
                         src="/images/plans/plan.3.1.jpg">
                </div>
                <div class="variant">
                    <div class="title" style="--left-margin: -217">
                        <p>Вариант 2.</p>
                        <p>Площадь — 68,69 кв. м.</p>
                    </div>
                    <img alt="2-комнатные квартира — 68,69 кв. м."
                         src="/images/plans/plan.3.2.svg">
                </div>
            </div>
            <div class="content" style="--left-margin: -217">
                Пространство квартир можно условно поделить две зоны: приватную и гостевую.
                В зоне хозяев — спальня, детская комната с теплой лоджией и большой санузел.
                В гостевой — кухня с пространством для отдыха и дополнительный санузел для удобства.
                Увеличенная прихожая позволит собираться по делам с комфортом и хранить всю необходимую одежду.
            </div>
        </div>
        <a onclick="pb_front_widget.show({url:'?filter=property.status:AVAILABLE&filter=property.count:2'});">Каталог
            квартир</a>
    </article>
    <article class="single" id="3rooms">
        <h2 class="hide-on-mobile">3-комнатные квартиры</h2>
        <div class="wrapper">
            <div class="variants">
                <div class="variant">
                    <div class="title">
                        <p>3-комнатная квартира</p>
                        <p>Площадь — 92,84 кв. м.</p>
                    </div>
                    <img alt="3-комнатные квартира — 92,84 кв. м."
                         src="/images/plans/plan.4.svg">
                </div>
            </div>
            <div class="content">
                Большая квартира для дружной семьи: три жилые комнаты обеспечат каждому личное пространство, а
                кухня-гостиная станет любимым местом для совместного отдыха.
                <br>
                Для комфорта всех членов семьи предусмотрено два санузла, а выделенная гардеробная освободит
                пространство комнат от шкафов.
            </div>
        </div>
        <a onclick="pb_front_widget.show({url:'?filter=property.status:AVAILABLE&filter=property.count:3'});">Каталог
            квартир</a>
    </article>
    <article class="single" id="4rooms">
        <h2 class="hide-on-mobile">4-комнатные квартиры</h2>
        <div class="wrapper">
            <div class="variants">
                <div class="variant">
                    <div class="title">
                        <p>4-комнатная квартира</p>
                        <p>Площадь — 120,41 кв. м.</p>
                    </div>
                    <img alt="4-комнатные квартира — 120,41 кв. м."
                         src="/images/plans/plan.5.svg">
                </div>
            </div>
            <div class="content">
                Эксклюзивные планировки для больших семей.
                В ЖК «Темп» представлено всего 12 квартир с четырьмя спальнями.
                <br>
                Планировка отличается продуманностью и функциональностью помещений.
                Окна спален выходят на две стороны, обеспечивая максимальное количество дневного света в квартире.
                <br>
                В большой ванной комнате площадью 6м2 можно разместить все необходимое.
                Планировочное решение позволяет организовать мастер-спальню с собственным санузлом.
                <br>
                В выделенной гардеробной поместятся вещи всех членов семьи и их гостей.
            </div>
        </div>
        <a onclick="pb_front_widget.show({url:'?filter=property.status:AVAILABLE&filter=property.maxCount:4'});">Каталог
            квартир</a>
    </article>
</main>