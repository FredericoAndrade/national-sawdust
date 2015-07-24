<?php get_header(); ?>

<h1 class="section-title">Showing results for <span class="query-title"><?php the_search_query(); ?></span></h1>

<?php if ( have_posts() ) : ?>
	<!-- need to consider parameters for this to be a grid or stream -->

	<div class="query-feed">
		<ul class="posts">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php $event_thumbnail = wp_get_attachment_image_src(  get_post_thumbnail_id( get_the_ID() ), 'single-post-thumbnail' ); ?>
			<!-- markup to be considered here-->
			<li style="background:url('<?php echo $event_thumbnail[0]; ?>');" class="related-post <?php if( has_post_thumbnail() ) : ?>has-image <?php else : ?> no-image<?php endif; ?>">
				<a class="event-link" href="<?php the_permalink(); ?>">
					<h1><?php the_title(); ?></h1>
					<p class="thumb-date">
						<?php $date = new DateTime( get_field('event_date') ); echo $date->format('d F, Y'); ?><br>
						<?php echo_time( get_the_ID() ); ?>
					</p>
				</a>
				<?php echo_purchase_link( get_the_ID(), 'buy-link' ); ?>
				<?php echo_members_link( get_the_ID(), 'members-link' ); ?>

			</li>
		<?php endwhile; ?>
		</ul>
	</div>

<?php endif; ?>

<?php get_footer(); ?>