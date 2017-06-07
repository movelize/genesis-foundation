<?php
/**
 * Movelize Child Theme for Genesis.
 *
 * The theme's mail functions.
 *
 * @package Genesis Foundation
 * @author  Johann Kratzik
 * @license GPL-3.0+
 * @link    http://www.movelize.com/
 */


//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Include other functions
include_once( get_stylesheet_directory() . '/inc/markup.php' );
include_once( get_stylesheet_directory() . '/inc/theme-functions.php' );

//* Set Localization
add_action( 'after_setup_theme', 'movgf_localization_setup' );
function movgf_localization_setup(){
    load_child_theme_textdomain( 'movgf', get_stylesheet_directory() . '/languages' );
}

//* Child theme info
define( 'CHILD_THEME_NAME', 'Genesis Foundation' );
define( 'CHILD_THEME_URL', 'http://movelize.com/genesis-foundation' );
define( 'CHILD_THEME_VERSION', '1.0' );

//* Add HTML5 markup structure
add_theme_support( 'html5', array( 'caption', 'comment-form', 'comment-list', 'gallery', 'search-form' ) );

//* Add accessibility support
add_theme_support( 'genesis-accessibility', array( '404-page', 'drop-down-menu', 'headings', 'rems', 'search-form', 'skip-links' ) );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

//* Add support for after entry widget.
add_theme_support( 'genesis-after-entry-widget-area' );
?>