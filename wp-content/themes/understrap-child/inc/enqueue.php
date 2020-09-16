<?php
/**
 * UnderStrap enqueue scripts
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

if (!function_exists('understrap_scripts')) {
    /**
     * Load theme's JavaScript and CSS sources.
     */
    function understrap_scripts()
    {
        // Get the theme data.
        $the_theme = wp_get_theme();
        $theme_version = $the_theme->get('Version');

        $css_version = $theme_version . '.' . filemtime(get_template_directory() . '/css/theme.min.css');
        wp_enqueue_style('understrap-styles', get_template_directory_uri() . '/css/theme.min.css', array(), $css_version);

        wp_enqueue_script('jquery');

        $js_version = $theme_version . '.' . filemtime(get_template_directory() . '/js/theme.min.js');
        wp_enqueue_script('understrap-scripts', get_template_directory_uri() . '/js/theme.min.js', array(), $js_version, true);
        if (is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }

        $js_version = $theme_version . '.' . filemtime(get_template_directory() . '/js/app.js');
        wp_enqueue_script('app-scripts', get_template_directory_uri() . '/js/app.js', array(), $js_version);

//        $js_version = $theme_version . '.' . filemtime(get_template_directory() . '/js/ajax-add-to-cart.js');
//        wp_enqueue_script('ajax-add-to-cart', get_template_directory_uri() . '/js/ajax-add-to-cart.js', array(), $js_version);

    }
} // End of if function_exists( 'understrap_scripts' ).

add_action('wp_enqueue_scripts', 'understrap_scripts');
