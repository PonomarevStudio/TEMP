<?= temp_get_style_link( '/assets/css/cards.css' ) ?>
<?php
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); ?>
        <main class="cards">
			<?php the_content(); ?>
        </main>
		<?php
	}
}