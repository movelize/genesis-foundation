<?php
/**
 * Movelize Child Theme for Genesis.
 *
 * The functions in this file are modifying the Genesis HTML markup in order to add Foundation CSS class names.
 * You can change the class names in this file or overwrite the original Genesis filters in functions.php
 *
 * @package Genesis Foundation
 * @author  Johann Kratzik
 * @license GPL-3.0+
 * @link    http://www.movelize.com/
 */


add_filter( 'genesis_attr_structural-wrap', 'movgf_attr_structural_wrap' );
add_filter( 'genesis_attr_content-sidebar-wrap', 'movgf_attr_content_sidebar_wrap' );
/**
 * Filters the CSS class for the main containers.
 *
 * The 2 functions add the Foundation "row" class to the wrapping elements inside:
 *   .site-header
 *   .nav-primary
 *   .nav-secondary
 *   .content-sidebar-wrap
 *   .footer-widgets
 *   .site-footer
 *
 * @since 1.0
 *
 * Uses mov_container_class()
 *
 * Reference: genesis/lib/functions/markup.php
 */
function movgf_attr_structural_wrap( $attributes ) {
	
    $attributes['class'] = 'row wrap';
	
    return $attributes;
	
}
function movgf_attr_content_sidebar_wrap( $attributes ) {
	
    $attributes['class'] = 'row content-sidebar-wrap';
	
    return $attributes;
	
}


add_filter( 'genesis_attr_title-area', 'movgf_attr_title_area' );
/**
 * Filters the CSS class for the title area.
 * Adds Foundation grid class names.
 *
 * @since 1.0
 *
 * Reference: genesis/lib/functions/markup.php
 */
function movgf_attr_title_area( $attributes ) {

    global $wp_registered_sidebars;

    if ( ( isset( $wp_registered_sidebars['header-right'] ) && is_active_sidebar( 'header-right' ) ) || has_action( 'genesis_header_right' ) ) {
        $attributes['class'] = 'small-12 medium-6 columns text-center medium-text-left title-area';
    }
    else {
        $attributes['class'] = 'small-12 columns text-center title-area';
    }

    return $attributes;
	
}


add_filter( 'genesis_attr_header-widget-area', 'movgf_attr_header_widget_area' );
/**
 * Filters the CSS class for the header widget area.
 * Adds Foundation grid class names.
 *
 * @since 1.0
 *
 * Reference: genesis/lib/functions/markup.php
 */
function movgf_attr_header_widget_area( $attributes ) {

    $attributes['class'] = 'small-12 medium-6 columns widget-area header-widget-area';
    
    return $attributes;

}


add_filter( 'genesis_attr_nav-primary', 'movgf_attr_nav_primary' );
add_filter( 'genesis_attr_nav-secondary', 'movgf_attr_nav_secondary' );
/**
 * Filters the CSS classes for the primary and secondary navigations.
 * Adds Foundation class names to hide the navigations on small and medium screens.
 *
 * @since 1.0
 *
 * Reference: genesis/lib/functions/markup.php
 */
function movgf_attr_nav_primary( $attributes ) {
	
    $attributes['class'] = 'nav-primary show-for-large';
    
    return $attributes;
	
}
function movgf_attr_nav_secondary( $attributes ) {
	
    $attributes['class'] = 'nav-secondary show-for-large';
    
    return $attributes;
	
}


add_filter( 'wp_nav_menu_args', 'movgf_nav_menu_args' );
/**
 * Filter the CSS classes for the primary and secondary navigation lists.
 * Adds Foundation grid classes.
 *
 * @since 1.0
 *
 * Reference: https://codex.wordpress.org/Plugin_API/Filter_Reference/wp_nav_menu_args
 */
function movgf_nav_menu_args( $args ) {
	
    if( 'primary' == $args['theme_location'] ) {
        $args['menu_class'] = 'small-12 columns genesis-nav-menu menu-primary';
    }
    if( 'secondary' == $args['theme_location'] ) {
        $args['menu_class'] = 'small-12 columns genesis-nav-menu menu-secondary';
    }
	
    return $args;
	
}


/**
 * Moves the secondary sidebar inside the "content-sidebar-wrap" container.
 * The primary and secondary sidebars are positioned with Foundation "order" CSS classes below.
 *
 * @since 1.0
 *
 * Reference: genesis/lib/framework.php
 */
remove_action( 'genesis_after_content_sidebar_wrap', 'genesis_get_sidebar_alt' );
add_action( 'genesis_after_content', 'genesis_get_sidebar_alt' );


add_filter( 'genesis_attr_content', 'movgf_attr_content' );
/**
 * Filters the CSS classes for the content section.
 * Adds Foundation grid classes for different layout settings.
 *
 * @since 1.0
 *
 * Reference: genesis/lib/functions/markup.php - genesis/lib/functions/layout.php
 */
function movgf_attr_content( $attributes ) {
	
    $layout = genesis_site_layout();
	
    if( 'content-sidebar' == $layout ) {
        $column_class ='small-12 medium-7 large-8';
    }
    if( 'sidebar-content' == $layout ) {
        $column_class = 'small-12 medium-7 large-8 medium-order-2';
    }
    if( 'content-sidebar-sidebar' == $layout ) {
        $column_class = 'small-12 medium-12 large-7';
    }
    if( 'sidebar-sidebar-content' == $layout ) {
        $column_class = 'small-12 medium-12 large-7 large-order-3';
    }
    if( 'sidebar-content-sidebar' == $layout ) {
        $column_class = 'small-12 medium-12 large-7 large-order-2';
    }
    if( 'full-width-content' == $layout ) {
        $column_class = 'small-12';
    }
	
    $attributes['class'] = $column_class . ' columns content';
	
    return $attributes;
	
}


