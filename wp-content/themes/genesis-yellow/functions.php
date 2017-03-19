<?php
//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'Genesis Sample Theme' );
define( 'CHILD_THEME_URL', 'http://www.studiopress.com/' );
define( 'CHILD_THEME_VERSION', '2.2.0' );

//* Enqueue Google Fonts
add_action( 'wp_enqueue_scripts', 'genesis_yellow_scripts' );
function genesis_yellow_scripts() {

	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Lato:300,400,700', array(), CHILD_THEME_VERSION );
		wp_enqueue_style( 'font-awesome', get_stylesheet_directory_uri().'/font-awesome/css/font-awesome.css', array(), CHILD_THEME_VERSION );

	wp_enqueue_script( 'flex-slider', get_stylesheet_directory_uri().'/js/jquery.flexslider-min.js', array(), CHILD_THEME_VERSION );
	wp_enqueue_script( 'yellow-js', get_stylesheet_directory_uri().'/js/yellow.js', array(), CHILD_THEME_VERSION );

}

//* Add HTML5 markup structure
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

//* Add Accessibility support
add_theme_support( 'genesis-accessibility', array( 'headings', 'drop-down-menu',  'search-form', 'skip-links', 'rems' ) );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

//* Add support for custom background
add_theme_support( 'custom-background' );

//* Add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 3 );

//custom footer text
add_filter('genesis_footer_creds_text', 'sp_footer_creds_filter');
function sp_footer_creds_filter( $creds ) {
	$creds = '[footer_copyright] &middot; Todd Hause Roofing</a>';
	return $creds;
}

//* Remove page titles
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
