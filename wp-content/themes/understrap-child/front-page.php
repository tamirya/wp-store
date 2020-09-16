<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
get_header();
?>
    <main role="main">
<?php
get_template_part('page-templates/sections/section', 'cake-carousel');
get_template_part('page-templates/sections/section', 'categories');
get_template_part('page-templates/sections/section', 'call-to-action');
get_template_part('page-templates/sections/section', 'best_seller');
?>

<?php
get_footer();
