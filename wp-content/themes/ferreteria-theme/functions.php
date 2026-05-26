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

function ferreteria_theme_simplify_checkout_fields(array $fields): array
{
    unset(
        $fields['billing']['billing_company'],
        $fields['billing']['billing_address_2'],
        $fields['shipping']['shipping_company'],
        $fields['shipping']['shipping_address_2'],
        $fields['order']['order_comments']
    );

    $labels = array(
        'billing_first_name' => 'Nombre',
        'billing_last_name'  => 'Apellido',
        'billing_phone'      => 'Teléfono',
        'billing_email'      => 'Correo electrónico',
        'billing_address_1'  => 'Dirección',
        'billing_city'       => 'Localidad',
        'billing_state'      => 'Provincia',
        'billing_postcode'   => 'Código postal',
        'shipping_first_name' => 'Nombre',
        'shipping_last_name'  => 'Apellido',
        'shipping_address_1'  => 'Dirección',
        'shipping_city'       => 'Localidad',
        'shipping_state'      => 'Provincia',
        'shipping_postcode'   => 'Código postal',
    );

    foreach ($labels as $field_key => $label) {
        foreach (array('billing', 'shipping') as $group) {
            if (isset($fields[$group][$field_key])) {
                $fields[$group][$field_key]['label'] = $label;
            }
        }
    }

    foreach (array('billing', 'shipping') as $group) {
        $country_key  = "{$group}_country";
        $state_key    = "{$group}_state";
        $postcode_key = "{$group}_postcode";

        if (isset($fields[$group][$country_key])) {
            $fields[$group][$country_key]['default'] = 'AR';
            $fields[$group][$country_key]['class']   = array('form-row-wide', 'hidden');
        }

        if (isset($fields[$group][$state_key])) {
            $fields[$group][$state_key]['default'] = 'G';
        }

        if (isset($fields[$group][$postcode_key])) {
            $fields[$group][$postcode_key]['required'] = false;
        }
    }

    return $fields;
}
add_filter('woocommerce_checkout_fields', 'ferreteria_theme_simplify_checkout_fields');

function ferreteria_theme_default_checkout_country(string $value): string
{
    return $value ?: 'AR';
}
add_filter('default_checkout_billing_country', 'ferreteria_theme_default_checkout_country');
add_filter('default_checkout_shipping_country', 'ferreteria_theme_default_checkout_country');

function ferreteria_theme_default_checkout_state(string $value): string
{
    return $value ?: 'G';
}
add_filter('default_checkout_billing_state', 'ferreteria_theme_default_checkout_state');
add_filter('default_checkout_shipping_state', 'ferreteria_theme_default_checkout_state');
