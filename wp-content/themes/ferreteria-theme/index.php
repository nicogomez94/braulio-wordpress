<?php
/**
 * Fallback del theme.
 */

if (! defined('ABSPATH')) {
    exit;
}

get_header();
?>

<main class="section-light">
  <div class="container">
    <?php
    if (have_posts()) :
        while (have_posts()) :
            the_post();
            the_title('<h1 class="section-title">', '</h1>');
            the_content();
        endwhile;
    endif;
    ?>
  </div>
</main>

<?php
get_footer();

