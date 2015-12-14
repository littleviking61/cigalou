<?php
/**
 * The footer template
 *
 * @package WPlook
 * @subpackage Morning Time Lite
 * @since Morning Time Lite 1.0
 */
?>

<footer class="footer">
		<div class="footer-body">
			<div class="row">
				<div class="columns large-4">
					<?php if ( is_active_sidebar( 'f1-widgets' ) ) : ?>
						<?php dynamic_sidebar( 'f1-widgets' ); ?>
					<?php endif; ?>
				</div><!-- /.columns large-4 -->

				<div class="columns large-4">
					<!-- Second Widget area -->
					<?php if ( is_active_sidebar( 'f2-widgets' ) ) : ?>
						<?php dynamic_sidebar( 'f2-widgets' ); ?>
					<?php endif; ?>
				</div><!-- /.columns large-4 -->

				<div class="columns large-4">
					<!-- Third Widget area -->
					<?php if ( is_active_sidebar( 'f3-widgets' ) ) : ?>
						<?php dynamic_sidebar( 'f3-widgets' ); ?>
					<?php endif; ?>
				</div><!-- /.columns large-4 -->
			</div><!-- /.row -->
		</div><!-- /.footer-body -->

		<div class="footer-bar">
			<div class="row">
				<div class="columns large-8">
					<p class="copyright">
						 Dessin de <a href="botan-a-becane.fr">Botan</a> - 
						 <?php _e('Thème modifié par ', 'morningtime-lite'); ?> <a href="http://nuagegraphik.com/" title="Nuagegraphik - Baptiste Régné">Nuagegraphik</a> alias <a href="laventurierviking.fr">L'aventurier viking</a>
					</p><!-- /.copyright -->
				</div><!-- /.columns large-6 -->

				<div class="columns large-4">
					<?= bloginfo('name'). '©' . date('Y') ?>
					<?php
						if ( has_nav_menu( 'footernav' ) ) { ?>
							<nav class="footer-nav right">
								<?php wp_nav_menu( array('depth' => '3', 'theme_location' => 'footernav', 'container'	 => '','depth' => -1, )); ?>
							</nav>
					<?php } ?>
				</div><!-- /.columns large-6 -->
			</div><!-- /.row -->
		</div><!-- /.footer-bar -->
	</footer><!-- /.footer -->
</div><!-- /.wrapper -->
<?php wp_footer(); ?>
</body>
</html>