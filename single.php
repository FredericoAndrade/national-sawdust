<?php
	get_header();

	$categories = get_categories();

	if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<div class="single page">
		<div class="hero-img-wrap">
			<?php the_post_thumbnail( 'full', array( 'class' => 'hero-img' ) ); ?>
		</div>
		<div class="content-wrap">
			<div class="main">
				<div class="event">
					<h1 class="title"><?php the_title(); ?></h1>
					<article>
						<?php the_content(); ?>
					</article>
					<ul>
						<?php wp_list_categories( 'exclude=2&title_li=' ); ?>
					</ul>
					<p class="date"><?php the_date('m/d/Y'); ?></p>
					<?php echo_purchase_link( get_the_ID(), 'buy-link' ); ?>
				</div>
			</div>
			<?php /*
				   * here we need a function that determines the event date
		    	   * as well as the value of archival or publicity content
		    	   * and then displays the appropriate content
		    	   */
		    ?>
		    <div class="related-content">
		    	<h2 class="section-title">Similar Events</h2>
		    	<ul class="related-posts">
		    	<?php
		    		foreach( $categories as $category ) :
		    			$cat_id = $category->term_id;
			    		// BEHAVIOR: Pull in three related posts. If this post has less than three categories, bring in more than one event from available categories
		    			$related_args = array( 'category' => $cat_id, 'posts_per_page' => -1 );
		    			$related_posts = get_posts( $related_args );

		    			foreach( $related_posts as $post ) : ?>
					<li class="<?php echo $post->post_name; ?> related-post">
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail( 'medium', array( 'class' => 'event-thumb' ) ); ?>
							<p class="thumb-title"><?php the_title(); ?></p>
							<p class="thumb-meta">
								<div class="thumb-date left">
									<?php
										$date = new DateTime( get_field('event_date') );
										echo $date->format('d/m/Y');
										?>
								</div>
								<div class="thumb-purchase left">
									<?php echo_purchase_link( get_the_ID() ); ?>
								</div>
								<div class="clear"></div>
							</p>
						</a>
					</li>

		    	<?php endforeach; endforeach; ?>
		    	</ul>
		    </div>
		</div>
	</div>

<?php
	endwhile;
	endif;
	get_footer(); ?>