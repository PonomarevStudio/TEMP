<?php $phone = get_option( 'site_phone' ) ?>
<header>
    <input class="hide" id="headerMenuState" onchange="document.body.classList.toggle('disable-scroll', this.checked)"
           type="checkbox">
    <label class="header-button open-menu-button hide-on-desktop-header" for="headerMenuState"
           title="Открыть меню"></label>
    <a class="logo" href="<?php bloginfo( 'url' ); ?>">
        <img alt="ЖК Темп" height="41" loading="eager" decoding="async"
             src="<?php bloginfo( 'template_url' ); ?>/assets/images/logo.svg">
    </a>
    <div class="menu hide-on-mobile-header">
        <nav>
			<?php
			$menu_name = 'header';
			$locations = get_nav_menu_locations();
			if ( $locations && isset( $locations[ $menu_name ] ) ) {
				$menu_items = wp_get_nav_menu_items( $locations[ $menu_name ] );
				$menu       = [];
				foreach ( (array) $menu_items as $key => $menu_item ) {
					$data = [ 'title' => $menu_item->title, 'url' => $menu_item->url, 'children' => [] ];
					if ( $menu_item->menu_item_parent ) {
						$menu[ $menu_item->menu_item_parent ]['children'][] = $data;
					} else {
						$menu[ $menu_item->ID ] = $data;
					}
				}
				$menu_content = '';
				foreach ( $menu as $key => $menu_item ) {
					if ( count( $menu_item['children'] ) ) {
						$menu_content .= '<label class="sub-menu"><input class="hide" type="checkbox"><span class="label">' . $menu_item['title'] . '</span><div class="content">';
						foreach ( $menu_item['children'] as $sub_key => $submenu_item ) {
							$menu_content .= '<a href="' . $submenu_item['url'] . '">' . $submenu_item['title'] . '</a>';
						}
						$menu_content .= '</div></label>';
					} else {
						$menu_content .= '<a href="' . $menu_item['url'] . '">' . $menu_item['title'] . '</a>';
					}
				}
				echo $menu_content;
			}
			?>
        </nav>
        <a class="open-widget-button hide-on-desktop-header" href="<?php bloginfo( 'url' ); ?>/overview">Выбрать
            квартиру</a>
        <label for="headerMenuState" class="close-menu-layer hide-on-desktop-header" title="Закрыть меню"></label>
    </div>
    <a class="header-button call-phone-button" href="tel:+<?= preg_replace( '/\D+/', '', $phone ) ?>">
        <span class="hide-on-mobile-header"><?= $phone ?></span>
    </a>
    <a class="open-widget-button hide-on-mobile-header" href="<?php bloginfo( 'url' ); ?>/overview">Выбрать<br>квартиру</a>
</header>