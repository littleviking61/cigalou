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
					if ($cat_array) : ?>
						<?php
					  foreach($cat_array as $cat)  { ?>
							<div class="row">

								<a href="<?= get_category_link( $cat ); ?>"><h3 class="home-categorie"><?= get_cat_name( $cat ) ?> <small><i class="fa fa-arrow-circle-right"></i> <?= __('Voir tous les papiers','morningtime-lite') ?></small> </h3></a>
						  	<?php $args = array( 'posts_per_page' => 3, 'category' => $cat );

						  	$myposts = get_posts( $args );
						  	$i = 0;
						  	foreach ( $myposts as $post ) : setup_postdata( $post ); $i++ ?>
									<div class="columns <?= $i == 1 ? 'large-8' : 'large-4' ?>">
							  		<div class="content">
							  			<a href="<?php the_permalink(); ?>" class="post post-home <?= $i == 1 ? 'post-medium' : 'post-small' ?>">
								  			<?php if ( has_post_thumbnail() ) { ?>
								  				<div class="post-image">
								  					<?php the_post_thumbnail( $i == 1 ? 'medium' : 'thumbnail'); ?>
								  				</div><!-- /.post-image -->
								  			<?php } ?>

							  				<?php if ($i == 1): ?>							  					
							  					<h2><?php the_title(); ?></h2>

								  				<span class="post-date">
								  					<i class="fa fa-calendar"></i>
							  						<time class="post-date" datetime="<?php echo get_the_date( 'c' ) ?>" itemprop="datePublished"><?php morning_time_lite_get_date(); ?></time><!-- /.post-date -->
								  				</span>
													&nbsp;&nbsp;
								  				<span class="comments-link">
								  				<i class="fa fa-comment"></i>
								  					<?php comments_number(); ?>
								  				</span>

								  				<p><?php the_excerpt(); ?></p>
								  			<?php else: ?>
							  					<h4><?php the_title(); ?></h4>

							  					<span class="post-date">
								  					<i class="fa fa-calendar"></i>
							  						<time class="post-date" datetime="<?php echo get_the_date( 'c' ) ?>" itemprop="datePublished"><?php morning_time_lite_get_date(); ?></time><!-- /.post-date -->
								  				</span>
							  				<?php endif ?>

							  			</a>
							  		</div>
						  		</div>
						  	<?php endforeach; ?>
					  	</div>
					  	<?php
					  	wp_reset_postdata();
					  }
					endif;
					?>

				</div><!-- /.content -->

			</div><!-- /.columns large-8 -->

			<h3 class="home-categorie">Aimez-nous, suivez-nous, matez-nous !</h3>
			<div class="columns large-12 home-social">
				
				<div class="row">
					<div class="columns large-4">
						<div class="content">
							<?php if ( is_active_sidebar( 'h1-widgets' ) ) : ?>
								<?php dynamic_sidebar( 'h1-widgets' ); ?>
							<?php endif; ?>
						</div>
					</div><!-- /.columns large-4 -->

					<div class="columns large-4">
						<div class="content">
							<?php if ( is_active_sidebar( 'h2-widgets' ) ) : ?>
								<?php dynamic_sidebar( 'h2-widgets' ); ?>
							<?php endif; ?>
						</div>
					</div><!-- /.columns large-4 -->

					<div class="columns large-4">
						<!-- Third Widget area -->
						<div class="content">
							<?php if ( is_active_sidebar( 'h3-widgets' ) ) : ?>
								<?php dynamic_sidebar( 'h3-widgets' ); ?>
							<?php endif; ?>
						</div>
					</div><!-- /.columns large-4 -->
				</div><!-- /.row -->
			</div><!-- /.columns large-4 -->


		</div><!-- /.row -->
	</div><!-- /.main-body -->
</div><!-- /.main -->
<?php get_footer(); ?>