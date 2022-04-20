<?php

if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); ?>
        <main class="documentation-text">
			<?php the_content(); ?>
        </main>
		<?php
	}
}