<?php $description = get_post_custom_values( 'hero_description' )[0] ?>
<hero-slider class="hero">
    <div class="content fixed-padding">
        <h1><?= get_post_custom_values( 'hero_title' )[0] ?? the_title() ?></h1>
		<?php if ( $description ): ?><p data-slider="text"><?= $description ?></p><?php endif; ?>
    </div>
    <img alt="" data-slider="img" loading="eager"
         src="<?= esc_url( get_post_custom_values( 'hero_image' )[0] ?? get_the_post_thumbnail_url( null, 'full' ) ) ?>">
    <div class="navigation">
        <button></button>
        <button></button>
    </div>
</hero-slider>