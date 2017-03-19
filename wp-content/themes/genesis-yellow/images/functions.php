<?php
//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'Genesis Sample Theme' );
define( 'CHILD_THEME_URL', 'http://www.studiopress.com/' );
define( 'CHILD_THEME_VERSION', '2.1.2' );

//* Enqueue Google Fonts
add_action( 'wp_enqueue_scripts', 'genesis_sample_google_fonts' );
function genesis_sample_google_fonts() {

	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Lato:300,400,700', array(), CHILD_THEME_VERSION );
	wp_enqueue_script( 'flex-slider', get_stylesheet_directory_uri().'/js/jquery.flexslider-min.js', array(), CHILD_THEME_VERSION );
	wp_enqueue_script( 'yellow-js', get_stylesheet_directory_uri().'/js/yellow.js', array(), CHILD_THEME_VERSION );
}

//* Add HTML5 markup structure
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

//* Add support for custom background
add_theme_support( 'custom-background' );

//* Add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 3 );

add_image_size( 'custom-size', 150, 110, true );


remove_action( 'genesis_header', 'genesis_header_markup_open', 5 );
remove_action( 'genesis_header', 'genesis_do_header' );
remove_action( 'genesis_header', 'genesis_header_markup_close', 15 ) ;


remove_action('genesis_after_header','genesis_do_nav');
add_action('genesis_before_header','genesis_do_nav');




// Add Phone number after last Nav item
add_filter( 'genesis_nav_items', 'be_follow_icons', 10, 2 );
add_filter( 'wp_nav_menu_items', 'be_follow_icons', 10, 2 );

function be_follow_icons($menu, $args) {
	$args = (array)$args;
	if ( 'primary' !== $args['theme_location']  )
		return $menu;
	$follow = '<li id="follow" class="menu-item menu-item-type-post_type menu-item-object-page"><a href="#">651-439-0189</a></li>';
	return $menu . $follow;
}

add_filter( 'genesis_footer_creds_text', 'sp_footer_creds_text' );
function sp_footer_creds_text() {
	echo '<div class="creds"><p>';
	echo 'Copyright &copy; ';
	echo date('Y');
	echo ' &middot; <a href="#">JG Hause Construction</a> ';
	echo '</p></div>';
}

add_filter( 'genesis_pre_load_favicon', 'sp_favicon_filter' );
function sp_favicon_filter( $favicon_url ) {
	return 'http://www.jghause.com/wp-content/themes/'.get_stylesheet().'/images/favicon.ico';
}


//Register Widgets
genesis_register_sidebar( array(
	'id'            => 'project-spotlight',
	'name'          => __( 'Project Spotlight', 'jghause' ),
	'description'   => __( 'This is a widget area for project spotlight', 'jghause' ),
) );



