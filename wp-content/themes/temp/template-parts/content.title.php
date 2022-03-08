<?php

if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); ?>
        <br><br>
        <main class="documentation-text">
            <h1><?= get_post_custom_values( 'hero_title' )[0] ?? the_title() ?></h1>
            <br><br>
			<?php the_content(); ?>
        </main>
		<?php
	}
}