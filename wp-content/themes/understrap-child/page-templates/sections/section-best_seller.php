<?php
$args = array(
    'post_type' => 'product',
    'meta_key' => 'total_sales',
    'orderby' => 'meta_value_num',
    'posts_per_page' => 1,
);
$loop = new WP_Query($args);
wp_reset_query();

/*
 * while ( $loop->have_posts() ) : $loop->the_post();
    global $product; ?>
    <div>
        <a href="<?php the_permalink(); ?>" id="id-<?php the_id(); ?>" title="<?php the_title(); ?>">

            <?php if (has_post_thumbnail( $loop->post->ID ))
                echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog');
            else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="product placeholder Image" width="65px" height="115px" />'; ?>

            <h3><?php the_title(); ?></h3>
        </a>
    </div>
<?php endwhile; ?>
 *
 * */

?>

<section class="best_seller w-100">
    <div class="container-fluid">
        <div class="title text-right">
            הנמכרים
            <span>
                ביותר
            </span>
        </div>
        <ul class="products-wrap">
            <li class="product-item">
                <a href="#">
                    <span class="onsale">במבצע</span>
                    <img class="img-fluid" src="<?= get_template_directory_uri() ?>/img/felorntin-tivoni.jpg" alt="">
                    <div class="text-center mt-3 product-title">
                        עוגת היער השחור טבעונית
                    </div>
                    <div dir="rtl" class="text-center price">
                        59.90 ש"ח-150.00 ש"ח
                    </div>
                </a>
                <a href="#" class="btn btn-custom pick-option mt-3">
                    בחר אפשרויות
                </a>
            </li>
            <li class="product-item">
                <a href="#">
                    <img class="img-fluid" src="<?= get_template_directory_uri() ?>/img/felorntin-tivoni.jpg" alt="">
                    <div class="text-center mt-3 product-title">
                        פלורנטין טבעוני
                    </div>
                    <div dir="rtl" class="text-center price">
                        59.90 ש"ח
                    </div>
                </a>
                <a href="#" class="btn btn-custom mt-3">
                    הוספה לסל
                </a>
            </li>
            <li class="product-item">
                <a href="#">
                    <img class="img-fluid" src="<?= get_template_directory_uri() ?>/img/kranch-shokolod.jpg" alt="">
                    <div class="text-center mt-3 product-title">
                        קראנץ שוקולד
                    </div>
                    <div dir="rtl" class="text-center price">
                        39.00 ש"ח
                    </div>
                </a>
                <a href="#" class="btn btn-custom mt-3">
                    הוספה לסל
                </a>
            </li>
            <li class="product-item">
                <span class="onsale">במבצע</span>
                <a href="#">
                    <img class="img-fluid" src="<?= get_template_directory_uri() ?>/img/ogat-freeo-roshe.jpg" alt="">
                    <div class="text-center mt-3 product-title">
                        עוגת פררו רושה
                    </div>
                    <div dir="rtl" class="text-center price">
                        59.90 ש"ח-150.00 ש"ח
                    </div>
                </a>
                <a href="#" class="btn btn-custom pick-option mt-3">
                    בחר אפשרויות
                </a>
            </li>
            <li class="product-item">
                <a href="#">
                    <span class="onsale">במבצע</span>
                    <img class="img-fluid" src="<?= get_template_directory_uri() ?>/img/ogat-kevina-and-alfahores.jpg"
                         alt="">
                    <div class="text-center mt-3 product-title">
                        עוגת גבינה ואלפחורס
                    </div>
                    <div dir="rtl" class="text-center price">110.00 ש"ח</div>
                </a>
                <a href="#" class="btn btn-custom mt-3">
                    הוספה לסל
                </a>
            </li>
            <li class="product-item">
                <a href="#">
                    <img class="img-fluid" src="<?= get_template_directory_uri() ?>/img/kinder-special.png" alt="">
                    <div class="text-center mt-3 product-title">
                        קינדר ספיישל
                    </div>
                    <div dir="rtl" class="text-center price">168.00 ש"ח</div>
                </a>
                <a href="#" class="btn btn-custom mt-3">
                    הוספה לסל
                </a>
            </li>
        </ul>
    </div>
</section>