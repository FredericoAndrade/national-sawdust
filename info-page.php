<?php 

/*
 * Template name: Info pages
 */

get_header(); ?>

<nav class="sub-header">
	<?php wp_list_pages('include=68,70,72,74&title_li='); ?>
</nav>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<h1><?php the_title(); ?></h1>

	<?php the_content(''); ?>

<?php endwhile; endif; ?>

<?php get_footer(); ?>