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

    wp_localize_script('ferreteria-theme-main', 'ferreteriaAjax', array(
        'url'   => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('ferreteria_contact_nonce'),
    ));
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

    if ('categorias' === $target && get_query_var('ferreteria_categorias')) {
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

function ferreteria_theme_category_items(): array
{
    return array(
        array('label' => 'Herramientas', 'icon' => 'fa-screwdriver-wrench', 'url' => ferreteria_product_cat_url('herramientas')),
        array('label' => 'Pinturería', 'icon' => 'fa-paint-roller', 'url' => ferreteria_product_cat_url('pintureria')),
        array('label' => 'Electricidad', 'icon' => 'fa-bolt', 'url' => ferreteria_theme_url('/tienda/')),
        array('label' => 'Plomería', 'icon' => 'fa-faucet', 'url' => ferreteria_product_cat_url('plomeria')),
        array('label' => 'Herrajes', 'icon' => 'fa-key', 'url' => ferreteria_product_cat_url('herrajes')),
        array('label' => 'Escaleras', 'icon' => 'fa-stairs', 'url' => ferreteria_theme_url('/contacto/')),
        array('label' => 'Aberturas', 'icon' => 'fa-door-open', 'url' => ferreteria_theme_url('/contacto/')),
        array('label' => 'Techos', 'icon' => 'fa-house-chimney', 'url' => ferreteria_theme_url('/contacto/')),
        array('label' => 'Personalizados', 'icon' => 'fa-ruler-combined', 'url' => ferreteria_theme_url('/contacto/')),
        array('label' => 'Muebles', 'icon' => 'fa-couch', 'url' => ferreteria_theme_url('/contacto/')),
    );
}

function ferreteria_theme_render_categories_grid(): void
{
    echo '<div class="categories-grid">';

    foreach (ferreteria_theme_category_items() as $category) {
        printf(
            '<a href="%1$s" class="category-card fade-in"><div class="category-icon"><i class="fas %2$s"></i></div><span class="category-name">%3$s</span></a>',
            esc_url($category['url']),
            esc_attr($category['icon']),
            esc_html($category['label'])
        );
    }

    echo '</div>';
}

function ferreteria_theme_add_query_vars(array $vars): array
{
    $vars[] = 'ferreteria_categorias';
    return $vars;
}
add_filter('query_vars', 'ferreteria_theme_add_query_vars');

function ferreteria_theme_add_rewrite_rules(): void
{
    add_rewrite_rule('^categorias/?$', 'index.php?ferreteria_categorias=1', 'top');
}
add_action('init', 'ferreteria_theme_add_rewrite_rules');

function ferreteria_theme_template_include(string $template): string
{
    if (get_query_var('ferreteria_categorias')) {
        $custom_template = get_template_directory() . '/page-categorias.php';

        if (file_exists($custom_template)) {
            return $custom_template;
        }
    }

    return $template;
}
add_filter('template_include', 'ferreteria_theme_template_include');

function ferreteria_theme_flush_rewrite_rules(): void
{
    ferreteria_theme_add_rewrite_rules();
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'ferreteria_theme_flush_rewrite_rules');

function ferreteria_theme_maybe_flush_rewrite_rules(): void
{
    $rewrite_version = '2026-05-26-categorias';

    if (get_option('ferreteria_theme_rewrite_version') === $rewrite_version) {
        return;
    }

    ferreteria_theme_add_rewrite_rules();
    flush_rewrite_rules();
    update_option('ferreteria_theme_rewrite_version', $rewrite_version);
}
add_action('init', 'ferreteria_theme_maybe_flush_rewrite_rules', 20);

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

/* =====================================================
   DATOS DE CONTACTO
   Ajustes → Datos de contacto
   ===================================================== */

function ferreteria_wa_url(): string
{
    $number = get_option('ms_whatsapp', '');
    if (! $number) {
        return '#';
    }
    return esc_url('https://wa.me/' . preg_replace('/[^0-9]/', '', $number));
}

function ferreteria_contact_options_page(): void
{
    add_options_page(
        'Datos de contacto',
        'Datos de contacto',
        'manage_options',
        'ferreteria-contacto',
        'ferreteria_contact_options_render'
    );
}
add_action('admin_menu', 'ferreteria_contact_options_page');

function ferreteria_contact_options_init(): void
{
    register_setting('ferreteria_contacto', 'ms_whatsapp', array(
        'type'              => 'string',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => '',
    ));
    register_setting('ferreteria_contacto', 'ms_email', array(
        'type'              => 'string',
        'sanitize_callback' => 'sanitize_email',
        'default'           => '',
    ));
    register_setting('ferreteria_contacto', 'ms_instagram', array(
        'type'              => 'string',
        'sanitize_callback' => 'esc_url_raw',
        'default'           => '',
    ));
}
add_action('admin_init', 'ferreteria_contact_options_init');

function ferreteria_contact_options_render(): void
{
    if (! current_user_can('manage_options')) {
        return;
    }
    ?>
    <div class="wrap">
        <h1>Datos de contacto</h1>
        <form method="post" action="options.php">
            <?php settings_fields('ferreteria_contacto'); ?>
            <table class="form-table">
                <tr>
                    <th><label for="ms_whatsapp">WhatsApp (número)</label></th>
                    <td>
                        <input type="text" id="ms_whatsapp" name="ms_whatsapp" value="<?php echo esc_attr(get_option('ms_whatsapp')); ?>" class="regular-text" placeholder="+549385XXXXXXX">
                        <p class="description">Formato internacional. Ej: +549385XXXXXXX</p>
                    </td>
                </tr>
                <tr>
                    <th><label for="ms_email">Email de contacto</label></th>
                    <td>
                        <input type="email" id="ms_email" name="ms_email" value="<?php echo esc_attr(get_option('ms_email')); ?>" class="regular-text" placeholder="contacto@msmetalsantiago.com.ar">
                        <p class="description">A este correo llegan los mensajes del formulario.</p>
                    </td>
                </tr>
                <tr>
                    <th><label for="ms_instagram">Instagram (URL)</label></th>
                    <td>
                        <input type="url" id="ms_instagram" name="ms_instagram" value="<?php echo esc_attr(get_option('ms_instagram')); ?>" class="regular-text" placeholder="https://instagram.com/usuario">
                    </td>
                </tr>
            </table>
            <?php submit_button('Guardar cambios'); ?>
        </form>
    </div>
    <?php
}

/* =====================================================
   AJAX: Formulario de contacto
   ===================================================== */

function ferreteria_contact_form_handler(): void
{
    check_ajax_referer('ferreteria_contact_nonce', 'nonce');

    $nombre   = sanitize_text_field(wp_unslash($_POST['nombre'] ?? ''));
    $email    = sanitize_email(wp_unslash($_POST['email'] ?? ''));
    $telefono = sanitize_text_field(wp_unslash($_POST['telefono'] ?? ''));
    $asunto   = sanitize_text_field(wp_unslash($_POST['asunto'] ?? ''));
    $mensaje  = sanitize_textarea_field(wp_unslash($_POST['mensaje'] ?? ''));

    if (empty($nombre) || empty($email) || empty($mensaje) || ! is_email($email)) {
        wp_send_json_error('Datos inválidos.');
    }

    $to      = get_option('ms_email', get_option('admin_email'));
    $subject = 'Nueva consulta de ' . $nombre . ' — MS Metal Santiago';
    $body    = "Nombre: {$nombre}\nEmail: {$email}\nTeléfono: {$telefono}\nConsulta: {$asunto}\n\n{$mensaje}";
    $headers = array('Content-Type: text/plain; charset=UTF-8', "Reply-To: {$nombre} <{$email}>");

    $sent = wp_mail($to, $subject, $body, $headers);

    if ($sent) {
        wp_send_json_success('Mensaje enviado.');
    } else {
        wp_send_json_error('No se pudo enviar el mensaje.');
    }
}
add_action('wp_ajax_ferreteria_contact', 'ferreteria_contact_form_handler');
add_action('wp_ajax_nopriv_ferreteria_contact', 'ferreteria_contact_form_handler');
