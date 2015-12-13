<?php
/**
 * The default template for displaying content
 *
 * @package WPlook
 * @subpackage Morning Time Lite
 * @since Morning Time Lite 1.0
 */

?>
<?php if( is_single()) { ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class("post post-single"); ?> itemscope itemtype="https://schema.org/BlogPosting">
		<header class="post-head">

			<h3 class="post-title">
				<?php the_title(); ?>
			</h3>

		</header><!-- /.post-head -->

		<div class="post-body">
			<div class="entry" itemprop="articleBody">

				<?php if ( has_post_thumbnail() ) { ?>
					<div class="post-image">
						<?php the_post_thumbnail('morning-time-lite-featured-image'); ?>
					</div><!-- /.post-image -->
				<?php } ?>

				<?php  the_content( sprintf(
						__( 'Continuer la lecture <i class="fa fa-long-arrow-right"></i> ', 'morningtime-lite' ), the_title( '<span class="screen-reader-text">', '</span>', false )
					) );

					wp_link_pages( array(
						'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'morningtime-lite' ) . '</span>',
						'after'       => '</div>',
						'link_before' => '<span>',
						'link_after'  => '</span>',
						'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'morningtime-lite' ) . ' </span>%',
						'separator'   => '<span class="screen-reader-text">, </span>',
					) );
				?>
			</div><!-- /.entry -->
		</div><!-- /.post-body -->

		<div class="post-foot">
			<div class="post-tags">
				<?php // Tags ?>
				<?php if ( get_the_tag_list( '', ', ' ) ) { ?>
					<div class="tags"><i class="fa fa-tags"></i> <?php echo get_the_tag_list('',', ',''); ?></div>
				<?php } ?>
			</div><!-- /.post-tags -->

		</div><!-- /.post-foot -->


		<?php // Author bio.
			if ( get_the_author_meta( 'description' ) ) :
				get_template_part( 'author-bio' );
			endif;
		?>

		<?php echo morning_time_lite_content_navigation('postnav'); ?>
	</article><!-- /.post -->

<?php } else { ?>

	<!-- Article -->
	<article id="post-<?php the_ID(); ?>" <?php post_class('post wow fadeIn'); ?> itemscope itemtype="https://schema.org/BlogPosting" data-wow-duration="0.35s" data-wow-delay="0.15s">
		<header class="post-head">

			<h3 class="post-title">
				<a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>" itemprop="url"><?php the_title(); ?></a>
			</h3><!-- /.post-title -->

		</header><!-- /.post-head -->

		<div class="post-body">

			<div class="entry" itemprop="articleBody">
		
				<?php if ( has_post_thumbnail() ) { ?>
					<div class="post-image">
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail('morning-time-lite-featured-image'); ?>
						</a>
					</div><!-- /.post-image -->
				<?php } ?>
			
				<?php if ( is_search() ||  has_excerpt( $post->ID ) ) {
					the_excerpt();
				} else {
					the_content( sprintf(
						__( 'Continuer la lecture <i class="fa fa-long-arrow-right"></i> ', 'morningtime-lite' ), the_title( '<span class="screen-reader-text">', '</span>', false )
					) );
				}
				wp_link_pages( array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'morningtime-lite' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
					'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'morningtime-lite' ) . ' </span>%',
					'separator'   => '<span class="screen-reader-text">, </span>',
				) ); ?>
			</div><!-- /.entry -->

			<div class="post-actions">
				<span class="post-date">
					<i class="fa fa-calendar"></i>
					<a href="<?php the_permalink(); ?>">
						<time class="post-date" datetime="<?php echo get_the_date( 'c' ) ?>" itemprop="datePublished"><?php morning_time_lite_get_date(); ?></time><!-- /.post-date -->
					</a>
				</span>
				<span class="post-categorie">
					<i class="fa fa-folder-open"></i> 
					<?php the_category(', '); ?>
				</span>
				<span class="comments-link">
				<i class="fa fa-comment"></i>
					<?php comments_popup_link( 'Laisser un commentaire' ); ?>
				</span>
				<?php if ( get_the_tag_list( '', ', ' ) ) { ?>
					<span class="tags"><i class="fa fa-tags"></i> <?php echo get_the_tag_list('',', ',''); ?></span>
				<?php } ?>
			</div><!-- /.post-actions -->
		</div><!-- /.post-body -->
	</article><!-- /.post -->
<?php } ?>