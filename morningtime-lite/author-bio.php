<?php
/**
 * The template for displaying Author bios
 *
 * @package WPlook
 * @subpackage Morning Time Lite
 * @since Morning Time Lite 1.0
 */
?>

<div class="list-authors">
	<?php if ( function_exists( 'coauthors_posts_links' ) ) :
		  $authors = get_coauthors();
		  if($authors)
		    foreach($authors as $author) :
		    	$author = $author -> data;
		    ?>

				<?php if($firstAuthor) : $firstAuthor = false;?>
				 <div class="post-author-box sep">
					<div class="post-author-box-content">
						<h4>En étroite collaboration avec :</h4>
					</div>
				</div>
				<?php endif; ?>

				<div class="post-author-box">
					<div class="post-author-box-image">
						<?php echo get_avatar($author -> user_email, 120); ?>
					</div><!-- /.post-author-box-image -->

					<div class="post-author-box-content">
						<h4>
							<?php if(!isset($firstAuthor)) { echo 'Article rédigé par '; $firstAuthor = true; } ?>
							<a class="author-link" href="<?php echo esc_url( get_author_posts_url( $author -> ID ) ); ?>" rel="author">
								<?= $author -> display_name; ?>
							</a>
						</h4>

						<p><?php the_author_meta('description', $author -> ID) ?>
						<a class="author-link" href="<?php echo esc_url( get_author_posts_url( $author -> ID ) ); ?>" rel="author">
							&nbsp;<?php printf( __( 'Voir tous ses articles', 'morningtime-lite' ), $author -> display_name ); ?>
						</a>
						</p>

						
					</div><!-- /.post-author-box-content -->
				</div><!-- /.post-author-box -->

		    <?php
		    endforeach;
	endif; ?>
</div>