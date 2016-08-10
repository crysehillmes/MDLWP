<?php
/**
 * The template for displaying all single posts.
 *
 * @package MDLWP
 */

get_header(); ?>

	<?php
		$showSideBar = get_theme_mod( 'show_side_bar_on_single' );
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

		<?php do_action( 'mdlwp_before_content' ); ?>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content', 'single' ); ?>

			<?php do_action( 'mdlwp_before_comments' ); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					echo '<div class="mdl-cell mdl-cell--12-col mdl-card mdl-shadow--2dp comments-card">';
					comments_template();
					echo '</div>';
				endif;
			?>

			<?php do_action( 'mdlwp_after_comments' ); ?>

			<?php do_action( 'mdlwp_before_pagination' ); ?>

			<?php mdlwp_post_navigation(); ?>

			<?php do_action( 'mdlwp_after_pagination' ); ?>

		<?php endwhile; // End of the loop. ?>

		<?php do_action( 'mdlwp_after_content' ); ?>

		</main><!-- #main -->
		<?php if($showSideBar && is_active_sidebar( 'sidebar-single' )) { ?>
		<main id="main" class="sidebar mdl-grid mdl-cell mdl-cell--3-col mdl-cell--12-col-tablet mdl-cell--12-col-phone"> 
			<?php dynamic_sidebar( 'sidebar-single' ); ?>
		</main><!-- #main -->
		<?php } ?>
	</div><!-- #primary -->


<?php get_footer(); ?>
