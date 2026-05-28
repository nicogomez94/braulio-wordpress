<?php
/**
 * Header del theme.
 */

if (! defined('ABSPATH')) {
    exit;
}
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="MS Metal Santiago - Ferreteria y construcciones metalicas a medida en Santiago del Estero.">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

  <nav class="navbar" role="navigation" aria-label="Navegación principal">
    <div class="navbar-inner">
      <a href="<?php echo ferreteria_theme_url('/'); ?>" class="navbar-logo" aria-label="MS Metal Santiago - Inicio">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/logo.svg" alt="MS Metal Santiago del Estero" class="logo-img">
        <span class="logo-text">Metal <span>Santiago</span></span>
      </a>

      <button class="navbar-toggle" id="navToggle" aria-label="Abrir menú" aria-expanded="false" aria-controls="navMenu">
        <i class="fas fa-bars"></i>
      </button>

      <div class="navbar-menu" id="navMenu" role="menu">
        <ul class="navbar-nav">
          <li><a href="<?php echo ferreteria_theme_url('/'); ?>" class="<?php echo esc_attr(trim(ferreteria_theme_is_active('home'))); ?>">Inicio</a></li>
          <li><a href="<?php echo ferreteria_theme_url('/nosotros/'); ?>" class="<?php echo esc_attr(trim(ferreteria_theme_is_active('nosotros'))); ?>">Nosotros</a></li>
          <li><a href="<?php echo ferreteria_theme_url('/categorias/'); ?>" class="<?php echo esc_attr(trim(ferreteria_theme_is_active('categorias'))); ?>">Categorías</a></li>
          <li><a href="<?php echo ferreteria_theme_url('/tienda/'); ?>" class="<?php echo esc_attr(trim(ferreteria_theme_is_active('tienda'))); ?>">Tienda</a></li>
          <li><a href="<?php echo ferreteria_theme_url('/carrito/'); ?>" class="<?php echo esc_attr(trim(ferreteria_theme_is_active('carrito'))); ?>">Carrito</a></li>
          <li><a href="<?php echo ferreteria_theme_url('/contacto/'); ?>" class="btn-nav<?php echo esc_attr(ferreteria_theme_is_active('contacto')); ?>">Cotizar</a></li>
        </ul>
      </div>
    </div>
  </nav>
