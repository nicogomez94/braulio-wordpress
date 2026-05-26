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
    <?php
    $show_shop_filters = function_exists('is_shop') && (
        is_shop()
        || is_product_taxonomy()
        || (is_search() && 'product' === get_query_var('post_type'))
    );
    ?>
    <?php if ($show_shop_filters) : ?>
      <form class="shop-filters" action="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>" method="get">
        <label class="shop-filter-field" for="ferreteria-product-search">
          <span>Buscador</span>
          <input
            id="ferreteria-product-search"
            type="search"
            name="s"
            value="<?php echo esc_attr(get_search_query()); ?>"
            placeholder="Buscar productos"
          >
        </label>

        <input type="hidden" name="post_type" value="product">

        <label class="shop-filter-field" for="ferreteria-product-category">
          <span>Categorías</span>
          <?php
          wp_dropdown_categories(array(
              'show_option_all' => 'Todas las categorías',
              'taxonomy'        => 'product_cat',
              'name'            => 'product_cat',
              'id'              => 'ferreteria-product-category',
              'orderby'         => 'name',
              'hierarchical'    => true,
              'hide_empty'      => false,
              'value_field'     => 'slug',
              'selected'        => get_query_var('product_cat'),
          ));
          ?>
        </label>

        <button type="submit" class="button shop-filter-submit">Filtrar</button>
        <a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>" class="shop-filter-clear">Limpiar</a>
      </form>
    <?php endif; ?>

    <?php woocommerce_content(); ?>
  </div>
</main>

<?php
get_footer();
