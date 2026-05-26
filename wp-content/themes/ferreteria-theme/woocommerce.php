<?php
/**
 * Template WooCommerce base.
 */

if (! defined('ABSPATH')) {
    exit;
}

get_header();
?>

<main class="section-light">
  <div class="container">
    <?php woocommerce_content(); ?>
  </div>
</main>

<?php
get_footer();

