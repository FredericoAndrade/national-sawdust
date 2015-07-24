<form class="search" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
	<input type="text" name="s" id="search" placeholder="search" value="<?php the_search_query(); ?>" />
</form>