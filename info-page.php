<?php

/*
 * Template name: Info pages
 */

get_header(); ?>
<div class="hero-img-wrap">
  <?php the_post_thumbnail( 'full', array( 'class' => 'hero-img' ) ); ?>
</div>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <div class="page">
    <div class="sub-header">
      <nav>
        <?php wp_list_pages('exclude=2,47,49&title_li='); ?>
      </nav>
    </div>
    <h1 class="section-title"><?php the_title(); ?></h1>
    <article>
	<?php the_content(''); ?>
    </article>
  </div>

<?php endwhile; endif; ?>

<?php get_footer(); ?>