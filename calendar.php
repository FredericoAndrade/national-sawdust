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

<div class="calendar page">

	<h1 class="section-title"><?php echo date( 'F, Y' ); ?></h1>

	<h3 class="title">Upcoming Events</h3>

	<?php if ( $upcoming_calendar_posts->have_posts() ) : ?>
		<ul class="posts">
			<?php  
				while ( $upcoming_calendar_posts->have_posts() ) : $upcoming_calendar_posts->the_post(); 
				$event_thumbnail = wp_get_attachment_image_src(  get_post_thumbnail_id( get_the_ID() ), 'single-post-thumbnail' ); 
				$post_categories = get_the_category( get_the_ID() ); ?>
			<li style="background:url('<?php echo $event_thumbnail[0]; ?>');" class="related-post <?php if( has_post_thumbnail() ) : ?>has-image <?php else : ?> no-image <?php endif; foreach ($post_categories as $category) : $category_name = $category->slug; echo $category_name . ' '; endforeach; ?>">
				<a class="event-link" href="<?php the_permalink(); ?>">
					<h1><?php the_title(); ?></h1>
					<p class="thumb-date">
						<?php $date = new DateTime( get_field('event_date') ); echo $date->format('d F, Y'); ?><br>
						<?php echo_time( get_the_ID() ); ?>
					</p>
				</a>
				<ul>
				<?php foreach ( $post_categories as $category ) : ?>
					<li><a href="<?php echo get_category_link( $category->term_id ); ?>"><?php echo $category->slug; ?></a></li>
				<?php endforeach; ?>
				</ul>	
				<section class="buy-links">
					<?php echo_purchase_link( get_the_ID(), 'buy-link' ); ?>
					<?php echo_members_link( get_the_ID(), 'members-link' ); ?>
				</section>
			</li>
			<?php endwhile; ?>
		</ul>
	<?php endif; wp_reset_postdata(); ?>

	<?php
		$past_calendar_posts = new WP_Query( $args_past );
		if ( $past_calendar_posts->have_posts() ) : ?>

		<h3 class="title">Past Events</h3>
		<ul class="posts">
			<?php 
				while ( $past_calendar_posts->have_posts() ) : $past_calendar_posts->the_post();
				$event_thumbnail = wp_get_attachment_image_src(  get_post_thumbnail_id( get_the_ID() ), 'single-post-thumbnail' ); 
				$post_categories = get_the_category( get_the_ID() ); ?>
			<li style="background:url('<?php echo $event_thumbnail[0]; ?>');" class="related-post <?php if( has_post_thumbnail() ) : ?>has-image <?php else : ?> no-image <?php endif; foreach ($post_categories as $category) : $category_name = $category->slug; echo $category_name . ' '; endforeach; ?>">
				<a class="event-link" href="<?php the_permalink(); ?>">
					<h1><?php the_title(); ?></h1>
					<p class="thumb-date">
						<?php $date = new DateTime( get_field('event_date') ); echo $date->format('d F, Y'); ?><br>
						<?php echo_time( get_the_ID() ); ?>
					</p>
				</a>
				<ul>
				<?php foreach ( $post_categories as $category ) : ?>
					<li><a href="<?php echo get_category_link( $category->term_id ); ?>"><?php echo $category->slug; ?></a></li>
				<?php endforeach; ?>
				</ul>	
				<section class="buy-links">
					<?php echo_purchase_link( get_the_ID(), 'buy-link' ); ?>
					<?php echo_members_link( get_the_ID(), 'members-link' ); ?>
				</section>
			</li>
			<?php endwhile; ?>
		</ul>
	<?php endif; wp_reset_postdata(); ?>
</div>

<?php get_footer(); ?>