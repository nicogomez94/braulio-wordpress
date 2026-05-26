<?php
/**
 * Funciones del theme Ferreteria Theme.
 */

if (! defined('ABSPATH')) {
    exit;
}

function ferreteria_theme_setup(): void
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('woocommerce');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script'));

    register_nav_menus(array(
        'primary' => __('Menu principal', 'ferreteria-theme'),
        'footer'  => __('Menu footer', 'ferreteria-theme'),
    ));
}
add_action('after_setup_theme', 'ferreteria_theme_setup');

function ferreteria_theme_assets(): void
{
    wp_enqueue_style(
        'ferreteria-font-awesome',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css',
        array(),
        '6.5.0'
    );

    wp_enqueue_style(
        'ferreteria-google-fonts',
        'https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Inter:wght@400;500;600&display=swap',
        array(),
        null
    );

    wp_enqueue_style(
        'ferreteria-theme-main',
        get_template_directory_uri() . '/assets/styles.css',
        array('ferreteria-font-awesome', 'ferreteria-google-fonts'),
        filemtime(get_template_directory() . '/assets/styles.css')
    );

    wp_enqueue_script(
        'ferreteria-theme-main',
        get_template_directory_uri() . '/assets/main.js',
        array(),
        filemtime(get_template_directory() . '/assets/main.js'),
        true
    );
}
add_action('wp_enqueue_scripts', 'ferreteria_theme_assets');

function ferreteria_theme_preconnect_fonts(array $urls, string $relation_type): array
{
    if ('preconnect' === $relation_type) {
        $urls[] = array(
            'href' => 'https://fonts.googleapis.com',
        );
        $urls[] = array(
            'href'        => 'https://fonts.gstatic.com',
            'crossorigin' => 'anonymous',
        );
    }

    return $urls;
}
add_filter('wp_resource_hints', 'ferreteria_theme_preconnect_fonts', 10, 2);

function ferreteria_theme_url(string $path = ''): string
{
    return esc_url(home_url($path));
}

function ferreteria_product_cat_url(string $slug, string $fallback = '/tienda/'): string
{
    $term = get_term_by('slug', $slug, 'product_cat');

    if ($term && ! is_wp_error($term)) {
        $link = get_term_link($term, 'product_cat');

        if (! is_wp_error($link)) {
            return esc_url($link);
        }
    }

    return ferreteria_theme_url($fallback);
}

function ferreteria_theme_is_active(string $target): string
{
    if ('home' === $target && (is_front_page() || is_home())) {
        return ' active';
    }

    if (is_page($target)) {
        return ' active';
    }

    if ('tienda' === $target && function_exists('is_shop') && is_shop()) {
        return ' active';
    }

    if ('carrito' === $target && function_exists('is_cart') && is_cart()) {
        return ' active';
    }

    return '';
}

function ferreteria_theme_add_to_cart_text(): string
{
    return __('Agregar al carrito', 'ferreteria-theme');
}
add_filter('woocommerce_product_add_to_cart_text', 'ferreteria_theme_add_to_cart_text');
add_filter('woocommerce_product_single_add_to_cart_text', 'ferreteria_theme_add_to_cart_text');
