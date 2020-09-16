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
$menuLocations = get_nav_menu_locations(); // Get our nav locations (set in our theme, usually functions.php)
// This returns an array of menu locations ([LOCATION_NAME] = MENU_ID);
$menuID = $menuLocations['primary']; // Get the *primary* menu ID
$primaryNav = wp_get_nav_menu_items($menuID);
?>


<nav id="navbar" class="navbar navbar-expand-lg navbar-light fixed-top">
    <a class="navbar-brand" href="<?= get_site_url() ?>">
        <img src="<?= get_template_directory_uri() ?>/img/logo_mobile.png" id="logo-mobile">
        <img src="<?= get_template_directory_uri() ?>/img/logo.png" id="logo-desktop">
    </a>

    <div class="right-side-menu-mobile">
        <div class="row">
            <div class="col order-3 pl-1">
                <button class="navbar-toggler" type="button"
                        data-toggle="collapse"
                        data-target="#navbarCollapseMobile"
                        aria-controls="navbarCollapseMobile"
                        aria-expanded="false">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </button>
            </div>

            <div class="col order-1 pr-1">
                <div class="icon-mobile">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                </div>
            </div>

            <div class="col order-2 pr-1">
                <div class="icon-mobile">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav">
            <li class="nav-item products-link-li">
                <a class="nav-link products-link hover-anim" href="#">
                    מוצרים
                    <span class="sr-only">(current)</span>
                    <span class="icon">
                        <i class="fa fa-angle-down" aria-hidden="true"></i>
                    </span>
                </a>
                <div id="products-items" class="fade-in">
                    <ul>
                        <li>
                            <a href="<?= get_site_url() ?>/products">
                                <div class="products-item-img">
                                    <img class="img-thumbnail"
                                         src="<?= get_template_directory_uri() ?>/img/all-products.jpg" alt="">
                                </div>
                                <div class="text-center products-item-title p-2">כל המוצרים</div>
                            </a>
                        </li>

                        <?php
                        foreach ($all_categories as $cat) {
                            $thumbnail_id = get_woocommerce_term_meta($cat->term_id, 'thumbnail_id', true);
                            $imageSrc = wp_get_attachment_url($thumbnail_id);
                            if ($imageSrc) {
                                ?>

                                <li>
                                    <a href="<?= get_term_link($cat->slug, 'product_cat') ?>">
                                        <div class="products-item-img">
                                            <img class="img-thumbnail"
                                                 src="<?= $imageSrc ?>" alt="">
                                        </div>
                                        <div class="text-center products-item-title p-2">
                                            <?= $cat->name ?>
                                        </div>
                                    </a>
                                </li>
                            <?php }
                        } ?>
                    </ul>
                </div>
            </li>

            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'primary',
                    'container_class' => 'nav-item products-link-li',
                    'container_id' => 'navbarNavDropdown',
                    'menu_class' => 'navbar-nav ml-auto',
                    'fallback_cb' => '',
                    'items_wrap' => '%3$s',
                    'container' => false,
                )
            );

            ?>
            <!--            <li class="nav-item">-->
            <!--                <a class="nav-link hover-anim" href="#">-->
            <!--                    מועדון לקוחות-->
            <!--                </a>-->
            <!--            </li>-->
            <!--            <li class="nav-item">-->
            <!--                <a class="nav-link hover-anim" href="#">-->
            <!--                    כשרות-->
            <!--                </a>-->
            <!--            </li>-->
            <!--            <li class="nav-item">-->
            <!--                <a class="nav-link hover-anim" href="#">-->
            <!--                    דרושים-->
            <!--                </a>-->
            <!--            </li>-->
            <!--            <li class="nav-item">-->
            <!--                <a class="nav-link hover-anim" href="#">-->
            <!--                    סניפים וצרו קשר-->
            <!--                </a>-->
            <!--            </li>-->
            <!--            <li class="nav-item">-->
            <!--                <a class="nav-link hover-anim gift-card-btn" href="#">-->
            <!--                    Gift Card-->
            <!--                </a>-->
            <!--            </li>-->
            <!--            <li class="nav-item">-->
            <!--                <a class="nav-link hover-anim" href="--><? //= get_site_url() ?><!--/my-account">-->
            <!--                    החשבון שלי-->
            <!--                </a>-->
            <!--            </li>-->
            <li class="nav-item">
                <a class="nav-link" href="<?= get_site_url() ?>/cart">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    <span id="cart-items-count" class="hide">
                        <span id="cart-number">0</span>
                    </span>
                </a>
            </li>
            <!--            <li class="nav-item">-->
            <!--                <a class="nav-link" href="#">-->
            <!--                    <i class="fa fa-search" aria-hidden="true"></i>-->
            <!--                </a>-->
            <!--            </li>-->
        </ul>
    </div>
</nav>
<div class="collapse navbar-collapse"
     id="navbarCollapseMobile">
    <ul class="navbar-nav">
        <li class="nav-item products-link-li">
            <a class="nav-link text-center"
               data-toggle="collapse"
               data-target="#sub-menu"
               aria-expanded="false"
               aria-controls="sub-menu"
               href="#">
                <div class="title">
                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                    מוצרים
                </div>
            </a>
            <div class="collapse" id="sub-menu">
                <ul class="navbar-nav" id="sub-menu-categories">
                    <li class="nav-item">
                        <a href="#" class="nav-link text-center">
                            - כל המוצרים
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-center">
                            - גבינה
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-center">
                            - בריאות
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-center">
                            - שוקולד
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-center">
                            - עוגות פס
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-center">
                            - שמרים
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-center">
                            - בחושות
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-center">
                            - מלוחים
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-center">
                            - עוגיות
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-center">
                            - בורקסים
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link text-center" href="#">אודות</a>
        </li>

        <li class="nav-item">
            <a class="nav-link text-center" href="#">מועדון לקוחות</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-center" href="#">
                כשרות
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link text-center" href="#">
                דרושים
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link text-center" href="#">
                סניפים וצרו קשר
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-center gift-card-btn" href="#">
                Gift Card
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-center" href="#">
                החשבון שלי
            </a>
        </li>
    </ul>
</div>
<div id="nav-holder"></div>