<?php
/**
 * Template Name: Full Home
 *
 * @package WPlook
 * @subpackage Morning Time Lite
 * @since Morning Time Lite 1.0
 */
?>

<?php get_header(); ?>
<div class="main">
	<div class="main-body">
		<div class="row">
			<div class="columns large-12">
				<div class="content">
				<?php
					// get 5 latest posts, display the categories used on those posts (most recent categories)
					$cat_array = array();
					$args = array('post_type' => 'post', 'post_status' => 'publish', 'posts_per_page' => 20);
					$my_query = new WP_Query($args);
					if( $my_query->have_posts() ) :
					  while ($my_query->have_posts()) : $my_query->the_post();
					    $cat_args=array('orderby' => 'none');
					    $cats = wp_get_post_terms( $post->ID , 'category', $cat_args);
					    foreach($cats as $cat) {
					      $cat_array[$cat->term_id] = $cat->term_id;
					    }
					  endwhile;
					endif;
					wp_reset_query();  // Restore global post data stomped by the_post().
					
					// retrieve post for each category
					if ($cat_array) :
					  foreach($cat_array as $cat)  { ?>
							<h3><?= get_cat_name( $cat ) ?></h3>
					  	<?php $args = array( 'posts_per_page' => 3, 'category' => $cat );

					  	$myposts = get_posts( $args );
					  	foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
					  		<li>
					  			<a href="<?php the_permalink(); ?>">
						  			<?php if ( has_post_thumbnail() ) { ?>
						  				<div class="post-image">
						  					<?php the_post_thumbnail( 'thumbnail'); ?>
						  				</div><!-- /.post-image -->
						  			<?php } ?>
					  				<h2><?php the_title(); ?></h2>
					  				<p><?php the_excerpt(); ?></p>
					  			</a>
					  		</li>
					  	<?php endforeach; ?>
					  	<hr>
					  	<?php
					  	wp_reset_postdata();
					  }
					endif;
					?>

				</div><!-- /.content -->

			</div><!-- /.columns large-8 -->

			<div class="columns large-12">
				<div class="sidebar">
					<?php get_sidebar('page'); ?>
				</div><!-- /.sidebar -->
			</div><!-- /.columns large-4 -->


		</div><!-- /.row -->
	</div><!-- /.main-body -->
</div><!-- /.main -->
<?php get_footer(); ?>