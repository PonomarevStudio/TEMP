<section class="form">
    <img alt="Форма обратной связи" loading="lazy" decoding="async" src="<?= get_theme_mod( 'feedback_form_image' ) ?>">
    <div class="content">
        <h2>Остались вопросы?</h2>
        <hr>
        <p>Напишите нам</p>
        <form action="/">
            <input name="name" placeholder="Как к вам обращаться ?" required>
            <input name="phone" placeholder="Телефон" required type="tel">
            <input name="email" placeholder="E-mail" required type="email">
            <p>Какой тип недвижимости интересует ?</p>
            <div class="line">
                <label class="line"><input checked name="type" type="radio" value="live"> Жилая</label>
                <label class="line"><input name="type" type="radio" value="commercial"> Коммерческая</label>
            </div>
            <textarea name="question" placeholder="Ваш вопрос" required></textarea>
            <label class="policy"><input checked name="policy" required type="checkbox">
                Согласен на обработку персональных данных. <a href="#">Политика конфиденциальности</a>
            </label>
            <button type="submit">Отправить заявку</button>
        </form>
    </div>
</section>