<?php
/**
 * The template for displaying the header
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ThemeHunk
 * @subpackage Top Store
 * @since 1.0.0
 * 
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="theme-color" content="<?php echo esc_attr(get_theme_mod('top_store_mobile_header_clr','#fff')); ?>" />
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php echo esc_url(bloginfo( 'pingback_url' )); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class();?>>
	<?php wp_body_open();?>	
<?php 
$classes = '';
if(is_page_template( 'page-contact.php' ) || is_page_template( 'page-faq.php' ) ||is_page_template( 'page-aboutus.php' )){
$classes = 'no-sidebar';
}
elseif(!is_404() && !is_search() && is_page()){ 
	$page_post_meta_sidebar = get_post_meta( $post->ID, 'top_store_disable_page_sidebar', true );
		if ($page_post_meta_sidebar=='on'){
			$classes = 'no-sidebar';
		}
}elseif(is_single()){
	    $page_post_meta_sidebar = get_post_meta( $post->ID, 'top_store_disable_page_sidebar', true );
		if ($page_post_meta_sidebar=='on'){
			$classes = 'no-sidebar';
		}
}elseif(top_store_is_blog()){
	    $blog_page_id = get_option( 'page_for_posts' );
        $page_post_meta_sidebar = get_post_meta( $blog_page_id, 'top_store_disable_page_sidebar', true );
		if ($page_post_meta_sidebar=='on'){
			$classes = 'no-sidebar';
		}
}elseif(class_exists( 'WooCommerce' ) && is_shop()){
	    $shop_page_id = get_option( 'woocommerce_shop_page_id' );
        $page_post_meta_sidebar = get_post_meta( $shop_page_id, 'top_store_disable_page_sidebar', true );
		if ($page_post_meta_sidebar=='on'){
			$classes = 'no-sidebar';
		}
}elseif(class_exists( 'WooCommerce' ) && is_product()){
	    $page_post_meta_sidebar = get_post_meta( $post->ID, 'top_store_disable_page_sidebar', true );
		if ($page_post_meta_sidebar=='on'){
			$classes = 'no-sidebar';
		}
}
?>
<?php do_action('top_store_site_preloader'); ?>
    <nav id="navbar" class="navbar navbar-expand-lg navbar-light fixed-top">
        <a class="navbar-brand" href="#">
            <img src="../assets/img/logo_mobile.png" id="logo-mobile">
            <img src="../assets/img/logo.png" id="logo-desktop">
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
                <li class="nav-item products-link-li active">
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
                                <a href="#">
                                    <div class="products-item-img">
                                        <img class="img-thumbnail" src="../assets/img/all-products.jpg" alt="">
                                    </div>
                                    <div class="text-center products-item-title p-2">כל המוצרים</div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="products-item-img">
                                        <img class="img-thumbnail" src="../assets/img/cheese-cake.jpeg" alt="">
                                    </div>
                                    <div class="text-center products-item-title p-2">גבינה</div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="products-item-img">
                                        <img class="img-thumbnail" src="../assets/img/brehiut.jpeg" alt="">
                                    </div>
                                    <div class="text-center products-item-title p-2">בריאות</div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="products-item-img">
                                        <img class="img-thumbnail" src="../assets/img/shokold.jpeg" alt="">
                                    </div>
                                    <div class="text-center products-item-title p-2">שוקולד</div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="products-item-img">
                                        <img class="img-thumbnail" src="../assets/img/ogat-pas.jpeg" alt="">
                                    </div>
                                    <div class="text-center products-item-title p-2">עוגות פס</div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="products-item-img">
                                        <img class="img-thumbnail" src="../assets/img/shmarim.jpeg" alt="">
                                    </div>
                                    <div class="text-center products-item-title p-2">שמרים</div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="products-item-img">
                                        <img class="img-thumbnail" src="../assets/img/behushot.jpeg" alt="">
                                    </div>
                                    <div class="text-center products-item-title p-2">בחושות</div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="products-item-img">
                                        <img class="img-thumbnail" src="../assets/img/melohim.png" alt="">
                                    </div>
                                    <div class="text-center products-item-title p-2">מלוחים</div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="products-item-img">
                                        <img class="img-thumbnail" src="../assets/img/cookies.png" alt="">
                                    </div>
                                    <div class="text-center products-item-title p-2">עוגיות</div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="products-item-img">
                                        <img class="img-thumbnail" src="../assets/img/borekasim.jpeg" alt="">
                                    </div>
                                    <div class="text-center products-item-title p-2">בורקסים</div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="products-item-img">
                                        <img class="img-thumbnail" src="../assets/img/happyB.png" alt="">
                                    </div>
                                    <div class="text-center products-item-title p-2">עוגות ימי הולדת</div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="products-item-img">
                                        <img class="img-thumbnail" src="../assets/img/kinder-special.png" alt="">
                                    </div>
                                    <div class="text-center products-item-title p-2">קינוחים</div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link hover-anim" href="#">אודות</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link hover-anim" href="#">
                        מועדון לקוחות
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link hover-anim" href="#">
                        כשרות
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link hover-anim" href="#">
                        דרושים
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link hover-anim" href="#">
                        סניפים וצרו קשר
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link hover-anim gift-card-btn" href="#">
                        Gift Card
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link hover-anim" href="#">
                        החשבון שלי
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </a>
                </li>
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
