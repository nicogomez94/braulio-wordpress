<?php
/**
 * Template generico de pagina.
 */

if (! defined('ABSPATH')) {
    exit;
}

get_header();
?>

<main class="section-light">
  <div class="container">
    <?php
    while (have_posts()) :
        the_post();
        the_content();
    endwhile;
    ?>
  </div>
</main>

<?php
get_footer();

