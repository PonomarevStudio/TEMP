<?php
/**
 * Template Name: Произвольный контент с компактной обложкой
 * Template Post Type: post, page
 *
 * @package WordPress
 * @subpackage Temp
 * @since Temp 1.0
 */

get_header();

get_template_part( 'template-parts/hero.compact' );
get_template_part( 'template-parts/content' );

get_footer();