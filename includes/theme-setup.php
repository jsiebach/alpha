<?php
/**
 * Theme functions which set up theme elements, defaults, and settings.
 *
 * @package    Alpha\Functions
 * @subpackage Alpha
 * @author     Robert Neu
 * @copyright  Copyright (c) 2015, WP Site Care, LLC
 * @since      1.0.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Set the content width and allow it to be filtered directly.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'alpha_content_width', 1140 );
}

/**
 * Set up theme defaults and add support for WordPress and CareLib features.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_setup() {
	carelib_get( 'layouts' )->set_default( is_rtl() ? '2c-l' : '2c-r' )->add_support();

	carelib_get( 'site-logo' )->add_support();

	add_theme_support( 'automatic-feed-links' );
}

/**
 * Register custom image sizes for the theme.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_register_image_sizes() {
	set_post_thumbnail_size( 175, 130, true );
	add_image_size( 'featured',     1025, 500, true );
	add_image_size( 'related-posts', 350, 250, true );
}

/**
 * Register custom nav menus for the theme.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_register_nav_menus() {
	register_nav_menus( array(
		'primary'   => _x( 'Primary Menu', 'nav menu location', 'alpha' ),
		'secondary' => _x( 'Secondary Menu', 'nav menu location', 'alpha' ),
	) );
}

/**
 * Add custom styles to the WordPress editor to give a better representation of
 * what the front of the site will look like.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_add_editor_styles() {
	$styles = array(
		'css/editor-style' . alpha_get_suffix() . '.css',
	);

	if ( apply_filters( 'alpha_enable_google_fonts', true ) ) {
		$styles[] = alpha_google_fonts_string( 'Raleway:400,600|Lato:400,400italic,700', true );
	}

	add_editor_style( $styles );
}

/**
 * Registers sidebars.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_register_sidebars() {
	carelib_get( 'sidebar' )->register( array(
		'id'          => 'primary',
		'name'        => _x( 'Primary Sidebar', 'sidebar', 'alpha' ),
		'description' => __( 'The main sidebar. It is displayed on either the left or right side of the page based on the chosen layout.', 'alpha' ),
	) );
	carelib_get( 'sidebar' )->register( array(
		'id'          => 'footer-widgets',
		'name'        => _x( 'Footer Widgets', 'sidebar', 'alpha' ),
		'description' => __( 'A widgeted area which displays just before the main site footer on all pages.', 'alpha' ),
	) );
}