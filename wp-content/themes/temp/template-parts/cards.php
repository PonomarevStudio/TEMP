<?php

if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); ?>
        <main class="cards">
			<?php the_content(); ?>
        </main>
		<?php
		edit_post_link( null, '<br><br>' );
	}
}