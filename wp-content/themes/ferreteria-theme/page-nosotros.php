<?php
/* Template Name: Nosotros */
if (! defined('ABSPATH')) { exit; }
get_header();
?>

<!-- =====================================================
       NAVBAR
  ====================================================== --><!-- =====================================================
       PAGE HERO
       WordPress: página con hero / banner personalizado
  ====================================================== -->
  <header class="page-hero" aria-labelledby="page-title">
    <nav class="breadcrumb" aria-label="Ubicación en el sitio">
      <a href="<?php echo ferreteria_theme_url('/'); ?>">Inicio</a>
      <i class="fas fa-chevron-right"></i>
      <span>Nosotros</span>
    </nav>
    <h1 class="page-hero-title" id="page-title">Sobre Nosotros</h1>
    <p class="page-hero-sub">
      Somos MS Metal Santiago — ferretería y taller de construcciones metálicas con más de 30 años de experiencia.
    </p>
  </header>


  <!-- =====================================================
       QUIÉNES SOMOS
       WordPress: columnas texto + imagen
  ====================================================== -->
  <section class="section-light" aria-labelledby="about-title">
    <div class="container">
      <div class="about-grid">

        <!-- Visual de marca -->
        <div class="about-visual fade-in" aria-hidden="true">
          <div class="about-visual-inner">
            <i class="fas fa-industry about-visual-icon"></i>
            <div class="about-visual-brand">MS Metal</div>
            <div class="about-visual-sub">Santiago del Estero</div>
          </div>
        </div>

        <!-- Texto -->
        <div class="about-text fade-in">
          <p class="section-eyebrow">Quiénes somos</p>
          <h2 class="about-heading" id="about-title">
            Más que una ferretería,<br>un taller a tu servicio
          </h2>
          <div class="about-body">
            <p>
              MS Metal Santiago nació con el objetivo de ser el punto de referencia para quienes necesitan
              materiales de ferretería y soluciones metálicas a medida en Santiago del Estero.
              Estamos ubicados en la Colectora de Circunvalación del Barrio Industria, un lugar estratégico
              para atender tanto a particulares como a profesionales de la construcción.
            </p>
            <p>
              Contamos con un amplio catálogo de productos que abarca herramientas, pinturería,
              electricidad, plomería, herrajes, escaleras, aberturas, techos y muebles.
              Pero lo que nos diferencia es nuestra capacidad de fabricación: diseñamos y construimos
              piezas metálicas totalmente personalizadas según las necesidades de cada proyecto.
            </p>
            <p>
              Cada trabajo que sale de nuestro taller lleva el compromiso de calidad y la dedicación
              que nuestros clientes merecen. Porque creemos que un buen trabajo empieza con buenos materiales
              y aún mejor atención.
            </p>
          </div>
        </div>

      </div>
    </div>
  </section>


  <!-- =====================================================
       NUESTROS VALORES
       WordPress: grid de bloques / columnas con iconos
  ====================================================== -->
  <section class="section-gray" aria-labelledby="values-title">
    <div class="container">
      <div class="section-header fade-in">
        <p class="section-eyebrow">Cómo trabajamos</p>
        <h2 class="section-title" id="values-title">Nuestros valores</h2>
        <p class="section-subtitle">Los pilares que guían cada trabajo, cada presupuesto y cada entrega.</p>
      </div>

      <div class="values-grid">
        <div class="value-item fade-in">
          <i class="fas fa-medal value-icon"></i>
          <div class="value-content">
            <h4>Calidad sin compromiso</h4>
            <p>Usamos materiales de primera y trabajamos con las mismas exigencias en cada proyecto, grande o pequeño.</p>
          </div>
        </div>
        <div class="value-item fade-in">
          <i class="fas fa-handshake value-icon"></i>
          <div class="value-content">
            <h4>Trato cercano y honesto</h4>
            <p>Te asesoramos con la verdad: te decimos qué conviene, qué dura más y qué se adapta mejor a tu presupuesto.</p>
          </div>
        </div>
        <div class="value-item fade-in">
          <i class="fas fa-ruler-combined value-icon"></i>
          <div class="value-content">
            <h4>Fabricación a medida</h4>
            <p>No hay dos obras iguales. Por eso cada estructura metálica que fabricamos está pensada especialmente para tu espacio.</p>
          </div>
        </div>
        <div class="value-item fade-in">
          <i class="fas fa-clock value-icon"></i>
          <div class="value-content">
            <h4>Cumplimiento de plazos</h4>
            <p>Respetamos los tiempos acordados porque sabemos que tu obra tiene sus ritmos y no podemos frenarla.</p>
          </div>
        </div>
        <div class="value-item fade-in">
          <i class="fas fa-lightbulb value-icon"></i>
          <div class="value-content">
            <h4>Soluciones creativas</h4>
            <p>Si tenés una idea o una necesidad fuera de lo común, la analizamos y buscamos la mejor forma de hacerla realidad.</p>
          </div>
        </div>
        <div class="value-item fade-in">
          <i class="fas fa-map-location-dot value-icon"></i>
          <div class="value-content">
            <h4>Compromiso local</h4>
            <p>Somos parte de Santiago del Estero y nos importa el desarrollo de nuestra comunidad y sus profesionales.</p>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- =====================================================
       STATS
       WordPress: contador animado / números destacados
  ====================================================== -->
  <section class="section-dark" aria-label="Datos del negocio">
    <div class="container">
      <div class="section-header fade-in">
        <p class="section-eyebrow">En números</p>
        <h2 class="section-title">Lo que nos define</h2>
      </div>
      <div class="stats-grid">
        <div class="stat-item fade-in">
          <div class="stat-number">10+</div>
          <div class="stat-label">Rubros de ferretería</div>
        </div>
        <div class="stat-item fade-in">
          <div class="stat-number">100%</div>
          <div class="stat-label">Trabajos a medida</div>
        </div>
        <div class="stat-item fade-in">
          <div class="stat-number">1</div>
          <div class="stat-label">Equipo dedicado</div>
        </div>
        <div class="stat-item fade-in">
          <div class="stat-number">0$</div>
          <div class="stat-label">Costo del presupuesto</div>
        </div>
      </div>
    </div>
  </section>


  <!-- =====================================================
       QUÉ HACEMOS — Lista de servicios
       WordPress: list block / icon list
  ====================================================== -->
  <section class="section-light" aria-labelledby="services-title">
    <div class="container">
      <div class="section-header fade-in">
        <p class="section-eyebrow">Lo que ofrecemos</p>
        <h2 class="section-title" id="services-title">Ferretería completa + Taller propio</h2>
        <p class="section-subtitle">Desde un tornillo hasta una estructura metálica completa, todo en un mismo lugar.</p>
      </div>

      <div style="display:grid; grid-template-columns:1fr; gap:1rem; max-width:900px; margin:0 auto;">
        <div style="display:grid; grid-template-columns:1fr 1fr; gap:1rem;">
          <!-- Col 1 -->
          <div>
            <p style="font-family:var(--font-display);font-size:.75rem;color:var(--color-red);letter-spacing:.2em;text-transform:uppercase;margin-bottom:1rem;">Ferretería</p>
            <ul style="list-style:none;display:flex;flex-direction:column;gap:.75rem;">
              <li class="fade-in" style="display:flex;align-items:center;gap:.75rem;font-size:.9rem;color:var(--color-text);">
                <i class="fas fa-circle-check" style="color:var(--color-red);font-size:.7rem;flex-shrink:0;"></i> Herramientas eléctricas y manuales
              </li>
              <li class="fade-in" style="display:flex;align-items:center;gap:.75rem;font-size:.9rem;color:var(--color-text);">
                <i class="fas fa-circle-check" style="color:var(--color-red);font-size:.7rem;flex-shrink:0;"></i> Pinturería y revestimientos
              </li>
              <li class="fade-in" style="display:flex;align-items:center;gap:.75rem;font-size:.9rem;color:var(--color-text);">
                <i class="fas fa-circle-check" style="color:var(--color-red);font-size:.7rem;flex-shrink:0;"></i> Materiales eléctricos
              </li>
              <li class="fade-in" style="display:flex;align-items:center;gap:.75rem;font-size:.9rem;color:var(--color-text);">
                <i class="fas fa-circle-check" style="color:var(--color-red);font-size:.7rem;flex-shrink:0;"></i> Plomería y sanitarios
              </li>
              <li class="fade-in" style="display:flex;align-items:center;gap:.75rem;font-size:.9rem;color:var(--color-text);">
                <i class="fas fa-circle-check" style="color:var(--color-red);font-size:.7rem;flex-shrink:0;"></i> Herrajes y fijaciones
              </li>
            </ul>
          </div>
          <!-- Col 2 -->
          <div>
            <p style="font-family:var(--font-display);font-size:.75rem;color:var(--color-red);letter-spacing:.2em;text-transform:uppercase;margin-bottom:1rem;">Construcciones metálicas</p>
            <ul style="list-style:none;display:flex;flex-direction:column;gap:.75rem;">
              <li class="fade-in" style="display:flex;align-items:center;gap:.75rem;font-size:.9rem;color:var(--color-text);">
                <i class="fas fa-circle-check" style="color:var(--color-red);font-size:.7rem;flex-shrink:0;"></i> Escaleras de hierro a medida
              </li>
              <li class="fade-in" style="display:flex;align-items:center;gap:.75rem;font-size:.9rem;color:var(--color-text);">
                <i class="fas fa-circle-check" style="color:var(--color-red);font-size:.7rem;flex-shrink:0;"></i> Aberturas y ventanas metálicas
              </li>
              <li class="fade-in" style="display:flex;align-items:center;gap:.75rem;font-size:.9rem;color:var(--color-text);">
                <i class="fas fa-circle-check" style="color:var(--color-red);font-size:.7rem;flex-shrink:0;"></i> Techos y estructuras
              </li>
              <li class="fade-in" style="display:flex;align-items:center;gap:.75rem;font-size:.9rem;color:var(--color-text);">
                <i class="fas fa-circle-check" style="color:var(--color-red);font-size:.7rem;flex-shrink:0;"></i> Muebles y piezas personalizadas
              </li>
              <li class="fade-in" style="display:flex;align-items:center;gap:.75rem;font-size:.9rem;color:var(--color-text);">
                <i class="fas fa-circle-check" style="color:var(--color-red);font-size:.7rem;flex-shrink:0;"></i> Portones, rejas y cercos
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- =====================================================
       CTA
       WordPress: call-to-action block
  ====================================================== -->
  <section class="cta-section" aria-labelledby="cta-title">
    <div class="container fade-in">
      <p class="section-eyebrow">¿Tenés un proyecto?</p>
      <h2 class="cta-title" id="cta-title">Hablemos, sin compromiso</h2>
      <p class="cta-subtitle">
        Visitanos en el barrio Industria o escribinos por WhatsApp.
        Te asesoramos y presupuestamos sin cargo.
      </p>
      <div class="cta-buttons">
        <a href="<?php echo ferreteria_theme_url('/contacto/'); ?>" class="btn btn-primary">
          <i class="fas fa-envelope"></i> Contactarnos
        </a>
        <a href="https://wa.me/+549XXXXXXXXXX" class="btn btn-dark" target="_blank" rel="noopener noreferrer">
          <i class="fab fa-whatsapp"></i> WhatsApp directo
        </a>
      </div>
    </div>
  </section>


  <!-- =====================================================
       FOOTER
  ====================================================== -->
<?php
get_footer();
