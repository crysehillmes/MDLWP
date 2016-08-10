<?php
/**
 * The template for displaying search results pages.
 *
 * @package MDLWP
 */

get_header(); ?>

	<?php
		$showSideBar = get_theme_mod( 'show_side_bar_on_search' );
		$content_part_col = ' mdl-cell--12-col-tablet mdl-cell--12-col-phone';
		if($showSideBar == 1) {
			$content_part_col = ' mdl-cell--9-col'.$content_part_col;
		} else {
			$content_part_col = ' mdl-cell--12-col'.$content_part_col;
		}
		$content_part_col = 'mdl-cell'.$content_part_col;
	?>

	<section id="primary" class="content-area mdl-grid mdlwp-1440">
		<main id="main" class="site-main mdl-grid <?php echo $content_part_col ?>" role="main">

		<?php do_action( 'mdlwp_before_content' ); ?>

		<?php if ( have_posts() ) : ?>

			<header class="page-header mdl-cell mdl-cell--12-col mdl-card mdl-shadow--2dp list-page-title-card">
				<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'mdlwp' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );
				?>

			<?php endwhile; ?>

			<?php do_action( 'mdlwp_before_pagination' ); ?>

			<?php the_posts_navigation(); ?>

			<?php do_action( 'mdlwp_after_pagination' ); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		<?php do_action( 'mdlwp_after_content' ); ?>

		<?php if($showSideBar && is_active_sidebar( 'sidebar-search' )) { ?>
		<main id="main" class="sidebar mdl-grid mdl-cell mdl-cell--3-col mdl-cell--12-col-tablet mdl-cell--12-col-phone"> 
			<?php dynamic_sidebar( 'sidebar-search' ); ?>
		</main><!-- #main -->
		<?php } ?>
	</section><!-- #primary -->


<?php get_footer(); ?>
