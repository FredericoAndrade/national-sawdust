<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <div class="hero-img-wrap">
      <?php the_post_thumbnail( 'full', array( 'class' => 'hero-img' ) ); ?>
    </div>

  <div class="page">
	<h1 class="section-title"><?php the_title(); ?></h1>

	<?php the_content(''); ?>
  </div>

<?php endwhile; endif; ?>

<?php get_footer(); ?>