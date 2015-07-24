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

function echo_members_link( $post_id, $class) {
	$member_link = get_field('member_purchase_link', $post_id );

	if ( $member_link ) :
		echo '<a href="';
		if ( strpos( $member_link, 'http' ) !== false ) :
			echo $member_link;
		else :
			echo 'http://' . $member_link;
		endif;
		echo '" class="' . $class . '" target="_blank">Members</a>';
	endif;
}

/*
 * Parse purchase_link variable to make sure it has 'http' prefix.
 */

function echo_time( $post_id ) {
	$event_time = get_field( 'event_time', $post_id );

	if ( $event_time ) :

		echo $event_time;

	endif;

}

?>