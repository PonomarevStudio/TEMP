<?php
/**
 * Template Name: Карточки с обложкой
 * Template Post Type: post, page
 *
 * @package WordPress
 * @subpackage Temp
 * @since Temp 1.0
 */

get_header();

get_template_part( 'template-parts/hero' );
get_template_part( 'template-parts/cards' );

get_footer();