<?php
/**
 * Functions and Definitions
 *
 * This document contains the custom functions and definitions for various WordPress
 * theme functionality.
 *
 * @package WordPress
 * @subpackage Triforce
 * @since Triforce 1.0
 */

 /* Remove user's access to theme editor */
define( 'DISALLOW_FILE_EDIT', true );

/**
 * Register Styles & Scripts
 *
 * The code below registers custom WordPress styles using wp_register_style()
 * function.
 *
 * @since Triforce 1.0
 */

function triforce_styles() {
	// Load main stylesheet
	wp_enqueue_style('triforce-style', get_template_directory_uri() . '/style.css');
	// Load main javascript
	wp_enqueue_script('triforce-script', get_template_directory_uri() . '/library/js/functions.min.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'triforce_styles');


/**
 * Register Features
 *
 * The code below registers custom WordPress theme features using
 * add_theme_support() function.
 *
 * @since Triforce 1.0
 */

function triforce_features() {
	// Support title tag
	add_theme_support('title-tag');
	// Support featured images
	add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'triforce_features');

/**
 * Register Menus
 *
 * The code below registers custom WordPress menus using register_my_menus()
 * function.
 *
 * @since Triforce 1.0
 */
function triforce_register_menus() {
	register_nav_menus(
		array( 'main-menu' => __('Main Menu') )
	);
}
add_action('init', 'triforce_register_menus');

/**
 * Register support for Gutenberg wide alignment
 */
function triforce_setup() {
  add_theme_support( 'align-wide' );
}
add_action( 'after_setup_theme', 'triforce_setup' );


/**
 * Advanced Custom Fields Settings
 *
 * The code below adds and adjusts various functionality for the Advanced Custom
 * Fields PRO plugin.
 *
 * @since Triforce 1.0
 */

if( function_exists('acf_add_options_page') ) {
	// Theme settings
	acf_add_options_page( array(
		'page_title' => 'Theme Settings',
		'menu_title' => 'Theme Settings',
		'parent_slug' => 'themes.php'
	));
}


/**
	 * Returns the SVG code of the SVG asset represented by the given key.
	 *
	 * @param string $key - A key that represents a specific SVG file/asset
	 * @return string - The code of the SVG file/asset
	 */
function get_svg($key) {
	$content = 'none';
	$file = get_stylesheet_directory().'/library/assets/svg/'.$key.'.svg';
	if(file_exists($file)) {
		$content = file_get_contents($file);
	}
	return $content;
}

// Include blocks
require_once('library/theme-functions/acf-blocks.php');
