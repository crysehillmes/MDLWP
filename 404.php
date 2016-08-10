<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package MDLWP
 */

get_header(); ?>
	<?php
		$showSideBar = get_theme_mod( 'show_side_bar_on_404' );
		$content_part_col = ' mdl-cell--12-col-tablet mdl-cell--12-col-phone';
		if($showSideBar == 1) {
			$content_part_col = ' mdl-cell--9-col'.$content_part_col;
		} else {
			$content_part_col = ' mdl-cell--12-col'.$content_part_col;
		}
		$content_part_col = 'mdl-cell'.$content_part_col;
	?>
		
	<div id="primary" class="content-area mdl-grid mdlwp-1440">
		<main id="main" class="site-main mdl-grid <?php echo $content_part_col ?>" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'mdlwp' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location.', 'mdlwp' ); ?></p>

					<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>

					<?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
		<?php if($showSideBar && is_active_sidebar( 'sidebar-404' )) { ?>
		<main id="main" class="sidebar mdl-grid mdl-cell mdl-cell--3-col mdl-cell--12-col-tablet mdl-cell--12-col-phone"> 
			<?php dynamic_sidebar( 'sidebar-404' ); ?>
		</main><!-- #main -->
		<?php } ?>
	</div><!-- #primary -->

<?php get_footer(); ?>
