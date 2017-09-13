<?php
add_action( 'wp_enqueue_scripts', 'cherry_child_custom_scripts' );

function cherry_child_custom_scripts() {
	/**
	 * How to enqueue script?
	 *
	 * @link http://codex.wordpress.org/Function_Reference/wp_enqueue_script
	 */
	wp_enqueue_script( 'btn', CHILD_URL . '/js/btn.js', array('jquery'), '1.0' );
	wp_enqueue_script( 'my_script', CHILD_URL . '/js/my_script.js', array('jquery'), '1.0' );
	wp_enqueue_script( 'jquery.formstyler.min', get_stylesheet_directory_uri() . '/js/jquery.formstyler.min.js', array('jquery'), '1.0' );
	wp_enqueue_script( 'waypoints.min', CHILD_URL . '/js/waypoints.min.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'jquery.placeholder', get_stylesheet_directory_uri() . '/js/jquery.placeholder.js', array('jquery'), '1.0' );

	/* For one page navigation */	
	wp_enqueue_script( 'theme_script', CHILD_URL . '/js/themeScript.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'mousewheel', CHILD_URL . '/js/jquery.mousewheel-3.0.4.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'scroll_show_time', CHILD_URL . '/js/scrollShowTime.js', array( 'jquery' ), '1.0', true );
	
	wp_enqueue_style('btn', CHILD_URL . '/css/btn.css');

} ?>