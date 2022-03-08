<?php

add_theme_support( 'title-tag' );
add_theme_support( 'align-wide' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'html5', 'script' );
add_action( 'init', 'temp_register_menus' );
add_action( 'wp_enqueue_scripts', 'temp_register_styles' );
add_action( 'wp_enqueue_scripts', 'temp_register_scripts' );
add_action( 'get_template_part_template-parts/plans', 'temp_plans_switcher_script' );
add_action( 'get_template_part_template-parts/overview', 'temp_profitbase_scripts' );
add_action( 'get_template_part_template-parts/overview', 'temp_plans_offers_script' );
add_action( 'get_template_part_template-parts/hero.slider', 'temp_hero_slider_script' );
add_action( 'get_template_part_template-parts/plans.slider', 'temp_plans_offers_script' );
add_action( 'get_template_part_template-parts/plans.slider', 'temp_plans_scroll_script' );
add_filter( 'script_loader_tag', 'temp_add_async_attribute', 10, 2 );

function temp_register_styles() {
	wp_enqueue_style( 'temp-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );
}

function temp_register_scripts() {
	wp_enqueue_script( 'temp-integrations', get_template_directory_uri() . '/assets/js/integrations.mjs', array(), wp_get_theme()->get( 'Version' ), true );
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