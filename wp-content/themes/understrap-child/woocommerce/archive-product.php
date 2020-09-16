<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined('ABSPATH') || exit;
$taxonomy = 'product_cat';
$orderby = '';
$show_count = 0;      // 1 for yes, 0 for no
$pad_counts = 0;      // 1 for yes, 0 for no
$hierarchical = 1;      // 1 for yes, 0 for no
$title = '';
$empty = 0;

$args = array(
    'taxonomy' => $taxonomy,
    'orderby' => $orderby,
    'show_count' => $show_count,
    'pad_counts' => $pad_counts,
    'hierarchical' => $hierarchical,
    'title_li' => $title,
    'hide_empty' => $empty
);
$all_categories = get_categories($args);
array_shift($all_categories);

$categoryTitle = woocommerce_page_title(false);
get_header();
woocommerce_breadcrumb();
?>
    <section class="cat-page">
        <div class="title text-center">
            <?= $categoryTitle ?>
            <span>שלנו</span>
        </div>

        <div class="container-fluid mt-4 p-0">
            <?php //do_action('woocommerce_before_cart'); ?>
            <div class="row">
                <div class="col-md-10 p-0">
                    <ul class="products-wrap">
                        <?php
                        if (woocommerce_product_loop()) {
                            if (wc_get_loop_prop('total')) {
                                while (have_posts()) {
                                    the_post();
                                    global $product;
                                    if ($product) {
                                        ?>
                                        <li class="product-item">
                                            <?php if ($product->is_on_sale()) : ?>
                                                <?php echo apply_filters('woocommerce_sale_flash', '<span class="onsale">' . esc_html__('Sale!', 'woocommerce') . '</span>', $post, $product); ?>
                                            <?php
                                            endif;
                                            ?>
                                            <a href="<?= get_permalink($product->get_id()) ?>">
                                                <?= $product->get_image() ?>
                                                <div class="product-title mt-2">
                                                    <?= $product->name ?>
                                                </div>
                                                <div class="product-price">
                                                    <?php echo $product->get_price_html(); ?>
                                                </div>

                                                <div id="loading-<?= $product->get_id() ?>"
                                                     class="loading-block hide">
                                                    <i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i>
                                                </div>
                                                <div id="added-<?= $product->get_id() ?>" class="added-block hide">
                                                    <i class="fa fa-check fa-3x fa-fw"></i>
                                                </div>

                                                <div class="add-to-cart mt-2">
                                                    <?php
                                                    do_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart');
                                                    ?>
                                                </div>
                                            </a>
                                        </li>
                                        <?php
                                    }
                                }
                            }
                        }
                        ?>
                    </ul>
                </div>
                <div class="col-md-2 p-0">
                    <aside class="list-categories">
                        <h4 id="heading">
                            קטגוריות
                        </h4>
                        <ul>
                            <?php
                            foreach ($all_categories as $cat) {
                                $thumbnail_id = get_woocommerce_term_meta($cat->term_id, 'thumbnail_id', true);
                                $imageSrc = wp_get_attachment_url($thumbnail_id);
                                if (!$imageSrc) {
                                    ?>
                                    <li class="category-item">
                                        <a class="<?= $cat->name === $categoryTitle ? 'active' : '' ?>"
                                           href="<?= get_term_link($cat->slug, 'product_cat') ?>">
                                            <div class="category-title">
                                                <?= $cat->name ?>
                                            </div>
                                        </a>
                                    </li>
                                    <hr>
                                <?php }
                            } ?>

                            <?php
                            foreach ($all_categories as $cat) {
                                $thumbnail_id = get_woocommerce_term_meta($cat->term_id, 'thumbnail_id', true);
                                $imageSrc = wp_get_attachment_url($thumbnail_id);
                                if ($imageSrc) {
                                    ?>
                                    <li class="category-item">
                                        <a class="<?= $cat->name === $categoryTitle ? 'active' : '' ?>"
                                           href="<?= get_term_link($cat->slug, 'product_cat') ?>">
                                            <div class="category-title">
                                                <?= $cat->name ?>
                                            </div>
                                        </a>
                                    </li>
                                    <hr>
                                <?php }
                            } ?>
                        </ul>
                    </aside>
                </div>
            </div>
        </div>
    </section>
<?php
get_footer();
?>