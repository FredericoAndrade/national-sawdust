<form class="search" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
	<input type="text" name="s" id="search" placeholder="Search for events by name or tag" value="<?php the_search_query(); ?>" />
</form>