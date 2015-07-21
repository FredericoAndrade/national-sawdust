<?php
	get_header();

	$feature_one = get_field( 'first_feature_post' );
	$feature_one_id = $feature_one->ID;
	$feature_one_permalink = get_permalink( $feature_one_id );
	$feature_one_img = get_the_post_thumbnail( $feature_one_id, 'large' );
	$feature_one_name = get_the_title( $feature_one_id );
	$feature_one_preview = get_field( 'preview_text', $feature_one_id );
	$feature_one_date = new DateTime( get_field( 'event_date', $feature_one_id ) );

	$feature_two = get_field( 'second_feature_post' );
	$feature_two_id = $feature_two->ID;
	$feature_two_permalink = get_permalink( $feature_two_id );
	$feature_two_img = get_the_post_thumbnail( $feature_two_id, 'large' );
	$feature_two_name = get_the_title( $feature_two_id );
	$feature_two_preview = get_field( 'preview_text', $feature_two_id );
	$feature_two_date = new DateTime( get_field( 'event_date', $feature_two_id ) );

	$feature_three = get_field( 'third_feature_post' );
	$feature_three_id = $feature_three->ID;
	$feature_three_permalink = get_permalink( $feature_three_id );
	$feature_three_img = get_the_post_thumbnail( $feature_three_id, 'large' );
	$feature_three_name = get_the_title( $feature_three_id );
	$feature_three_preview = get_field( 'preview_text', $feature_three_id );
	$feature_three_date = new DateTime( get_field( 'event_date', $feature_three_id ) );

	$events_feed = get_category_by_slug( 'homepage-feed' )->term_id;
	$events_args = array( 'category' => $events_feed, 'posts_per_page' => '-1' );
	$events_feed_posts = get_posts( $events_args );
	?>
	<div class="featured-posts">
		<div class="primary-feature left">
			<!-- link to event -->
			<a href="<?php echo $feature_one_permalink; ?>">
				<div class="primary-hero">
					<?php echo $feature_one_img; ?>
				</div>
			</a>
			<!-- content of link plus purchase link -->
			<div class="primary-meta">
				<?php echo $feature_one_name; ?>
				<?php echo $feature_one_preview; ?>
				<?php echo $feature_one_date->format('d/m/Y'); ?>
				<?php echo_purchase_link( $feature_one_id ); ?>
			</div>
		</div>
		<div class="secondary-features">
			<ul>
				<li>
					<a href="<?php echo $feature_two_permalink; ?>">
						<div class="secondary-hero">
							<?php echo $feature_two_img; ?>
						</div>
					</a>
					<p class="thumb-title"><?php echo $feature_two_name; ?></p>
					<p class="thumb-meta">
						<div class="thumb-date left">
							<?php echo $feature_two_date->format('d/m/Y'); ?>
						</div>
						<div class="thumb-purchase left">
							<?php echo_purchase_link( $feature_two_id ); ?>
						</div>
						<div class="clear"></div>
					</p>
				</li>
				<li>
					<a href="<?php echo $feature_three_permalink; ?>">
						<div class="secondary-hero">
							<?php echo $feature_three_img; ?>
						</div>
					</a>
					<p class="thumb-title"><?php echo $feature_three_name; ?></p>
					<p class="thumb-meta">
						<div class="thumb-date left">
							<?php echo $feature_three_date->format('d/m/Y'); ?>
						</div>
						<div class="thumb-purchase left">
							<?php echo_purchase_link( $feature_three_id ); ?>
						</div>
						<div class="clear"></div>
					</p>
				</li>
			</ul>
		</div>
	</div>
    <div class="events-feed">
		<h1>Other events (TITLE?)</h1>
		<ul>
    	<?php foreach( $events_feed_posts as $post ) : setup_postdata( $post ); ?>
			<li>
			<!-- markup to be considered here -->
				<a href="<?php the_permalink(); ?>">
					<?php the_title(); ?>
					<?php echo get_field( 'purchase_link' ); ?>
					<?php the_date( 'd/m/Y' ); ?>
				</a>
			</li>
    	<?php endforeach; wp_reset_postdata(); ?>
	    </ul>
    </div>

<?php get_footer(); ?>