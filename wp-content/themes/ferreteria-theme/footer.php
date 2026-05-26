<?php
/**
 * Footer del theme.
 */

if (! defined('ABSPATH')) {
    exit;
}
?>
  <footer role="contentinfo">
    <div class="footer-inner">
      <div class="footer-top">
        <div>
          <div class="footer-brand-name">MS <span>Metal</span> Santiago</div>
          <p class="footer-tagline">Ferretería y Construcciones Metálicas a Medida<br>Santiago del Estero</p>
          <div class="footer-social">
            <a href="https://instagram.com/metal.santiago" class="footer-social-link" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
              <i class="fab fa-instagram"></i>
            </a>
            <a href="https://tiktok.com/@metal.santiago" class="footer-social-link" target="_blank" rel="noopener noreferrer" aria-label="TikTok">
              <i class="fab fa-tiktok"></i>
            </a>
            <a href="https://wa.me/+549XXXXXXXXXX" class="footer-social-link" target="_blank" rel="noopener noreferrer" aria-label="WhatsApp">
              <i class="fab fa-whatsapp"></i>
            </a>
          </div>
        </div>
        <div>
          <p class="footer-col-title">Navegación</p>
          <ul class="footer-links">
            <li><a href="<?php echo ferreteria_theme_url('/'); ?>">Inicio</a></li>
            <li><a href="<?php echo ferreteria_theme_url('/#categorias'); ?>">Productos</a></li>
            <li><a href="<?php echo ferreteria_theme_url('/#construcciones'); ?>">Construcciones</a></li>
            <li><a href="<?php echo ferreteria_theme_url('/nosotros/'); ?>">Sobre nosotros</a></li>
            <li><a href="<?php echo ferreteria_theme_url('/contacto/'); ?>">Contacto</a></li>
            <li><a href="<?php echo ferreteria_theme_url('/tienda/'); ?>">Tienda</a></li>
            <li><a href="<?php echo ferreteria_theme_url('/carrito/'); ?>">Carrito</a></li>
          </ul>
        </div>
        <div>
          <p class="footer-col-title">Ubicación</p>
          <p class="footer-addr">
            Colectora de circunvalación<br>
            B° Industria<br>
            entre Rodríguez y Viamonte<br>
            Santiago del Estero
          </p>
        </div>
      </div>
      <div class="footer-bottom">
        <p>&copy; <?php echo esc_html(gmdate('Y')); ?> MS Metal Santiago. Todos los derechos reservados.</p>
      </div>
    </div>
  </footer>

  <a href="https://wa.me/+549XXXXXXXXXX" class="whatsapp-float" target="_blank" rel="noopener noreferrer" aria-label="Contactar por WhatsApp">
    <i class="fab fa-whatsapp"></i>
  </a>

<?php wp_footer(); ?>
</body>
</html>

