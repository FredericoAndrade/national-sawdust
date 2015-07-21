<?php 
	get_header();
		
	$queried_object = get_queried_object();
	$taxonomy = $queried_object->taxonomy;
	$term_id = $queried_object->term_id;
	$cat_thumbnail = get_field('cat_thumbnail', $taxonomy . '_' . $term_id);
	?>

	<div class="hero-img-wrap">
		<img src="<?php echo $cat_thumbnail; ?>" class="hero-img" />
		<h1><?php single_cat_title(); ?></h1>
	</div>

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
					<?php the_date('m/d/Y'); ?>
					<?php echo_purchase_link( get_the_ID() ); ?>			
				</li>
			<?php endwhile; ?>
			</ul>
		</div>

	<?php endif; ?>

<?php get_footer(); ?>