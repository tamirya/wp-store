<?php
/**
 * Add WooCommerce support
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

add_action('after_setup_theme', 'understrap_woocommerce_support');
if (!function_exists('understrap_woocommerce_support')) {
    /**
     * Declares WooCommerce theme support.
     */
    function understrap_woocommerce_support()
    {
        add_theme_support('woocommerce');

        // Add Product Gallery support.
        add_theme_support('wc-product-gallery-lightbox');
        add_theme_support('wc-product-gallery-zoom');
        add_theme_support('wc-product-gallery-slider');

        // Add Bootstrap classes to form fields.
        add_filter('woocommerce_form_field_args', 'understrap_wc_form_field_args', 10, 3);
    }
}

// First unhook the WooCommerce content wrappers.
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

// Then hook in your own functions to display the wrappers your theme requires.
add_action('woocommerce_before_main_content', 'understrap_woocommerce_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'understrap_woocommerce_wrapper_end', 10);
if (!function_exists('understrap_woocommerce_wrapper_start')) {
    /**
     * Display the theme specific start of the page wrapper.
     */
    function understrap_woocommerce_wrapper_start()
    {
        $container = get_theme_mod('understrap_container_type');
        echo '<div class="wrapper" id="woocommerce-wrapper">';
        echo '<div class="' . esc_attr($container) . '" id="content" tabindex="-1">';
        echo '<div class="row">';
        get_template_part('global-templates/left-sidebar-check');
        echo '<main class="site-main" id="main">';
    }
}
if (!function_exists('understrap_woocommerce_wrapper_end')) {
    /**
     * Display the theme specific end of the page wrapper.
     */
    function understrap_woocommerce_wrapper_end()
    {
        echo '</main><!-- #main -->';
        get_template_part('global-templates/right-sidebar-check');
        echo '</div><!-- .row -->';
        echo '</div><!-- Container end -->';
        echo '</div><!-- Wrapper end -->';
    }
}
if (!function_exists('understrap_wc_form_field_args')) {
    /**
     * Filter hook function monkey patching form classes
     * Author: Adriano Monecchi http://stackoverflow.com/a/36724593/307826
     *
     * @param string $args Form attributes.
     * @param string $key Not in use.
     * @param null $value Not in use.
     *
     * @return mixed
     */
    function understrap_wc_form_field_args($args, $key, $value = null)
    {
        // Start field type switch case.
        switch ($args['type']) {
            // Targets all select input type elements, except the country and state select input types.
            case 'select':
                /*
                 * Add a class to the field's html element wrapper - woocommerce
                 * input types (fields) are often wrapped within a <p></p> tag.
                 */
                $args['class'][] = 'form-group';
                // Add a class to the form input itself.
                $args['input_class'] = array('form-control');
                // Add custom data attributes to the form input itself.
                $args['custom_attributes'] = array(
                    'data-plugin' => 'select2',
                    'data-allow-clear' => 'true',
                    'aria-hidden' => 'true',
                );
                break;
            /*
             * By default WooCommerce will populate a select with the country names - $args
             * defined for this specific input type targets only the country select element.
             */
            case 'country':
                $args['class'][] = 'form-group single-country';
                break;
            /*
             * By default WooCommerce will populate a select with state names - $args defined
             * for this specific input type targets only the country select element.
             */
            case 'state':
                $args['class'][] = 'form-group';
                $args['custom_attributes'] = array(
                    'data-plugin' => 'select2',
                    'data-allow-clear' => 'true',
                    'aria-hidden' => 'true',
                );
                break;
            case 'password':
            case 'text':
            case 'email':
            case 'tel':
            case 'number':
                $args['class'][] = 'form-group';
                $args['input_class'] = array('form-control');
                break;
            case 'textarea':
                $args['input_class'] = array('form-control');
                break;
            case 'checkbox':
                // Add a class to the form input's <label> tag.
                $args['label_class'] = array('custom-control custom-checkbox');
                $args['input_class'] = array('custom-control-input');
                break;
            case 'radio':
                $args['label_class'] = array('custom-control custom-radio');
                $args['input_class'] = array('custom-control-input');
                break;
            default:
                $args['class'][] = 'form-group';
                $args['input_class'] = array('form-control');
                break;
        } // End of switch ( $args ).
        return $args;
    }
}
if (!is_admin() && !function_exists('wc_review_ratings_enabled')) {
    /**
     * Check if reviews are enabled.
     *
     * Function introduced in WooCommerce 3.6.0., include it for backward compatibility.
     *
     * @return bool
     */
    function wc_reviews_enabled()
    {
        return 'yes' === get_option('woocommerce_enable_reviews');
    }

    /**
     * Check if reviews ratings are enabled.
     *
     * Function introduced in WooCommerce 3.6.0., include it for backward compatibility.
     *
     * @return bool
     */
    function wc_review_ratings_enabled()
    {
        return wc_reviews_enabled() && 'yes' === get_option('woocommerce_enable_review_rating');
    }
}

//add_action('wp_enqueue_scripts', 'woocommerce_ajax_add_to_cart_js', 99);
//add_action('wp_ajax_woocommerce_ajax_add_to_cart', 'woocommerce_ajax_add_to_cart');
//add_action('wp_ajax_nopriv_woocommerce_ajax_add_to_cart', 'woocommerce_ajax_add_to_cart');

// Ajax add to cart for products
//function woocommerce_ajax_add_to_cart_js()
//{
//    if (function_exists('is_product') && is_product()) {
//        wp_enqueue_script('woocommerce-ajax-add-to-cart', plugin_dir_url(__FILE__) . 'assets/ajax-add-to-cart.js', array('jquery'), '', true);
//    }
//}

//function woocommerce_ajax_add_to_cart()
//{
//    $product_id = apply_filters('woocommerce_add_to_cart_product_id', absint($_POST['product_id']));
//    $quantity = empty($_POST['quantity']) ? 1 : wc_stock_amount($_POST['quantity']);
//    $variation_id = absint($_POST['variation_id']);
//    $passed_validation = apply_filters('woocommerce_add_to_cart_validation', true, $product_id, $quantity);
//    $product_status = get_post_status($product_id);
//
//    if ($passed_validation && WC()->cart->add_to_cart($product_id, $quantity, $variation_id) && 'publish' === $product_status) {
//
//        do_action('woocommerce_ajax_added_to_cart', $product_id);
//
//        if ('yes' === get_option('woocommerce_cart_redirect_after_add')) {
//            wc_add_to_cart_message(array($product_id => $quantity), true);
//        }
//
//        WC_AJAX:: get_refreshed_fragments();
//    } else {
//
//        $data = array(
//            'error' => true,
//            'product_url' => apply_filters('woocommerce_cart_redirect_after_error', get_permalink($product_id), $product_id));
//
//        echo wp_send_json($data);
//    }
//
//    wp_die();
//}

add_action('wp_footer', 'custom_quantity_fields_script');
function custom_quantity_fields_script()
{
    ?>
    <script type='text/javascript'>
        jQuery(function ($) {
            if (!String.prototype.getDecimals) {
                String.prototype.getDecimals = function () {
                    var num = this,
                        match = ('' + num).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
                    if (!match) {
                        return 0;
                    }
                    return Math.max(0, (match[1] ? match[1].length : 0) - (match[2] ? +match[2] : 0));
                }
            }
            // Quantity "plus" and "minus" buttons
            $(document.body).on('click', '.plus, .minus', function () {
                var $qty = $(this).closest('.quantity').find('.qty'),
                    currentVal = parseFloat($qty.val()),
                    max = parseFloat($qty.attr('max')),
                    min = parseFloat($qty.attr('min')),
                    step = $qty.attr('step');

                // Format values
                if (!currentVal || currentVal === '' || currentVal === 'NaN') currentVal = 0;
                if (max === '' || max === 'NaN') max = '';
                if (min === '' || min === 'NaN') min = 0;
                if (step === 'any' || step === '' || step === undefined || parseFloat(step) === 'NaN') step = 1;

                // Change the value
                if ($(this).is('.plus')) {
                    if (max && (currentVal >= max)) {
                        $qty.val(max);
                    } else {
                        $qty.val((currentVal + parseFloat(step)).toFixed(step.getDecimals()));
                    }
                } else {
                    if (min && (currentVal <= min)) {
                        $qty.val(min);
                    } else if (currentVal > 0) {
                        $qty.val((currentVal - parseFloat(step)).toFixed(step.getDecimals()));
                    }
                }

                // Trigger change event
                $qty.trigger('change');
            });
        });
    </script>
    <?php
}