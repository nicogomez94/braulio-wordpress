<?php
/**
 * Template generico de pagina.
 */

if (! defined('ABSPATH')) {
    exit;
}

get_header();

$page_classes = array('section-light', 'page-content-shell');

if (is_page('mayorista')) {
    $page_classes[] = 'mayorista-page';
}
?>

<main class="<?php echo esc_attr(implode(' ', $page_classes)); ?>">
  <div class="container">
    <div class="wp-page-content fade-in">
    <?php
    while (have_posts()) :
        the_post();
        the_content();
    endwhile;
    ?>
    </div>
  </div>
</main>

<?php
get_footer();
