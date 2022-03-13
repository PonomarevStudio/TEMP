<?php
$title        = get_post_custom_values( 'hero_title' )[0] ?? get_the_title();
$description  = get_post_custom_values( 'hero_description' )[0];
$image        = get_post_custom_values( 'hero_image' )[0] ?? get_the_post_thumbnail_url( null, 'full' );
$mobile_image = get_post_custom_values( 'hero_image_mobile' )[0];
?>
<?= temp_get_style_link( '/assets/css/hero.css' ) ?>
<hero-slider class="hero">
    <div class="content fixed-padding">
        <h1><?= $title ?></h1>
		<?php if ( $description ): ?><p data-slider="text"><?= $description ?></p><?php endif; ?>
    </div>
    <picture>
        <source media="(max-width: 1023px) and (orientation: portrait)" data-slider="img_mobile"
                srcset="<?= $mobile_image ? esc_url( $mobile_image ) : '' ?>">
        <img alt="<?= esc_html( $title ) ?>" data-slider="img" loading="eager" src="<?= esc_url( $image ) ?>">
    </picture>
    <div class="navigation">
        <button></button>
        <button></button>
    </div>
</hero-slider>