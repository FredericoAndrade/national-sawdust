<?php
	get_header();

	$categories = get_categories();

	if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<div class="single">
		<div class="hero-img-wrap">
			<?php the_post_thumbnail( 'full', array( 'class' => 'hero-img' ) ); ?>
		</div>
		<div class="content-wrap">
			<div class="main page">
				<div class="event">
					<h1 class="title">
						<?php the_title(); ?>
						<span class="date"><?php the_date('d F, Y'); ?></span> <br>
						<span><?php echo_time( get_the_ID() ); ?></span>
					</h1>
					<?php echo_purchase_link( get_the_ID(), 'buy-link' ); ?>
					<?php echo_members_link( get_the_ID(), 'members-link' ); ?>
					<article>
						<?php the_content(); ?>
					</article>
					<h1 class="section-title">Tags</h1>
					<ul class="categories">
						<?php wp_list_categories( 'exclude=2&title_li=' ); ?>
					</ul>
				</div>
			</div>
			<div class="archive">
				<h2>Archive</h2>
				<?php /*
					   * here we need a function that determines the event date
			    	   * as well as the value of archival or publicity content
			    	   * and then displays the appropriate content
			    	   */
			    ?>
		    </div>
		    <div class="related page">
		    	<h1 class="section-title">Similar Events</h1>
		    	<ul class="posts">

		    	<?php foreach( $categories as $category ) :
		    			$cat_id = $category->term_id;
		    			$related_args = array( 'category' => $cat_id, 'posts_per_page' =>  -1);
		    			$related_posts = get_posts( $related_args );
		    			foreach( $related_posts as $post ) :
					$event_thumbnail = wp_get_attachment_image_src(  get_post_thumbnail_id( get_the_ID() ), 'single-post-thumbnail' ); ?>

					<li style="background:url('<?php echo $event_thumbnail[0]; ?>');" class="related-post <?php if( has_post_thumbnail() ) : ?>has-image <?php else : ?> no-image<?php endif; ?>">
						<a class="event-link" href="<?php the_permalink(); ?>">
							<!-- <?php the_post_thumbnail( 'medium', array( 'class' => 'event-thumb' ) ); ?> -->
							<h1><?php the_title(); ?></h1>
							<p class="thumb-date">
								<?php $date = new DateTime( get_field('event_date') ); echo $date->format('d F, Y'); ?><br>
								<?php echo_time( get_the_ID() ); ?>
							</p>
						</a>
						<?php echo_purchase_link( get_the_ID(), 'buy-link' ); ?>
						<?php echo_members_link( get_the_ID(), 'members-link' ); ?>
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