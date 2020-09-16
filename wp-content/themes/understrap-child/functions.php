<?php
/**
 * UnderStrap functions and definitions
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$understrap_includes = array(
    '/theme-settings.php',                  // Initialize theme default settings.
    '/setup.php',                           // Theme setup and custom theme supports.
    '/widgets.php',                         // Register widget area.
    '/enqueue.php',                         // Enqueue scripts and styles.
    '/template-tags.php',                   // Custom template tags for this theme.
    '/pagination.php',                      // Custom pagination for this theme.
    '/hooks.php',                           // Custom hooks.
    '/extras.php',                          // Custom functions that act independently of the theme templates.
    '/customizer.php',                      // Customizer additions.
    '/custom-comments.php',                 // Custom Comments file.
    '/jetpack.php',                         // Load Jetpack compatibility file.
    '/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker. Trying to get deeper navigation? Check out: https://github.com/understrap/understrap/issues/567.
    '/woocommerce.php',                     // Load WooCommerce functions.
    '/editor.php',                          // Load Editor functions.
    '/deprecated.php',                      // Load deprecated functions.
);

foreach ($understrap_includes as $file) {
    require_once get_template_directory() . '/inc' . $file;
}

add_filter('nav_menu_css_class', 'special_nav_class', 10, 2);
function special_nav_class($classes, $item)
{
    if (in_array('current-menu-item', $classes)) {
        $classes[] = 'active ';
    }
    return $classes;
}

add_filter('nav_menu_link_attributes', 'wpse156165_menu_add_class', 10, 3);

function wpse156165_menu_add_class($atts, $item, $args)
{
    if (in_array('current-menu-item', $item->classes)) {
        $class = 'nav-link products-link active';
        $atts['class'] = $class;
        return $atts;
    }

    $class = 'nav-link products-link hover-anim';
    $atts['class'] = $class;
    return $atts;
}

/**
 * Remove all possible fields
 **/
function wc_remove_checkout_fields($fields)
{
    // Billing fields
//    unset($fields['billing']['billing_company']);
//    unset($fields['billing']['billing_email']);
//    unset($fields['billing']['billing_phone']);
//    unset($fields['billing']['billing_state']);
//    unset($fields['billing']['billing_first_name']);
//    unset($fields['billing']['billing_last_name']);
//    unset($fields['billing']['billing_address_1']);
//    unset($fields['billing']['billing_address_2']);
//    unset($fields['billing']['billing_city']);
    unset($fields['billing']['billing_postcode']);
//
//    // Shipping fields
//    unset($fields['shipping']['shipping_company']);
//    unset($fields['shipping']['shipping_phone']);
//    unset($fields['shipping']['shipping_state']);
//    unset($fields['shipping']['shipping_first_name']);
//    unset($fields['shipping']['shipping_last_name']);
//    unset($fields['shipping']['shipping_address_1']);
//    unset($fields['shipping']['shipping_address_2']);
//    unset($fields['shipping']['shipping_city']);
//    unset($fields['shipping']['shipping_postcode']);
//
//    // Order fields
//    unset($fields['order']['order_comments']);
//
    unset($fields['billing']['billing_country']);
    unset($fields['shipping']['shipping_country']);

    return $fields;
}

add_filter('woocommerce_checkout_fields', 'wc_remove_checkout_fields');

add_action('wp_footer', 'check_cart');
if (!function_exists('check_cart')) {
    function check_cart()
    {
        global $woocommerce;
        $cartItems = $woocommerce->cart->cart_contents_count;
        ?>
        <script type='text/javascript'>
            jQuery(function ($) {
                var cartItems = <?= $cartItems ?>;
                var $cartInNav = $('#cart-number');
                var $cartInNavContainer = $('#cart-items-count');
                $cartInNav.text(cartItems);

                if (cartItems === 0) {
                    $cartInNavContainer.addClass('hide');
                    $cartInNav.text(0);
                } else {
                    $cartInNavContainer.removeClass('hide');
                }
            });
        </script>
        <?php
    }
}

add_action('wp_footer', 'update_by_qty_buttons_cart');

if (!function_exists('update_by_qty_buttons_cart')) {
    function update_by_qty_buttons_cart()
    {
        ?>
        <script type='text/javascript'>
            jQuery(function ($) {
                $('body').on('click', 'input.qty_button', function () {
                    $("[name='update_cart']").trigger("click");
                });
            });
        </script>
        <?php
    }
}
