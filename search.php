<?php get_header(); ?>

<?php if ( have_posts() ) : ?>
	<!-- need to consider parameters for this to be a grid or stream -->

	<div class="query-feed page">
		<h1 class="section-title">Showing results for '<?php the_search_query(); ?>'</h1>
		<ul class="posts">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php $event_thumbnail = wp_get_attachment_image_src(  get_post_thumbnail_id( get_the_ID() ), 'single-post-thumbnail' );
			$post_categories = get_the_category( get_the_ID() ); ?>
			<!-- markup to be considered here-->
			<li style="background-image:url('<?php echo $event_thumbnail[0]; ?>');" class="related-post <?php if( has_post_thumbnail() ) : ?>has-image <?php else : ?> no-image<?php endif; ?>">
				<a class="event-link" href="<?php the_permalink(); ?>">
					<h1><?php the_title(); ?></h1>
					<p class="thumb-date">
						<?php $date = new DateTime( get_field('event_date') ); echo $date->format('d F, Y'); ?><br>
						<?php echo_time( get_the_ID() ); ?>
					</p>
				</a>
				<ul class="thumbnail-categories">
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
	</div>

	<?php else : ?>

		<div class="query page">
			<h1 class="section-title">There are no events listed under  '<?php the_search_query(); ?>'</h1>
		</div>

<?php endif; ?>

<?php get_footer(); ?>