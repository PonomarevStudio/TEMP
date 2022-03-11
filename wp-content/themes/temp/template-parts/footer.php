<?php
$email = get_option( 'site_email' );
$phone = get_option( 'site_phone' );
?>
<?= temp_get_style_link( '/assets/css/footer.css' ) ?>
<a class="float-widget-button" href="<?php bloginfo( 'url' ); ?>/overview">
    <img alt="" loading="eager" src="<?php bloginfo( 'template_url' ); ?>/assets/images/planes.png">
    <span>Планировки и цены</span>
</a>
<footer>
    <a class="logo" href="<?php bloginfo( 'url' ); ?>">
        <img alt="ЖК Темп" src="<?php bloginfo( 'template_url' ); ?>/assets/images/logo.inverted.svg">
    </a>
    <div class="column">
        <nav class="row">
            <div class="row group double">
				<?php
				$menu_content = '';
				$menu_name    = 'footer';
				$locations    = get_nav_menu_locations();
				if ( $locations && isset( $locations[ $menu_name ] ) ) {
					$menu_items  = wp_get_nav_menu_items( $locations[ $menu_name ] );
					$menu_groups = array_chunk( (array) $menu_items, round( count( $menu_items ) / 2 ), true );
					foreach ( $menu_groups as $group => $group_item ) {
						$menu_content .= '<div class="column">';
						foreach ( $group_item as $key => $menu_item ) {
							$menu_content .= '<a href="' . $menu_item->url . '">' . $menu_item->title . '</a>';
						}
						$menu_content .= '</div>';
					}
					echo $menu_content;
				}
				?>
            </div>
            <div class="column bordered group">
                <a class="phone" href="tel:+<?= preg_replace( '/\D+/', '', $phone ) ?>"><?= $phone ?></a>
                <a href="mailto:<?= $email ?>" class="email"><?= $email ?></a>
                <div class="row"></div>
            </div>
        </nav>
        <p class="hide-on-mobile">
            Вся представленная на сайте информация носит информационный характер и ни при каких условиях не является
            публичной офертой, определяемой положениями ст. 437 Гражданского кодекса РФ.Застройщик оставляет за собой
            право
            в любое время вносить какие-либо изменения в данные предложения без предварительного уведомления.
            Покупателям
            необходимо всегда обсуждать конкретные предложения с Застройщиком и закреплять их письменно, особенно если
            Покупатель выбирает объект, исходя из особенностей, предоставленной информации.
            На рендерах представлен эскизный проект жилого квартала.
        </p>
    </div>
</footer>