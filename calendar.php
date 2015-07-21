<?php 
	/*
	 * Template name: Calendar
	 */

	get_header();

	$current_month = date( 'm' );
	$current_year = date( 'Y' );
	
	$args = array( 
		//'date_query' => array(	array( 'year' => $year, ), ),
		'meta_key' => 'event_date',
		'meta_value' => '20150721',
		'posts_per_page' => -1 );
	$calendar_posts = new WP_Query( $args ); 

	?>

<h1>Showing Posts for <?php echo date('F'); ?></h1>

<?php if ( $calendar_posts->have_posts() ) : while ( $calendar_posts->have_posts() ) : $calendar_posts->the_post(); ?>

<?php	//$event_date = new DateTime( get_field( 'event_date', get_the_ID() ) ); ?>

	<a href="<?php the_permalink(); ?>">
		<h1><?php the_title(); ?></h1>
		<p><?php // echo $event_date->format('d/m/Y'); ?></p>
	</a>	

<?php endwhile; endif; wp_reset_postdata(); ?>

<?php get_footer(); ?>