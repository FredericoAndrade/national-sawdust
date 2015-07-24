<?php get_header(); ?>

<h1>Showing results for <span class="query-title"><?php the_search_query(); ?></span></h1>

<?php if ( have_posts() ) : ?>
	<!-- need to consider parameters for this to be a grid or stream -->
	<div class="query-feed">
		<ul>
		<?php while ( have_posts() ) : the_post(); ?>
			<!-- markup to be considered here-->
			<li>
				<!-- link to post -->
				<a href="<?php the_permalink(); ?>"></a>
				<!-- thumbnail elements -->
				<?php the_title(); ?>
				<?php the_post_thumbnail( 'large', array( 'class' => 'event-thumb' ) ); ?>
				<?php echo get_field( 'event_time' ); ?>
				<?php echo_time( get_the_ID() ); ?>
				<?php echo_purchase_link( get_the_ID(), 'purchase-link' ); ?>
				<?php echo_members_link( get_the_ID(), 'members-link' ); ?>
			</li>
		<?php endwhile; ?>
		</ul>
	</div>

<?php endif; ?>

<?php get_footer(); ?>