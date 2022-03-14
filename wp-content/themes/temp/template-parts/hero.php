<?php
$title        = get_post_custom_values( 'hero_title' )[0] ?? get_the_title();
$description  = get_post_custom_values( 'hero_description' )[0];
$image        = get_post_custom_values( 'hero_image' )[0] ?? get_the_post_thumbnail_url( null, 'full' );
$mobile_image = get_post_custom_values( 'hero_image_mobile' )[0]
?>
<section class="hero">
    <div class="content">
        <h1><?= $title ?></h1>
		<?php if ( $description ): ?><p data-slider="text"><?= $description ?></p><?php endif; ?>
    </div>
    <picture>
		<?php if ( $mobile_image ): ?>
            <source media="(max-width: 1023px) and (orientation: portrait)" srcset="<?= esc_url( $mobile_image ) ?>">
		<?php endif; ?>
        <img alt="<?= esc_html( $title ) ?>" data-slider="img" loading="eager" decoding="async"
             src="<?= esc_url( $image ) ?>">
    </picture>
</section>