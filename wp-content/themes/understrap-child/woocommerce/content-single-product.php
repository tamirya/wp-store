<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;

if (post_password_required()) {
    echo get_the_password_form(); // WPCS: XSS ok.
    return;
}
woocommerce_breadcrumb();

?>
<div id="product-<?php the_ID(); ?>" class="container product-page">
    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col">
                    <div class="title text-right">
                        <h2><?= $product->get_name() ?></h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="price text-right mt-2">
                        <h5>
                            <?php echo $product->get_price_html(); ?>
                        </h5>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="description text-right mt-4">
                        <?= $product->get_description() ?>
                    </div>
                </div>
            </div>

            <div class="row mt-3 mb-4">
                <div class="col">
                    <?php
                    do_action('woocommerce_single_product_summary');
                    ?>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <?php
                    do_action('woocommerce_before_single_product');
                    ?>
                </div>
            </div>

        </div>

        <div class="col-md-5 mt-3">
            <?php
            /**
             * Hook: woocommerce_before_single_product_summary.
             *
             * @hooked woocommerce_show_product_sale_flash - 10
             * @hooked woocommerce_show_product_images - 20
             */
            do_action('woocommerce_before_single_product_summary');
            ?>
        </div>
    </div>
</div>