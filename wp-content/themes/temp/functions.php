<?php

add_theme_support( 'title-tag' );
add_theme_support( 'align-wide' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'html5', 'script' );
add_action( 'init', 'temp_register_menus' );
add_action( 'wp_head', 'temp_no_js_class' );
add_action( 'wp_enqueue_scripts', 'temp_register_styles' );
add_action( 'wp_enqueue_scripts', 'temp_register_scripts' );
add_action( 'customize_register', 'temp_customize_register' );
add_action( 'get_template_part_template-parts/plans', 'temp_profitbase_scripts' );
add_action( 'get_template_part_template-parts/plans', 'temp_plans_switcher_script' );
add_action( 'get_template_part_template-parts/overview', 'temp_profitbase_scripts' );
add_action( 'get_template_part_template-parts/overview', 'temp_plans_offers_script' );
add_action( 'get_template_part_template-parts/hero.slider', 'temp_hero_slider_script' );
add_action( 'get_template_part_template-parts/plans.slider', 'temp_plans_offers_script' );
add_action( 'get_template_part_template-parts/plans.slider', 'temp_plans_scroll_script' );
add_filter( 'script_loader_tag', 'temp_add_async_attribute', 10, 2 );

function temp_no_js_class() {
	?>
    <script>document.documentElement.className = document.documentElement.className.replace('no-js', 'js');</script>
	<?php
}

function temp_get_style_link( $path ) {
	$url = get_stylesheet_directory_uri() . $path . '?ver=' . wp_get_theme()->get( 'Version' );

	return '<link href="' . $url . '" rel="stylesheet" property="stylesheet">';
}

function temp_register_styles() {
	// wp_enqueue_style( 'temp-base-styles', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );
}

function temp_register_scripts() {
	// wp_enqueue_script( 'temp-integrations', get_template_directory_uri() . '/assets/js/integrations.mjs', array(), wp_get_theme()->get( 'Version' ), true );
}

function temp_profitbase_scripts() {
	wp_enqueue_script( 'temp-profitbase', get_template_directory_uri() . '/assets/js/profitbase.mjs', array(), wp_get_theme()->get( 'Version' ), true );
}

function temp_hero_slider_script() {
	wp_enqueue_script( 'temp-hero', get_template_directory_uri() . '/assets/js/hero.mjs', array(), wp_get_theme()->get( 'Version' ) );
}

function temp_plans_switcher_script() {
	wp_enqueue_script( 'temp-plans', get_template_directory_uri() . '/assets/js/plans.mjs', array(), wp_get_theme()->get( 'Version' ) );
}

function temp_plans_offers_script() {
	wp_enqueue_script( 'temp-offers', get_template_directory_uri() . '/assets/js/offers.mjs', array(), wp_get_theme()->get( 'Version' ) );
}

function temp_plans_scroll_script() {
	wp_enqueue_script( 'temp-scroll', get_template_directory_uri() . '/assets/js/scroll.mjs', array(), wp_get_theme()->get( 'Version' ) );
}

function temp_add_async_attribute( $tag, $handle ) {
	$handles = array(
		'temp-integrations',
		'temp-hero',
		'temp-plans',
		'temp-offers',
		'temp-scroll',
	);
	foreach ( $handles as $defer_script ) {
		if ( $defer_script === $handle ) {
			return str_replace( ' src', ' async="async" src', $tag );
		}
	}

	return $tag;
}

function temp_register_menus() {
	register_nav_menus( array(
		'header' => __( 'Верхнее меню' ),
		'footer' => __( 'Нижнее меню' )
	) );
}

function temp_customize_register( $wp_customize ) {
	$wp_customize->add_section(
		'data_contacts_section',
		array(
			'title'       => 'Контакты на сайте',
			'capability'  => 'edit_theme_options',
			'description' => "Настраивайте номер телефона и email в верхнем и нижнем меню сайта"
		)
	);
	$wp_customize->add_setting( 'site_email', array( 'default' => 'info@domtemp.life', 'type' => 'option' ) );
	$wp_customize->add_control(
		'email',
		array(
			'type'     => 'email',
			'label'    => "Email",
			'section'  => 'data_contacts_section',
			'settings' => 'site_email'
		)
	);
	$wp_customize->add_setting( 'site_phone', array( 'default' => '+7 (343) 288 55 66', 'type' => 'option' ) );
	$wp_customize->add_control(
		'text',
		array(
			'type'        => 'text',
			'label'       => "Номер телефона",
			'description' => "В формате +7 (999) 999 99 99",
			'section'     => 'data_contacts_section',
			'settings'    => 'site_phone'
		)
	);

	$wp_customize->add_section( 'data_feedback_form_section',
		array( 'title' => 'Форма обратной связи', 'capability' => 'edit_theme_options', ) );
	$wp_customize->add_setting( 'feedback_form_image', array(
		'default' => get_bloginfo( 'template_url' ) . '/assets/images/form.1.jpg',
		'type'    => 'theme_mod'
	) );
	$wp_customize->add_control(
		new WP_Customize_Image_Control( $wp_customize, 'feedback_form_image', [
			'label'    => 'Изображение рядом с формой обратной связи',
			'settings' => 'feedback_form_image',
			'section'  => 'data_feedback_form_section'
		] )
	);
}