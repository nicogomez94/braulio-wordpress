<?php
if (! defined('ABSPATH')) { exit; }
get_header();
?>

<!-- =====================================================
       NAVBAR
       Nota WordPress: reemplazar por menú del tema
  ====================================================== --><!-- =====================================================
       HERO
       WordPress: Elementor / ACF hero section
  ====================================================== -->
  <section class="hero" aria-labelledby="hero-title">
    <div class="hero-inner">

      <!-- Columna izquierda: contenido -->
      <div class="hero-content fade-in">
        <p class="hero-eyebrow">Santiago del Estero</p>
        <h1 class="hero-title" id="hero-title">
          Ferretería
          <br>
          <span class="accent">Construcciones</span>
        </h1>
        <p class="hero-subtitle">
          Materiales, herramientas y soluciones para tu obra o proyecto.
          Calidad garantizada, atención personalizada desde el barrio Industria.
        </p>
        <div class="hero-ctas">
          <a href="#categorias" class="btn btn-primary">
            <i class="fas fa-store"></i> Ver productos
          </a>
          <a href="<?php echo ferreteria_theme_url('/contacto/'); ?>" class="btn btn-outline">
            <i class="fas fa-envelope"></i> Pedir cotización
          </a>
        </div>
      </div>

      <!-- Columna derecha: badge decorativo -->
      <div class="hero-right" aria-hidden="true">
        <div class="hero-badge">
          <span class="hero-badge-ms">MS</span>
          <span class="hero-badge-metal">METAL</span>
          <span class="hero-badge-sub">Santiago</span>
        </div>
      </div>

    </div>
  </section>


  <!-- =====================================================
       FRANJA DE CONFIANZA
       WordPress: bloque de texto / columns
  ====================================================== -->
  <div style="background: var(--color-red); padding: 1rem 1.5rem;">
    <div class="container" style="display:flex; gap:2rem; flex-wrap:wrap; justify-content:center; align-items:center;">
      <span style="font-family:var(--font-display);font-size:.85rem;color:#fff;letter-spacing:.1em;display:flex;align-items:center;gap:.5rem;">
        <i class="fas fa-location-dot"></i> B° Industria, Santiago del Estero
      </span>
      <span style="font-family:var(--font-display);font-size:.85rem;color:rgba(255,255,255,.7);letter-spacing:.1em;display:flex;align-items:center;gap:.5rem;">
        <i class="fab fa-instagram"></i> @Metal.santiago
      </span>
      <span style="font-family:var(--font-display);font-size:.85rem;color:rgba(255,255,255,.7);letter-spacing:.1em;display:flex;align-items:center;gap:.5rem;">
        <i class="fab fa-tiktok"></i> @Metal.santiago
      </span>
      <span style="font-family:var(--font-display);font-size:.85rem;color:rgba(255,255,255,.7);letter-spacing:.1em;display:flex;align-items:center;gap:.5rem;">
        <i class="fab fa-whatsapp"></i> Consultanos por WhatsApp
      </span>
    </div>
  </div>


  <!-- =====================================================
       CATEGORÍAS DE PRODUCTOS
       WordPress: grid de páginas / custom post types
  ====================================================== -->
  <section class="section-gray" id="categorias" aria-labelledby="cat-title">
    <div class="container">
      <div class="section-header fade-in">
        <p class="section-eyebrow">Catálogo</p>
        <h2 class="section-title" id="cat-title">Nuestros productos</h2>
        <p class="section-subtitle">Todo lo que necesitás para tu obra, reforma o proyecto en un solo lugar.</p>
      </div>

      <div class="categories-grid">
        <a href="<?php echo ferreteria_product_cat_url('herramientas'); ?>" class="category-card fade-in">
          <div class="category-icon"><i class="fas fa-screwdriver-wrench"></i></div>
          <span class="category-name">Herramientas</span>
        </a>
        <a href="<?php echo ferreteria_product_cat_url('pintureria'); ?>" class="category-card fade-in">
          <div class="category-icon"><i class="fas fa-paint-roller"></i></div>
          <span class="category-name">Pinturería</span>
        </a>
        <a href="<?php echo ferreteria_theme_url('/tienda/'); ?>" class="category-card fade-in">
          <div class="category-icon"><i class="fas fa-bolt"></i></div>
          <span class="category-name">Electricidad</span>
        </a>
        <a href="<?php echo ferreteria_product_cat_url('plomeria'); ?>" class="category-card fade-in">
          <div class="category-icon"><i class="fas fa-faucet"></i></div>
          <span class="category-name">Plomería</span>
        </a>
        <a href="<?php echo ferreteria_product_cat_url('herrajes'); ?>" class="category-card fade-in">
          <div class="category-icon"><i class="fas fa-key"></i></div>
          <span class="category-name">Herrajes</span>
        </a>
        <a href="<?php echo ferreteria_theme_url('/contacto/'); ?>" class="category-card fade-in">
          <div class="category-icon"><i class="fas fa-stairs"></i></div>
          <span class="category-name">Escaleras</span>
        </a>
        <a href="<?php echo ferreteria_theme_url('/contacto/'); ?>" class="category-card fade-in">
          <div class="category-icon"><i class="fas fa-door-open"></i></div>
          <span class="category-name">Aberturas</span>
        </a>
        <a href="<?php echo ferreteria_theme_url('/contacto/'); ?>" class="category-card fade-in">
          <div class="category-icon"><i class="fas fa-house-chimney"></i></div>
          <span class="category-name">Techos</span>
        </a>
        <a href="<?php echo ferreteria_theme_url('/contacto/'); ?>" class="category-card fade-in">
          <div class="category-icon"><i class="fas fa-ruler-combined"></i></div>
          <span class="category-name">Personalizados</span>
        </a>
        <a href="<?php echo ferreteria_theme_url('/contacto/'); ?>" class="category-card fade-in">
          <div class="category-icon"><i class="fas fa-couch"></i></div>
          <span class="category-name">Muebles</span>
        </a>
      </div>
    </div>
  </section>


  <!-- =====================================================
       CONSTRUCCIONES METÁLICAS A MEDIDA
       WordPress: sección con fondo oscuro / full-width block
  ====================================================== -->
  <section class="metal-section" id="construcciones" aria-labelledby="metal-title">
    <div class="container">
      <div class="metal-content fade-in">
        <p class="section-eyebrow">Nuestra especialidad</p>
        <h2 class="metal-title" id="metal-title">
          Construcciones<br>
          Metálicas a Medida
        </h2>
        <p class="metal-body">
          Fabricamos estructuras metálicas personalizadas para cada necesidad.
          Desde escaleras y portones hasta techos y muebles de hierro,
          cada trabajo se diseña y construye pensado en tu espacio.
        </p>
        <ul class="metal-list">
          <li><i class="fas fa-circle-check"></i> Escaleras de hierro y acero inoxidable</li>
          <li><i class="fas fa-circle-check"></i> Portones, rejas y cercos metálicos</li>
          <li><i class="fas fa-circle-check"></i> Techos y estructuras metálicas</li>
          <li><i class="fas fa-circle-check"></i> Aberturas y ventanas de hierro</li>
          <li><i class="fas fa-circle-check"></i> Muebles y piezas de diseño especial</li>
          <li><i class="fas fa-circle-check"></i> Presupuesto sin cargo, visitamos tu obra</li>
        </ul>
        <a href="<?php echo ferreteria_theme_url('/contacto/'); ?>" class="btn btn-primary">
          <i class="fas fa-ruler-combined"></i> Solicitar presupuesto
        </a>
      </div>
    </div>
  </section>


  <!-- =====================================================
       POR QUÉ ELEGIRNOS
       WordPress: columnas con iconos / features block
  ====================================================== -->
  <section class="section-dark" aria-labelledby="why-title">
    <div class="container">
      <div class="section-header fade-in">
        <p class="section-eyebrow">Por qué elegirnos</p>
        <h2 class="section-title" id="why-title">Tu proyecto, nuestra prioridad</h2>
      </div>
      <div class="features-grid">
        <div class="feature-card fade-in">
          <div class="feature-icon"><i class="fas fa-medal"></i></div>
          <h3 class="feature-title">Calidad garantizada</h3>
          <p class="feature-text">
            Trabajamos con materiales de primera calidad y marcas reconocidas
            para que tus proyectos resistan el tiempo.
          </p>
        </div>
        <div class="feature-card fade-in">
          <div class="feature-icon"><i class="fas fa-headset"></i></div>
          <h3 class="feature-title">Asesoramiento experto</h3>
          <p class="feature-text">
            Nuestro equipo te orienta en cada compra o proyecto, desde la
            consulta inicial hasta la entrega final.
          </p>
        </div>
        <div class="feature-card fade-in">
          <div class="feature-icon"><i class="fas fa-truck-fast"></i></div>
          <h3 class="feature-title">Envío y retiro</h3>
          <p class="feature-text">
            Coordinamos la entrega o el retiro del pedido de la forma más
            práctica para vos y tu obra.
          </p>
        </div>
      </div>
    </div>
  </section>


  <!-- STATS (sección oscura, sin padding-top extra) -->
  <section class="section-dark" style="padding-top:0" aria-label="Números de la empresa">
    <div class="container">
      <div class="stats-grid">
        <div class="stat-item fade-in">
          <div class="stat-number">10+</div>
          <div class="stat-label">Categorías de productos</div>
        </div>
        <div class="stat-item fade-in">
          <div class="stat-number">100%</div>
          <div class="stat-label">Fabricación a medida</div>
        </div>
        <div class="stat-item fade-in">
          <div class="stat-number">SGO</div>
          <div class="stat-label">Santiago del Estero</div>
        </div>
        <div class="stat-item fade-in">
          <div class="stat-number">0$</div>
          <div class="stat-label">Costo del presupuesto</div>
        </div>
      </div>
    </div>
  </section>


  <!-- =====================================================
       CTA FINAL
       WordPress: call-to-action block / botones
  ====================================================== -->
  <section class="cta-section" aria-labelledby="cta-title">
    <div class="container fade-in">
      <p class="section-eyebrow">¿Listo para empezar?</p>
      <h2 class="cta-title" id="cta-title">Contanos tu proyecto y te ayudamos</h2>
      <p class="cta-subtitle">
        Desde una consulta rápida hasta un presupuesto completo.
        Estamos para acompañarte en cada etapa de tu obra.
      </p>
      <div class="cta-buttons">
        <a href="<?php echo ferreteria_theme_url('/contacto/'); ?>" class="btn btn-primary">
          <i class="fas fa-envelope"></i> Enviar consulta
        </a>
        <a href="https://wa.me/+549XXXXXXXXXX" class="btn btn-dark" target="_blank" rel="noopener noreferrer">
          <i class="fab fa-whatsapp"></i> Escribir por WhatsApp
        </a>
      </div>
    </div>
  </section>


  <!-- =====================================================
       FOOTER
       WordPress: reemplazar por footer del tema
  ====================================================== -->
<?php
get_footer();
