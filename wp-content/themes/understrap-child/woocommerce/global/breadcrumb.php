<?php
/**
 * Shop breadcrumb
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/breadcrumb.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce/Templates
 * @version     2.3.0
 * @see         woocommerce_breadcrumb()
 */

if (!defined('ABSPATH')) {
    exit;
}

global $product;

if (!empty($breadcrumb)) {

    echo $wrap_before;

    if ($product) {
        $categories = $product->get_category_ids();
        $categoriesArr = array();

        if (count($categories) > 0) {
            foreach ($categories as $key => $cat) {
                if ($term = get_term_by('id', $cat, 'product_cat')) {
                    $term->name;
                    $link = get_term_link((int)$cat, 'product_cat');
                    $categoriesArr[] = array(
                        $term->name,
                        $link
                    );
                }
            }
        }
    }

    foreach ($breadcrumb as $key => $crumb) {

        echo $before;

        if ($key === 2 && $product) {
            foreach ($categoriesArr as $cat) {
                if (esc_html($cat[0]) !== $crumb[0]) {
                    echo '<a href="' . esc_url($cat[1]) . '">' . esc_html($cat[0]) . '</a>';
                    echo ',';
                }
            }
        }

        if (!empty($crumb[1]) && sizeof($breadcrumb) !== $key + 1) {
            echo '<a href="' . esc_url($crumb[1]) . '">' . esc_html($crumb[0]) . '</a>';
        } else {
            echo esc_html($crumb[0]);
        }

        echo $after;

        if (sizeof($breadcrumb) !== $key + 1) {
            echo $delimiter;
        }
    }

    echo $wrap_after;
}
