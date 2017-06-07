<?php
/**
 * Movelize Child Theme for Genesis.
 *
 * This file includes the main theme functions and useful snippets for developing a custom child theme.
 *
 * @package Genesis Foundation
 * @author  Johann Kratzik
 * @license GPL-3.0+
 * @link    http://www.movelize.com/
 */


add_action( 'wp_enqueue_scripts', 'movgf_enqueue_styles_scripts', 0 );
/**
 * Enqueue styles and scripts
 * With a priority of 0 so the CSS is loaded before the theme's style.css
 *
 * @since 1.0
 *
 */
function movgf_enqueue_styles_scripts() {
    
    //* Unregister Genesis Superfish scripts
    wp_deregister_script( 'superfish' );
    wp_deregister_script( 'superfish-args' );
    
    //* Load the Foundation CSS
    wp_enqueue_style( 'foundation-css', get_stylesheet_directory_uri() . '/css/foundation.min.css', array(), '6.3.1' );
    
    //* Load CSS for the mobile navigation
    wp_enqueue_style( 'movmnav-css', get_stylesheet_directory_uri() . '/css/movmnav.min.css', array(), '1.0.0' );
    
    //* Foundation Javascript is included in the theme but not loaded by default
    //wp_enqueue_script( 'foundation-js', get_stylesheet_directory_uri() . '/js/foundation.min.js', array( 'jquery' ), '6.3.1', true );
    
    //* Load Javascript for the mobile navigation
    wp_enqueue_script( 'movmnav-js', get_stylesheet_directory_uri() . '/js/jquery.movmnav.min.js', array( 'jquery' ), '1.0.0', true );
    
    //* Load the custom Javascript functions
    wp_enqueue_script( 'custom-js', get_stylesheet_directory_uri() . '/js/custom.js', array(), CHILD_THEME_VERSION, true );
    
}


//* Add support for 3 footer widgets
add_theme_support( 'genesis-footer-widgets', 3 );

//* Inserting the footer widgets
add_action( 'movgf_footer_widgets_output', 'mov_footer_widgets' );
/**
 * Example code to insert each footer widget manually.
 *
 * @since 1.0
 *
 */
function mov_footer_widgets() {
    if( is_active_sidebar( 'footer-1' ) ) {
        echo '<div class="small-12 medium-12 large-4 columns footer-widget footer-widget-1">';
            dynamic_sidebar( 'footer-1' );
        echo '</div>';
    }
    if( is_active_sidebar( 'footer-2' ) ) {
        echo '<div class="small-12 medium-6 large-4 columns footer-widget footer-widget-2">';
            dynamic_sidebar( 'footer-2' );
        echo '</div>';
    }
    if( is_active_sidebar( 'footer-3' ) ) {
        echo '<div class="small-12 medium-6 large-4 columns footer-widget footer-widget-3">';
            dynamic_sidebar( 'footer-3' );
        echo '</div>';
    }
}


//* Example: Unregister Genesis layout settings (uncomment if needed)
//genesis_unregister_layout( 'content-sidebar-sidebar' );
//genesis_unregister_layout( 'sidebar-sidebar-content' );
//genesis_unregister_layout( 'sidebar-content-sidebar' );

//* Example: Unregister the secondary sidebar (uncomment if needed)
//unregister_sidebar( 'sidebar-alt' );

//* Example: Filter the footer output
add_filter( 'genesis_footer_output', 'movgf_footer_output' );
function movgf_footer_output( $creds_text ) {
    return '<div class="column">' . $creds_text . '</div>';
}

//* Example: Unset page templates
add_filter( 'theme_page_templates', 'movgf_unset_genesis_page_templates' );
function movgf_unset_genesis_page_templates( $page_templates ) {
    unset( $page_templates['page_archive.php'] );
    unset( $page_templates['page_blog.php'] );
    return $page_templates;
}

//* Example: Remove the Blog Page theme settings meta box
add_action( 'genesis_theme_settings_metaboxes', 'movgf_remove_metaboxes' );
function movgf_remove_metaboxes( $_genesis_theme_settings_pagehook ) {
    remove_meta_box( 'genesis-theme-settings-blogpage', $_genesis_theme_settings_pagehook, 'main' );
}
?>