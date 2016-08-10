<?php
/**
 * MDLWP functions and definitions
 *
 * @package MDLWP
 */

if ( ! function_exists( 'mdlwp_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function mdlwp_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on MDLWP, use a find and replace
	 * to change 'mdlwp' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'mdlwp', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'mdlwp' ),
		'drawer' => esc_html__( 'Drawer Menu', 'mdlwp' ),
		'footer' => esc_html__( 'Footer Menu', 'mdlwp' )
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	// add_theme_support( 'post-formats', array(
	// 	'aside',
	// 	'image',
	// 	'video',
	// 	'quote',
	// 	'link',
	// ) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'mdlwp_custom_background_args', array(
		'default-color' => 'f5f5f5',
		'default-image' => '',
	) ) );
}
endif; // mdlwp_setup
add_action( 'after_setup_theme', 'mdlwp_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function mdlwp_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'mdlwp_content_width', 900 );
}
add_action( 'after_setup_theme', 'mdlwp_content_width', 0 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function mdlwp_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Index SideBar', 'mdlwp' ),
		'id'            => 'sidebar-index',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="sidebar-widget mdl-card mdl-cell mdl-cell--12-col mdl-shadow--2dp %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h1 class="">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( '404 SideBar', 'mdlwp' ),
		'id'            => 'sidebar-404',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="sidebar-widget mdl-card mdl-cell mdl-cell--12-col mdl-shadow--2dp %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h1 class="">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Archive SideBar', 'mdlwp' ),
		'id'            => 'sidebar-archive',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="sidebar-widget mdl-card mdl-cell mdl-cell--12-col mdl-shadow--2dp %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h1 class="">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Search SideBar', 'mdlwp' ),
		'id'            => 'sidebar-search',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="sidebar-widget mdl-card mdl-cell mdl-cell--12-col mdl-shadow--2dp %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h1 class="">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Single SideBar', 'mdlwp' ),
		'id'            => 'sidebar-single',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="sidebar-widget mdl-card mdl-cell mdl-cell--12-col mdl-shadow--2dp %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h1 class="">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Page Contact SideBar', 'mdlwp' ),
		'id'            => 'sidebar-page-contact',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="sidebar-widget mdl-card mdl-cell mdl-cell--12-col mdl-shadow--2dp %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h1 class="">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Page Ribbon SideBar', 'mdlwp' ),
		'id'            => 'sidebar-page-ribbon',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="sidebar-widget mdl-card mdl-cell mdl-cell--12-col mdl-shadow--2dp %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h1 class="">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Page SideBar', 'mdlwp' ),
		'id'            => 'sidebar-page',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="sidebar-widget mdl-card mdl-cell mdl-cell--12-col mdl-shadow--2dp %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h1 class="">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'mdlwp' ),
		'id'            => 'footer-1',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="mdl-mega-footer__drop-down-section footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h1 class="mdl-mega-footer__heading footer-title">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'mdlwp' ),
		'id'            => 'footer-2',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="mdl-mega-footer__drop-down-section footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h1 class="mdl-mega-footer__heading footer-title">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 3', 'mdlwp' ),
		'id'            => 'footer-3',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="mdl-mega-footer__drop-down-section footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h1 class="mdl-mega-footer__heading footer-title">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 4', 'mdlwp' ),
		'id'            => 'footer-4',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="mdl-mega-footer__drop-down-section footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h1 class="mdl-mega-footer__heading footer-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'mdlwp_widgets_init' );

/**
 * Remove ver=x.x.x from css and js url.
 */
function mdlwp_css_js_ver_remover($src, $handle) {
	return remove_query_arg(array('ver'), $src);		
}
add_filter('script_loader_src',	'mdlwp_css_js_ver_remover',10,2);
add_filter('style_loader_src',	'mdlwp_css_js_ver_remover',10,2);

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Enqueue all JS and CSS files
 */
require get_template_directory() . '/inc/scripts.php';

/**
 * Custom menu
 */
require get_template_directory() . '/inc/nav-walker.php';

/**
 * Meta Box
 */
require get_template_directory() . '/inc/meta-box.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Widget for Footer Links
 */
require get_template_directory() . '/inc/mdlwp-footer-widget.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
