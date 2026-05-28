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

// ──────────────────────────────────────────────────────────────────────────────
// Ícono por categoría — campo en el admin (sin plugins, solo term meta)
// ──────────────────────────────────────────────────────────────────────────────

/**
 * Campo en el formulario «Añadir categoría».
 */
function ferreteria_category_icon_add_field(): void
{
    ?>
    <div class="form-field">
        <label for="ferreteria_category_icon"><?php esc_html_e('Ícono (Font Awesome)', 'ferreteria-theme'); ?></label>
        <input type="text" name="ferreteria_category_icon" id="ferreteria_category_icon" value="" placeholder="fa-tag">
        <p class="description">
            <?php esc_html_e('Clase de Font Awesome, ej: fa-bolt, fa-faucet, fa-key.', 'ferreteria-theme'); ?>
            <a href="https://fontawesome.com/icons" target="_blank" rel="noopener noreferrer"><?php esc_html_e('Ver íconos', 'ferreteria-theme'); ?></a>
        </p>
    </div>
    <?php
}
add_action('product_cat_add_form_fields', 'ferreteria_category_icon_add_field');

/**
 * Campo en el formulario «Editar categoría».
 */
function ferreteria_category_icon_edit_field(WP_Term $term): void
{
    $icon = get_term_meta($term->term_id, 'ferreteria_category_icon', true);
    ?>
    <tr class="form-field">
        <th scope="row">
            <label for="ferreteria_category_icon"><?php esc_html_e('Ícono (Font Awesome)', 'ferreteria-theme'); ?></label>
        </th>
        <td>
            <input type="text" name="ferreteria_category_icon" id="ferreteria_category_icon"
                   value="<?php echo esc_attr($icon); ?>" placeholder="fa-tag">
            <p class="description">
                <?php esc_html_e('Clase de Font Awesome, ej: fa-bolt, fa-faucet, fa-key.', 'ferreteria-theme'); ?>
                <a href="https://fontawesome.com/icons" target="_blank" rel="noopener noreferrer"><?php esc_html_e('Ver íconos', 'ferreteria-theme'); ?></a>
            </p>
        </td>
    </tr>
    <?php
}
add_action('product_cat_edit_form_fields', 'ferreteria_category_icon_edit_field');

/**
 * Guarda el ícono al crear o editar una categoría.
 * Solo acepta el formato fa-[a-z0-9-] para evitar inyección de clases arbitrarias.
 */
function ferreteria_save_category_icon(int $term_id): void
{
    if (! isset($_POST['ferreteria_category_icon'])) {
        return;
    }

    $icon = sanitize_text_field(wp_unslash($_POST['ferreteria_category_icon']));

    // Permitir string vacío (borrar ícono) o un fa-class válido.
    if ('' === $icon || preg_match('/^fa-[a-z0-9\-]+$/', $icon)) {
        update_term_meta($term_id, 'ferreteria_category_icon', $icon);
    }
}
add_action('created_product_cat', 'ferreteria_save_category_icon');
add_action('edited_product_cat', 'ferreteria_save_category_icon');

/**
 * Migración silenciosa: asigna íconos a las categorías existentes la primera vez.
 * No sobreescribe si el cliente ya editó el campo manualmente.
 */
function ferreteria_migrate_category_icons(): void
{
    $version = '2026-05-28-icons-v1';

    if (get_option('ferreteria_icons_version') === $version) {
        return;
    }

    $icon_map = array(
        'herramientas'   => 'fa-screwdriver-wrench',
        'pintureria'     => 'fa-paint-roller',
        'electricidad'   => 'fa-bolt',
        'plomeria'       => 'fa-faucet',
        'herrajes'       => 'fa-key',
        'escaleras'      => 'fa-stairs',
        'aberturas'      => 'fa-door-open',
        'techos'         => 'fa-house-chimney',
        'personalizados' => 'fa-ruler-combined',
        'muebles'        => 'fa-couch',
    );

    foreach ($icon_map as $slug => $icon) {
        $term = get_term_by('slug', $slug, 'product_cat');

        if ($term && ! is_wp_error($term)) {
            $existing = get_term_meta($term->term_id, 'ferreteria_category_icon', true);

            if (empty($existing)) {
                update_term_meta($term->term_id, 'ferreteria_category_icon', $icon);
            }
        }
    }

    update_option('ferreteria_icons_version', $version);
}
add_action('init', 'ferreteria_migrate_category_icons', 15);

/**
 * Renderiza la grilla de categorías leyendo dinámicamente de WooCommerce.
 * Usa el ícono guardado en term meta; si no hay, muestra fa-tag como fallback.
 */
function ferreteria_theme_render_categories_grid(): void
{
    $categories = get_terms(array(
        'taxonomy'   => 'product_cat',
        'hide_empty' => false,
        'parent'     => 0,
        'orderby'    => 'menu_order',
        'order'      => 'ASC',
    ));

    if (is_wp_error($categories) || empty($categories)) {
        return;
    }

    echo '<div class="categories-grid">';

    foreach ($categories as $cat) {
        // Omitir la categoría por defecto «sin categoría» de WooCommerce.
        if ((int) $cat->term_id === (int) get_option('default_product_cat') || 'uncategorized' === $cat->slug) {
            continue;
        }

        $icon = get_term_meta($cat->term_id, 'ferreteria_category_icon', true);
        if (empty($icon)) {
            $icon = 'fa-tag'; // fallback para categorías sin ícono asignado
        }

        $url = get_term_link($cat, 'product_cat');
        if (is_wp_error($url)) {
            $url = ferreteria_theme_url('/tienda/');
        }

        printf(
            '<a href="%1$s" class="category-card fade-in"><div class="category-icon"><i class="fas %2$s"></i></div><span class="category-name">%3$s</span></a>',
            esc_url($url),
            esc_attr($icon),
            esc_html($cat->name)
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
    register_setting('ferreteria_contacto', 'ms_direccion', array(
        'type'              => 'string',
        'sanitize_callback' => 'sanitize_textarea_field',
        'default'           => '',
    ));
    register_setting('ferreteria_contacto', 'ms_horario', array(
        'type'              => 'string',
        'sanitize_callback' => 'sanitize_text_field',
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
                <tr>
                    <th><label for="ms_direccion">Dirección</label></th>
                    <td>
                        <textarea id="ms_direccion" name="ms_direccion" class="regular-text" rows="3" placeholder="Calle, barrio, ciudad"><?php echo esc_textarea(get_option('ms_direccion')); ?></textarea>
                    </td>
                </tr>
                <tr>
                    <th><label for="ms_horario">Horario de atención</label></th>
                    <td>
                        <input type="text" id="ms_horario" name="ms_horario" value="<?php echo esc_attr(get_option('ms_horario')); ?>" class="regular-text" placeholder="Lunes a sábados de 8 a 18 hs">
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
