<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="theme-color" content="white">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
          name="viewport">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">

    <link rel="icon" href="/favicon.svg" type="image/svg+xml" sizes="any">
    <link rel="mask-icon" href="/favicon.svg" color="#C2A36C">

    <script src="https://unpkg.com/@webcomponents/webcomponentsjs/webcomponents-loader.js"></script>

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<?php
wp_body_open();
get_template_part( 'template-parts/header' );
