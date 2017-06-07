/**
 * Movelize Child Theme for Genesis.
 *
 * This file loads the theme's Javascript functions.
 * Put your custom Javascript here.
 *
 * @package Genesis Foundation
 * @author  Johann Kratzik
 * @license GPL-3.0+
 * @link    http://www.movelize.com/
 */


(function($) {
	
    //* Insert the title bar into the DOM
    $('.site-container').prepend(
        '<div class="title-bar hide-for-large mobile-toggle">' +
            '<div class="title-bar-left" data-toggle="mobile-nav">' +
                '<button class="menu-icon" type="button"></button>' +
            '</div>' +
        '</div>');
	
    //* Load the mobile navigation (see https://github.com/movelize/mobile-navigation for details)
    $('.mobile-toggle .menu-icon').movmnav({
        navAdd: '.menu-primary, .menu-secondary'
    });
	
})(jQuery);