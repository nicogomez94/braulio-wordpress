<?php
/**
 * Página de categorías del catálogo.
 */

if (! defined('ABSPATH')) {
    exit;
}

get_header();
?>

<main class="section-gray">
  <div class="container">
    <div class="section-header fade-in">
      <p class="section-eyebrow">Catálogo</p>
      <h1 class="section-title">Categorías</h1>
      <p class="section-subtitle">Elegí el rubro que necesitás para encontrar productos o pedir un presupuesto a medida.</p>
    </div>

    <?php ferreteria_theme_render_categories_grid(); ?>
  </div>
</main>

<?php
get_footer();
