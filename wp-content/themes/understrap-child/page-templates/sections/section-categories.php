<?php

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

?>

<section class="categories">
    <div class="container-fluid">
        <div class="title text-right">קטגוריות</div>
        <ul class="categories-wrap">
            <?php
            foreach ($all_categories as $cat) {
                $thumbnail_id = get_woocommerce_term_meta($cat->term_id, 'thumbnail_id', true);
                $imageSrc = wp_get_attachment_url($thumbnail_id);
                if ($imageSrc) {
                    ?>
                    <li class="category-item">
                        <a href="<?= get_term_link($cat->slug, 'product_cat') ?>">
                            <img class="img-fluid" src="<?= $imageSrc ?>" alt="">
                            <h2>
                                <?= $cat->name ?>
                            </h2>
                        </a>
                    </li>
                <?php }
            } ?>
        </ul>
    </div>
</section>
