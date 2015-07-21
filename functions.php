<?php

/*
 * Hide admin bar on site front-end.
 */

show_admin_bar( false );

/*
 * Register theme for thumbnails.
 */

add_theme_support( 'post-thumbnails' );

/*
 * Parse purchase_link variable to make sure it has 'http' prefix.
 */

function echo_purchase_link( $post_id, $class) {
	$purchase_link = get_field('purchase_link', $post_id );

	if ( $purchase_link ) :
		echo '<a href="';
		if ( strpos( $purchase_link, 'http' ) !== false ) :
			echo $purchase_link;
		else :
			echo 'http://' . $purchase_link;
		endif;
		echo '" class="' . $class . '" target="_blank">Buy</a>';
	endif;
}

?>