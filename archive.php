<?php 
	/*
	 * Template name: Calendar
	 */

	get_header();

	date_default_timezone_set('America/New_York');
	
	$current_date = date('Ymd');
	$yesterday = date('Ymd', time() - 60 * 60 * 24);
	$current_month = date( 'm' );
	$month_end = date('Ymt');
	$month_start = date('Ym'.'01');
	$args_future = array( 
		'meta_query' => array(
		    array(
				'key'      => 'event_date',
				'compare'  => 'BETWEEN',
				'value' => array( date( $current_date ), date( $month_end ) ),
				'type' => 'DATE'
		    ),    
		 ),
		'posts_per_page' => -1 );
	$args_past = array(
		'meta_query' => array(
			array(
				'key' => 'event_date',
				'compare' => 'BETWEEN',
				'value' => array( date( $month_start ), date( $yesterday ) ),
				'type' => 'DATE'
			),
		),
		'post_per_age' => -1 );
	
	$upcoming_calendar_posts = new WP_Query( $args_future ); ?>

<h1>Showing Posts for <?php echo date( 'F' ); ?></h1>

<h3>Upcoming Events</h3>

<?php if ( $upcoming_calendar_posts->have_posts() ) : ?>
	<ul>
		<?php  while ( $upcoming_calendar_posts->have_posts() ) : $upcoming_calendar_posts->the_post(); ?>
		<!-- markup to be considered here-->
		<li>
			<!-- link to post -->
			<a href="<?php the_permalink(); ?>"></a>
			<!-- thumbnail elements -->
			<?php the_title(); ?>
			<?php the_post_thumbnail( 'large', array( 'class' => 'event-thumb' ) ); ?>
			<?php the_date('m/d/Y'); ?>
			<?php echo_purchase_link( get_the_ID(), 'purchase-link' ); ?>			
		</li>
		<?php endwhile; ?>
	</ul>
	<?php endif; wp_reset_postdata(); ?>

<h3>Past Events</h3>

<?php 
	$past_calendar_posts = new WP_Query( $args_past );
	if ( $past_calendar_posts->have_posts() ) : ?>
	<ul>
		<?php while ( $past_calendar_posts->have_posts() ) : $past_calendar_posts->the_post(); ?>
		<!-- markup to be considered here-->
		<li>
			<!-- link to post -->
			<a href="<?php the_permalink(); ?>"></a>
			<!-- thumbnail elements -->
			<?php the_title(); ?>
			<?php the_post_thumbnail( 'large', array( 'class' => 'event-thumb' ) ); ?>
			<?php the_date('m/d/Y'); ?>
			<?php echo_purchase_link( get_the_ID(), 'purchase-link' ); ?>			
		</li>	
		<?php endwhile; ?>
	</ul>
	<?php endif; wp_reset_postdata(); ?>

<?php get_footer(); ?>