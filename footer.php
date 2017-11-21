<?php
/*
Plugin Name: footer
Plugin URI: https://www.advancedcustomfields.com/
Description: Footer en react
Version: 1.0.1
Author: Melanie Lecomte
*/

add_shortcode( 'wpshout_react_footer', 'wpshout_react_show_footer' );
function wpshout_react_show_footer() {
	return '<div id="footer"></div>';
}

add_action( 'wp_enqueue_scripts', 'wpshout_react_footer_enqueue_scripts' );
function wpshout_react_footer_enqueue_scripts() {

	//wp_enqueue_script( 'react', plugin_dir_url( __FILE__ ) . 'react/build/react.min.js' );
	//wp_enqueue_script( 'react-dom', plugin_dir_url( __FILE__ ) . 'react/build/react-dom.min.js' );
	wp_enqueue_script( 'babel', 'https://npmcdn.com/babel-core@5.8.38/browser.min.js', '', null, false );
	wp_enqueue_script( 'wpshout-react-footer', plugin_dir_url( __FILE__ ) . 'react/shopping-list/static/js/main.c4ddab5e.js' );
	wp_enqueue_style( 'wpshout-react-footer', plugin_dir_url( __FILE__ ) . 'react/shopping-list/static/css/main.279176be.css' );
}

// Add "babel" type to footer script
add_filter( 'script_loader_tag', 'wpshout_react_footer_add_babel_type', 10, 3 );
function wpshout_react_footer_add_babel_type( $tag, $handle, $src ) {
	if ( $handle !== 'wpshout-react-footer' ) {
		return $tag;
	}

	return '<script src="' . $src . '" type="text/babel"></script>' . "\n";
}
