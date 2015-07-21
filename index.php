<?php get_header(); ?>

<form class='post-filters'>
	<select name="orderby">
		<?php
			$orderby_options = array(
				'post_date' => 'Order By Date',
				'post_title' => 'Order By Title',
				'rand' => 'Random Order',
			);
			foreach( $orderby_options as $value => $label ) {
				echo "<option ".selected( $_GET['orderby'], $value )." value='$value'>$label</option>";
			}
		?>
	</select>
	<select name="order">
		<?php
			$order_options = array(
				'DESC' => 'Descending',
				'ASC' => 'Ascending',
			);
			foreach( $order_options as $value => $label ) {
				echo "<option ".selected( $_GET['order'], $value )." value='$value'>$label</option>";
			}
		?>
	</select>
	<select name="thumbnail">
		<?php
			$order_options = array(
				'all' => 'All Posts',
				'only_thumbnailed' => 'Posts With Thumbnails',
			);
			foreach( $order_options as $value => $label ) {
				echo "<option ".selected( $_GET['thumbnail'], $value )." value='$value'>$label</option>";
			}
		?>
	</select>
	<input type='submit' value='Filter!'>
</form>

        <?php if ( have_posts() ) : ?>

        	<?php while ( have_posts() ) : the_post(); ?>

			<a href="<?php the_permalink(); ?>">
				<h1><?php the_title(); ?></h1>
			</a>

        <?php endwhile; endif; ?>

<?php get_footer(); ?>