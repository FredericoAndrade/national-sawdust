<?php
	get_header();

	$feature_one = get_field( 'first_feature_post' );
	$feature_one_id = $feature_one->ID;
	$feature_one_permalink = get_permalink( $feature_one_id );
	$feature_one_img_url = wp_get_attachment_image_src(  get_post_thumbnail_id( $feature_one_id ), 'single-post-thumbnail' );
	$feature_one_img = get_the_post_thumbnail( $feature_one_id, 'large' );
	$feature_one_name = get_the_title( $feature_one_id );
	$feature_one_preview = get_field( 'preview_text', $feature_one_id );
	$feature_one_date = new DateTime( get_field( 'event_date', $feature_one_id ) );

	$feature_two = get_field( 'second_feature_post' );
	$feature_two_id = $feature_two->ID;
	$feature_two_permalink = get_permalink( $feature_two_id );
	$feature_two_img_url = wp_get_attachment_image_src( get_post_thumbnail_id($feature_two_id), 'single-post-thumbnail' );
	$feature_two_img = get_the_post_thumbnail( $feature_two_id, 'large' );
	$feature_two_name = get_the_title( $feature_two_id );
	$feature_two_preview = get_field( 'preview_text', $feature_two_id );
	$feature_two_date = new DateTime( get_field( 'event_date', $feature_two_id ) );

	$feature_three = get_field( 'third_feature_post' );
	$feature_three_id = $feature_three->ID;
	$feature_three_permalink = get_permalink( $feature_three_id );
	$feature_three_img_url = wp_get_attachment_image_src( get_post_thumbnail_id($feature_three_id), 'single-post-thumbnail' );
	$feature_three_img = get_the_post_thumbnail( $feature_three_id, 'large' );
	$feature_three_name = get_the_title( $feature_three_id );
	$feature_three_preview = get_field( 'preview_text', $feature_three_id );
	$feature_three_date = new DateTime( get_field( 'event_date', $feature_three_id ) );

	$events_feed = get_category_by_slug( 'homepage-feed' )->term_id;
	$events_args = array( 'category' => $events_feed, 'posts_per_page' => '-1' );
	$events_feed_posts = get_posts( $events_args );
	?>
	<div class="featured-posts page">
		<div <?php if(has_post_thumbnail( $feature_one_id )) : ?> class="primary feature has-image"<?php else : ?> class="primary feature no-image"  <?php endif; ?> >
			<a class="event-link" <?php if(has_post_thumbnail( $feature_one_id )) : ?>  style="background-image: url('<?php echo $feature_one_img_url[0]; ?>')" <?php endif; ?> href="<?php echo $feature_one_permalink;?>">
				<h1 class="thumb-title"><?php echo $feature_one_name; ?></h1>
				<p class="thumb-date"><?php echo $feature_one_date->format('d F, Y'); ?></p>
				<p class="thumb-preview"><?php echo $feature_one_preview; ?></p>
			</a>
			<?php echo_purchase_link( $feature_one_id, 'buy-link' ); ?>
		</div>
		<div class="secondary">
			<ul>
				<li <?php if(has_post_thumbnail( $feature_two_id )) : ?> class="feature has-image"<?php else : ?> class="feature no-image" <?php endif; ?>  >
					<a class="event-link" <?php if(has_post_thumbnail( $feature_two_id )) : ?> style="background-image: url('<?php echo $feature_two_img_url[0]; ?>')"  <?php endif; ?> href="<?php echo $feature_two_permalink;?>">
						<h1 class="thumb-title"><?php echo $feature_two_name; ?></h1>
						<p class="thumb-date"><?php echo $feature_two_date->format('d F, Y'); ?></p>
					</a>
					<?php echo_purchase_link( $feature_two_id, 'buy-link' ); ?>
				</li>
				<li <?php if(has_post_thumbnail( $feature_three_id )) : ?> class="feature has-image"<?php else : ?> class="feature no-image" <?php endif; ?>  >
					<a class="event-link" <?php if(has_post_thumbnail( $feature_three_id )) : ?> style="background-image: url('<?php echo $feature_three_img_url[0]; ?>')"  <?php endif; ?> href="<?php echo $feature_three_permalink;?>">
						<h1 class="thumb-title"><?php echo $feature_three_name; ?></h1>
						<p class="thumb-date"><?php echo $feature_three_date->format('d F, Y'); ?></p>
					</a>
					<?php echo_purchase_link( $feature_three_id, 'buy-link' ); ?>
				</li>
			</ul>
		</div>
	</div>
    <div class="events-feed page">
		<h1>Coming up</h1>
		<ul>
		    	<?php foreach( $events_feed_posts as $post ) : setup_postdata( $post );
		    		$event_date = new DateTime( get_field( 'event_date', get_the_ID() ) );
		    	?>
				<li>
					<a class="event-link" href="<?php the_permalink(); ?>">
						<h1><?php the_title(); ?></h1>
						<p class="thumb-date"><?php echo $event_date->format('d F, Y') ?></p>
					</a>
					<a class="buy-link" href="<?php echo get_field( 'purchase_link' ); ?>">Buy</a>
				</li>
		    	<?php endforeach; wp_reset_postdata(); ?>
	    </ul>
    </div>

<?php get_footer(); ?>