add_filter( 'genesis_attr_sidebar-primary', 'movgf_attr_sidebar_primary' );
/**
 * Filters the CSS classes for the primary sidebar.
 * Adds Foundation grid classes for different layout settings.
 *
 * @since 1.0
 *
 * Reference: genesis/lib/functions/markup.php - genesis/lib/functions/layout.php
 */
function movgf_attr_sidebar_primary( $attributes ) {
	
    $layout = genesis_site_layout();
	
    if( 'content-sidebar' == $layout ) {
        $column_class = 'medium-5 large-4';
    }
    if( 'sidebar-content' == $layout ) {
        $column_class = 'medium-5 large-4 medium-order-1';
    }
    if( 'content-sidebar-sidebar' == $layout ) {
        $column_class = 'small-12 medium-6 large-3';
    }
    if( 'sidebar-sidebar-content' == $layout ) {
        $column_class = 'small-12 medium-6 large-3 large-order-1';
    }
    if( 'sidebar-content-sidebar' == $layout ) {
        $column_class = 'small-12 medium-6 large-3 large-order-1';
    }
	
    $attributes['class'] = $column_class . ' columns sidebar sidebar-primary widget-area';
	
    return $attributes;
	
}


add_filter( 'genesis_attr_sidebar-secondary', 'movgf_attr_sidebar_secondary' );
/**
 * Filters the CSS classes for the secndary sidebar.
 * Adds Foundation grid classes for different layout settings.
 *
 * @since 1.0
 *
 * Reference: genesis/lib/functions/markup.php - genesis/lib/functions/layout.php
 */
function movgf_attr_sidebar_secondary( $attributes ) {
	
    $layout = genesis_site_layout();
	
    if( 'content-sidebar-sidebar' == $layout ) {
        $column_class = 'small-12 medium-6 large-2';
    }
    if( 'sidebar-sidebar-content' == $layout ) {
        $column_class = 'small-12 medium-6 large-2 medium-order-2';
    }
    if( 'sidebar-content-sidebar' == $layout ) {
        $column_class = 'small-12 medium-6 large-2 medium-order-3';
    }
    
    $attributes['class'] = $column_class . ' columns sidebar sidebar-secondary widget-area';
	
    return $attributes;
	
}


add_filter( 'genesis_footer_widget_areas', 'movgf_footer_widget_areas' );
/**
 * Filters the footer widget area because with the Genesis function it's not possible to apply Foundation grid classes to the widgets dynamically in a proper way.
 * Defines an action to insert the footer widgets.
 *
 * See usage example code in functions.php
 *
 * @since 1.0
 *
 * Reference: genesis/lib/structure/footer.php
 */
function movgf_footer_widget_areas( $output ) {
	
    genesis_markup( array(
        'html5'   => '<div %s>' . genesis_sidebar_title( 'Footer' ),
        'xhtml'   => '<div id="footer-widgets" class="footer-widgets">',
        'context' => 'footer-widgets'
	) );
    echo genesis_structural_wrap( 'footer-widgets', 'open', 0 );
	
    do_action( 'movgf_footer_widgets_output' );
		
    echo genesis_structural_wrap( 'footer-widgets', 'close', 0 );
    echo '</div>';
	
}


add_filter( 'embed_oembed_html', 'movgf_embed_oembed_html', 0, 2 );
/**
 * Filters the WordPress embed output for Youtube and Vimeo videos.
 * Adds Foundation class to the rendered HTML.
 *
 * @since 1.0
 *
 * Reference: wp-includes/post-template.php
 */
function movgf_embed_oembed_html( $html, $url ) {
	
    if( preg_match( '/youtube/', $url ) || preg_match( '/vimeo/', $url ) ) {
        $output = '<div class="flex-video widescreen">' . $html . '</div>';
    }
    else {
        $output = $html;
    }
	
    return $output;
	
}


add_filter( 'the_password_form', 'movgf_password_form' );
/**
 * Filters the WordPress post pasword form
 * Adds Foundation classes to the form elements.
 *
 * See usage example code in functions.php
 *
 * @since 1.0
 *
 * Reference: wp-includes/post-template.php
 */
function movgf_password_form( $post = 0 ) {
	
    $post = get_post( $post );
    $label = 'pwbox-' . ( empty($post->ID) ? rand() : $post->ID );
	
    $output = '<p>' . __( 'This content is password protected. To view it please enter your password below:' ) . '</p>';
    $output .= '
        <form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" class="post-password-form" method="post">
            <label for="' . $label . '">' . __( 'Password:' ) . '</label>
            <p class="input-group">
                <input name="post_password" id="' . $label . '" type="password" size="20" class="input-group-field">
                <input type="submit" name="Submit" value="' . esc_attr_x( 'Enter', 'post password form' ) . '" class="input-group-button">
            </p>
        </form>';
		
    return $output;
	
}
?>