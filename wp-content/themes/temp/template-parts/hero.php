<section class="hero">
    <div class="content fixed-padding">
        <h1><?= get_post_custom_values( 'hero_title' )[0] ?? the_title() ?></h1>
        <p data-slider="text"><?php echo get_post_custom_values( 'hero_description' )[0] ?></p>
    </div>
    <img alt="" data-slider="img" loading="eager"
         src="<?= esc_url( get_post_custom_values( 'hero_image' )[0] ?? get_the_post_thumbnail_url( null, 'full' ) ) ?>">
</section>