<?php
	get_header();
	//date_default_timezone_set('America/New_York');
	$feature_one = get_field( 'first_feature_post' );
	$feature_one_id = $feature_one->ID;
	$feature_one_permalink = get_permalink( $feature_one_id );
	$feature_one_img_url = wp_get_attachment_image_src(  get_post_thumbnail_id( $feature_one_id ), 'single-post-thumbnail' );
	$feature_one_img = get_the_post_thumbnail( $feature_one_id, 'large' );
	$feature_one_name = get_the_title( $feature_one_id );
	$feature_one_preview = get_field( 'preview_text', $feature_one_id );
	$feature_one_date = new DateTime( get_field( 'event_date', $feature_one_id ) );
	$feature_one_categories = get_the_category( $feature_one_id );

	$feature_two = get_field( 'second_feature_post' );
	$feature_two_id = $feature_two->ID;
	$feature_two_permalink = get_permalink( $feature_two_id );
	$feature_two_img_url = wp_get_attachment_image_src( get_post_thumbnail_id($feature_two_id), 'single-post-thumbnail' );
	$feature_two_img = get_the_post_thumbnail( $feature_two_id, 'large' );
	$feature_two_name = get_the_title( $feature_two_id );
	$feature_two_preview = get_field( 'preview_text', $feature_two_id );
	$feature_two_date = new DateTime( get_field( 'event_date', $feature_two_id ) );
	$feature_two_categories = get_the_category( $feature_two_id );

	$feature_three = get_field( 'third_feature_post' );
	$feature_three_id = $feature_three->ID;
	$feature_three_permalink = get_permalink( $feature_three_id );
	$feature_three_img_url = wp_get_attachment_image_src( get_post_thumbnail_id($feature_three_id), 'single-post-thumbnail' );
	$feature_three_img = get_the_post_thumbnail( $feature_three_id, 'large' );
	$feature_three_name = get_the_title( $feature_three_id );
	$feature_three_preview = get_field( 'preview_text', $feature_three_id );
	$feature_three_date = new DateTime( get_field( 'event_date', $feature_three_id ) );
	$feature_three_categories = get_the_category( $feature_three_id );

	$events_feed = get_category_by_slug( 'homepage-feed' )->term_id;
	$yesterday = date('Ymd', time() - 60 * 60 * 24);
	$events_args = array(
		'category' => $events_feed,
		'meta_query' => array(
				array(
					'key' => 'event_date',
					'compare' => '>',
					'value' => date( $yesterday ),
					'date' => 'DATE'
				),
			),
		'posts_per_page' => '-1' );
	$events_feed_posts = get_posts( $events_args );
	?>
	<div class="featured-posts">
		<div class="<?php if(has_post_thumbnail( $feature_one_id )) : ?>primary feature has-image <?php else : ?> primary feature no-image <?php endif;  foreach ($feature_one_categories as $category) : $category_name = $category->slug; echo $category_name . ' '; endforeach; ?>">
			<a class="event-link" <?php if(has_post_thumbnail( $feature_one_id )) : ?>  style="background-image: url('<?php echo $feature_one_img_url[0]; ?>')" <?php endif; ?> href="<?php echo $feature_one_permalink;?>">
				<h1 class="thumb-title"><?php echo $feature_one_name; ?></h1>
				<p class="thumb-date"><?php echo $feature_one_date->format('d F, Y'); ?> <br>
					<?php echo_time( $feature_one_id ); ?>
				</p>
				<p class="thumb-preview"><?php echo $feature_one_preview; ?></p>
				
			</a>
			<ul>
				<?php foreach ( $feature_one_categories as $category ) : ?>
					<li><a href="<?php echo get_category_link( $category->term_id ); ?>"><?php echo $category->slug; ?></a></li>
				<?php endforeach; ?>
			</ul>
			<div class="buy-links">
				<?php echo_purchase_link( $feature_one_id, 'buy-link' ); ?>
				<?php echo_members_link( $feature_one_id, 'members-link' ); ?>
			</div>
		</div>
		<div class="secondary">
			<ul>
				<li class="<?php if(has_post_thumbnail( $feature_two_id )) : ?>feature has-image <?php else : ?> feature no-image <?php endif; foreach ($feature_two_categories as $category) : $category_name = $category->slug; echo $category_name . ' '; endforeach; ?>">
					<a class="event-link" <?php if(has_post_thumbnail( $feature_two_id )) : ?> style="background-image: url('<?php echo $feature_two_img_url[0]; ?>')"  <?php endif; ?> href="<?php echo $feature_two_permalink;?>">
						<h1 class="thumb-title"><?php echo $feature_two_name; ?></h1>
						<p class="thumb-date"><?php echo $feature_two_date->format('d F, Y'); ?><br>
							<?php echo_time( $feature_two_id ); ?>
						</p>
						<ul>
							<?php foreach ( $feature_two_categories as $category ) : ?>
								<li><a href="<?php echo get_category_link( $category->term_id ); ?>"><?php echo $category->slug; ?></a></li>
							<?php endforeach; ?>
						</ul>
					</a>
					<div class="buy-links">
						<?php echo_purchase_link( $feature_two_id, 'buy-link' ); ?>
						<?php echo_members_link( $feature_two_id, 'members-link' ); ?>
					</div>
				</li>
				<li class="<?php if(has_post_thumbnail( $feature_three_id )) : ?>feature has-image <?php else : ?> feature no-image <?php endif; foreach ($feature_three_categories as $category) : $category_name = $category->slug; echo $category_name . ' '; endforeach; ?>">
					<a class="event-link" <?php if(has_post_thumbnail( $feature_three_id )) : ?> style="background-image: url('<?php echo $feature_three_img_url[0]; ?>')"  <?php endif; ?> href="<?php echo $feature_three_permalink;?>">
						<h1 class="thumb-title"><?php echo $feature_three_name; ?></h1>
						<p class="thumb-date"><?php echo $feature_three_date->format('d F, Y'); ?><br>
							<?php echo_time( $feature_three_id ); ?>
						</p>
						<ul>
							<?php foreach ( $feature_three_categories as $category ) : ?>
								<li><a href="<?php echo get_category_link( $category->term_id ); ?>"><?php echo $category->slug; ?></a></li>
							<?php endforeach; ?>
						</ul>
					</a>
					<div class="buy-links">
						<?php echo_purchase_link( $feature_three_id, 'buy-link' ); ?>
						<?php echo_members_link( $feature_three_id, 'members-link' ); ?>
					</div>
				</li>
			</ul>
		</div>
	</div>
    <div class="events-feed page">
		<h1 class="section-title">Coming up</h1>
		<ul class="posts">
		    	<?php foreach( $events_feed_posts as $post ) : setup_postdata( $post );
		    		$event_date = new DateTime( get_field( 'event_date', get_the_ID() ) );
		    		$event_thumbnail = wp_get_attachment_image_src(  get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
					$post_categories = get_the_category( get_the_ID() ); ?>
				<li style="background-image:url('<?php echo $event_thumbnail[0]; ?>');" class="<?php if( has_post_thumbnail() ) : ?>has-image <?php else : ?> no-image <?php endif; foreach ($post_categories as $category) : $category_name = $category->slug; echo $category_name . ' '; endforeach; ?>">
					<a class="event-link" href="<?php the_permalink(); ?>">
						<h1><?php the_title(); ?></h1>
						<p class="thumb-date">
							<?php echo $event_date->format('d F, Y') ?><br>
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
		    	<?php endforeach; wp_reset_postdata(); ?>
	    </ul>
    </div>

<?php get_footer(); ?>