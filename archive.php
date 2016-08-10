<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package MDLWP
 */

get_header(); ?>
	<?php
		$showSideBar = get_theme_mod( 'show_side_bar_on_archive' );
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

		<?php if ( have_posts() ) : ?>

			<header class="page-header mdl-cell mdl-cell--12-col mdl-card mdl-shadow--2dp list-page-title-card">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
		<?php if($showSideBar && is_active_sidebar( 'sidebar-archive' )) { ?>
		<main id="main" class="sidebar mdl-grid mdl-cell mdl-cell--3-col mdl-cell--12-col-tablet mdl-cell--12-col-phone"> 
			<?php dynamic_sidebar( 'sidebar-archive' ); ?>
		</main><!-- #main -->
		<?php } ?>
	</div><!-- #primary -->

<?php get_footer(); ?>
