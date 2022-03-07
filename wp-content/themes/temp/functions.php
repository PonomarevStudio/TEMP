<?php

add_theme_support( 'title-tag' );
add_theme_support( 'align-wide' );
add_theme_support( 'post-thumbnails' );
add_action( 'wp_enqueue_scripts', 'temp_register_styles' );
add_action( 'wp_enqueue_scripts', 'temp_register_scripts' );
add_action( 'get_template_part_template-parts/hero.slider', 'temp_hero_slider_scripts' );

function temp_register_styles() {
	wp_enqueue_style( 'temp-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );
}

function temp_register_scripts() {
	wp_enqueue_script( 'temp-integrations', get_template_directory_uri() . '/assets/js/integrations.mjs', array(), wp_get_theme()->get( 'Version' ) );
	if ( is_home() ) {
		wp_enqueue_script( 'temp-offers', get_template_directory_uri() . '/assets/js/offers.mjs', array(), wp_get_theme()->get( 'Version' ) );
		wp_enqueue_script( 'temp-scroll', get_template_directory_uri() . '/assets/js/scroll.mjs', array(), wp_get_theme()->get( 'Version' ) );
	}
}

function temp_hero_slider_scripts() {
	wp_enqueue_script( 'temp-hero', get_template_directory_uri() . '/assets/js/hero.mjs', array(), wp_get_theme()->get( 'Version' ) );
}