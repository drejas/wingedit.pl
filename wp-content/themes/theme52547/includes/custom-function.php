<?php
	// Loads child theme textdomain
	load_child_theme_textdomain( CURRENT_THEME, CHILD_DIR . '/languages' );

	add_filter( 'cherry_stickmenu_selector', 'cherry_change_selector' );
	function cherry_change_selector($selector) {
		$selector = 'header .nav-wrap';
		return $selector;
	}

	add_filter( 'cherry_slider_params', 'child_slider_params' );
	function child_slider_params( $params ) {
		$params['minHeight'] = '"50px"';
		$params['height'] = '"47.45%"';
	return $params;
	}
	
	if ( of_get_option('login_display_id') == 'yes') {
		add_filter('wp_nav_menu_items','add_search_box_to_menu', 10, 2);
		function add_search_box_to_menu( $items, $args ) {
			if( $args->theme_location == 'header_menu' ) {
				$username = (get_current_user_id()!=0) ? get_userdata(get_current_user_id())->user_login : '';
				$user_title = str_replace("%username%", $username, of_get_option("site_admin"));
				$link_string_logout = '<a href="'. wp_logout_url($_SERVER['REQUEST_URI']) .'" title="'.of_get_option("log_out").'">'.of_get_option("log_out").'</a>';
				$link_string_login = "<a href=\"".get_bloginfo('wpurl')."/wp-login.php?action=login&amp;redirect_to=".$_SERVER['REQUEST_URI']."\" title=\"".of_get_option("sign_in")."\">".of_get_option("sign_in")."</a>";

				if (!is_user_logged_in()) {
					return $items."<li class='menu-item auth log-in'>".$link_string_login."</li>";
				} else {
					return $items."<li class='menu-item auth log-out'>".$link_string_logout."</li>";
				}
			}
			return $items;
		}
	}

	function my_mce4_options( $init ) {
	$default_colours = '
	    "000000", "Black",        "993300", "Burnt orange", "333300", "Dark olive",   "003300", "Dark green",   "003366", "Dark azure",   "000080", "Navy Blue",      "333399", "Indigo",       "333333", "Very dark gray", 
	    "800000", "Maroon",       "FF6600", "Orange",       "808000", "Olive",        "008000", "Green",        "008080", "Teal",         "0000FF", "Blue",           "666699", "Grayish blue", "808080", "Gray", 
	    "FF0000", "Red",          "FF9900", "Amber",        "99CC00", "Yellow green", "339966", "Sea green",    "33CCCC", "Turquoise",    "3366FF", "Royal blue",     "800080", "Purple",       "999999", "Medium gray", 
	    "FF00FF", "Magenta",      "FFCC00", "Gold",         "FFFF00", "Yellow",       "00FF00", "Lime",         "00FFFF", "Aqua",         "00CCFF", "Sky blue",       "993366", "Brown",        "C0C0C0", "Silver", 
	    "FF99CC", "Pink",         "FFCC99", "Peach",        "FFFF99", "Light yellow", "CCFFCC", "Pale green",   "CCFFFF", "Pale cyan",    "99CCFF", "Light sky blue", "CC99FF", "Plum",         "FFFFFF", "White"
	';
	$custom_colours = '
	    "23ba85", "Green Template", 
	';
	$init['textcolor_map'] = '['.$default_colours.','.$custom_colours.']'; // build colour grid default+custom colors
	$init['textcolor_rows'] = 6; // enable 6th row for custom colours in grid
	return $init;
	}
	add_filter('tiny_mce_before_init', 'my_mce4_options');

	/*   Page_Block_SHORTCODE    */
	function page_block_shortcode($atts, $content = null) {
		extract(shortcode_atts(array(
			'hash_id'  => ''
		), $atts));
		$output = '<div class="hashAncor" id="'.$hash_id.'"></div>';
	    return $output;
	}
	add_shortcode('page_block', 'page_block_shortcode');
	
	add_action( 'wp_enqueue_scripts', 'my_deregister_maps', 100 );
	function my_deregister_maps() {
		wp_deregister_script('jquery');
		wp_register_script('jquery', CHILD_URL.'/js/jquery-2.1.3.min.js', false, '2.1.3');
		wp_enqueue_script('jquery');
	}

	// Loads custom scripts.
	require_once( 'custom-js.php' );
	require_once( 'shortcodes/circle-stat.php' );
	require_once( 'shortcodes/service-box.php' );
	require_once( 'shortcodes/posts-grid.php' );
	require_once( 'shortcodes/shortcodes.php' );
?>