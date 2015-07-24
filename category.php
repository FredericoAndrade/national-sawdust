<?php
	get_header();

	$queried_object = get_queried_object();
	$taxonomy = $queried_object->taxonomy;
	$term_id = $queried_object->term_id;
	$cat_thumbnail = get_field('cat_thumbnail', $taxonomy . '_' . $term_id);
	?>

	<div class="hero-img-wrap">
		<img src="<?php echo $cat_thumbnail; ?>" class="hero-img" />
	</div>

	<?php if ( have_posts() ) : ?>
		<!-- need to consider parameters for this to be a grid or stream -->
		<div class="query-feed page">
			<h1 class="section-title">Events tagged '<?php single_cat_title(); ?>'</h1>
			<ul class="posts">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php 
					$event_thumbnail = wp_get_attachment_image_src(  get_post_thumbnail_id( get_the_ID() ), 'single-post-thumbnail' ); 
					$post_categories = get_the_category( get_the_ID() ); ?>
				<!-- markup to be considered here-->
				<li style="background:url('<?php echo $event_thumbnail[0]; ?>');" class="related-post <?php if( has_post_thumbnail() ) : ?>has-image <?php else : ?> no-image <?php endif; $post_categories = get_the_category( get_the_ID() ); ?>">
					<a class="event-link" href="<?php the_permalink(); ?>">
						<h1><?php the_title(); ?></h1>
						<p class="thumb-date">
							<?php $date = new DateTime( get_field('event_date') ); echo $date->format('d F, Y'); ?><br>
							<?php echo_time( get_the_ID() ); ?>
						</p>
					</a>
					<section class="buy-links">
						<?php echo_purchase_link( get_the_ID(), 'buy-link' ); ?>
						<?php echo_members_link( get_the_ID(), 'members-link' ); ?>
					</section>
				</li>
			<?php endwhile; ?>
			</ul>
		</div>

	<?php endif; ?>

<?php get_footer(); ?>