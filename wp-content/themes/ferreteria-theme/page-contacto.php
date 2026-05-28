<?php
/* Template Name: Contacto */
if (! defined('ABSPATH')) { exit; }
get_header();
?>

<!-- =====================================================
       NAVBAR
  ====================================================== --><!-- =====================================================
       PAGE HERO
  ====================================================== -->
  <header class="page-hero" aria-labelledby="page-title">
    <nav class="breadcrumb" aria-label="Ubicación en el sitio">
      <a href="<?php echo ferreteria_theme_url('/'); ?>">Inicio</a>
      <i class="fas fa-chevron-right"></i>
      <span>Contacto</span>
    </nav>
    <h1 class="page-hero-title" id="page-title">Contacto</h1>
    <p class="page-hero-sub">
      Envianos tu consulta, pedido o solicitud de presupuesto.
      Te respondemos a la brevedad.
    </p>
  </header>


  <!-- =====================================================
       CONTACTO PRINCIPAL
       WordPress: Contact Form 7 / WPForms + widgets de info
  ====================================================== -->
  <section class="section-light" aria-labelledby="contact-title">
    <div class="container">
      <div class="contact-layout">

        <!-- Info de contacto -->
        <div>
          <p class="section-eyebrow" style="justify-content:flex-start">
            <span>Datos de contacto</span>
          </p>
          <h2 style="font-family:var(--font-display);font-size:clamp(1.6rem,3vw,2.2rem);color:var(--color-dark);margin-bottom:2rem;" id="contact-title">
            Estamos para ayudarte
          </h2>

          <div class="contact-info-list">

            <div class="contact-item fade-in">
              <div class="contact-item-icon"><i class="fas fa-location-dot"></i></div>
              <div class="contact-item-body">
                <h4>Dirección</h4>
                <p>
                  Colectora de circunvalación B° Industria<br>
                  entre Rodríguez y Viamonte<br>
                  Santiago del Estero
                </p>
              </div>
            </div>

            <div class="contact-item fade-in">
              <div class="contact-item-icon"><i class="fab fa-whatsapp"></i></div>
              <div class="contact-item-body">
                <h4>WhatsApp</h4>
                <a href="<?php echo ferreteria_wa_url(); ?>" target="_blank" rel="noopener noreferrer">
                  <?php echo esc_html(get_option('ms_whatsapp', '+54 9 385 XXX-XXXX')); ?>
                </a>
                <p style="font-size:.82rem;color:var(--color-text-muted);margin-top:.25rem;">
                  Lunes a sábados de 8 a 18 hs
                </p>
              </div>
            </div>

            <div class="contact-item fade-in">
              <div class="contact-item-icon"><i class="fas fa-envelope"></i></div>
              <div class="contact-item-body">
                <h4>Correo electrónico</h4>
                <a href="mailto:<?php echo esc_attr(get_option('ms_email', 'contacto@msmetalsantiago.com.ar')); ?>">
                  <?php echo esc_html(get_option('ms_email', 'contacto@msmetalsantiago.com.ar')); ?>
                </a>
              </div>
            </div>

            <div class="contact-item fade-in">
              <div class="contact-item-icon" style="background:linear-gradient(45deg,#f09433,#e6683c,#dc2743,#cc2366);">
                <i class="fab fa-instagram"></i>
              </div>
              <div class="contact-item-body">
                <h4>Redes sociales</h4>
                <div class="social-row">
                  <a href="<?php echo esc_url(get_option('ms_instagram', '#')); ?>" class="social-pill" target="_blank" rel="noopener noreferrer">
                    <i class="fab fa-instagram"></i> @Metal.santiago
                  </a>
                </div>
              </div>
            </div>

          </div>
        </div>


        <!-- Formulario -->
        <div class="fade-in">
          <form class="contact-form" id="contactForm" novalidate>
            <h3 class="form-title">Envianos tu consulta</h3>

            <div class="form-row">
              <div class="form-group">
                <label for="nombre">Nombre *</label>
                <input type="text" id="nombre" name="nombre" placeholder="Tu nombre completo" required autocomplete="name">
              </div>
              <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="tel" id="telefono" name="telefono" placeholder="+54 9 385 000-0000" autocomplete="tel">
              </div>
            </div>

            <div class="form-row">
              <div class="form-group" style="grid-column:1/-1">
                <label for="email">Correo electrónico *</label>
                <input type="email" id="email" name="email" placeholder="correo@ejemplo.com" required autocomplete="email">
              </div>
            </div>

            <div class="form-row">
              <div class="form-group" style="grid-column:1/-1">
                <label for="asunto">Tipo de consulta</label>
                <select id="asunto" name="asunto">
                  <option value="" disabled selected>Seleccioná una opción…</option>
                  <option value="ferreteria">Consulta sobre ferretería / productos</option>
                  <option value="construccion">Presupuesto construcción metálica</option>
                  <option value="escaleras">Escaleras a medida</option>
                  <option value="aberturas">Aberturas y ventanas</option>
                  <option value="techos">Techos y estructuras</option>
                  <option value="muebles">Muebles y personalizados</option>
                  <option value="otro">Otra consulta</option>
                </select>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group" style="grid-column:1/-1">
                <label for="mensaje">Mensaje *</label>
                <textarea id="mensaje" name="mensaje" placeholder="Contanos sobre tu proyecto, medidas, materiales o lo que necesitás saber…" required></textarea>
              </div>
            </div>

            <div class="form-submit">
              <button type="submit" class="btn btn-primary">
                <i class="fas fa-paper-plane"></i> Enviar mensaje
              </button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </section>


  <!-- =====================================================
       MAPA / UBICACIÓN
       WordPress: bloque embed de Google Maps
  ====================================================== -->
  <section class="section-gray" aria-labelledby="map-title">
    <div class="container">
      <div class="section-header fade-in">
        <p class="section-eyebrow">Dónde encontrarnos</p>
        <h2 class="section-title" id="map-title">Visitanos en el barrio Industria</h2>
        <p class="section-subtitle">
          Colectora de circunvalación, entre Rodríguez y Viamonte, Santiago del Estero.
        </p>
      </div>

      <!-- Placeholder del mapa — reemplazar por embed de Google Maps -->
      <div class="fade-in" style="
        background: var(--color-dark);
        border-radius: var(--radius-md);
        overflow: hidden;
        border: 1.5px solid var(--color-gray);
        min-height: 380px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        gap: 1rem;
        text-align: center;
        padding: 3rem;
      ">
        <i class="fas fa-map-location-dot" style="font-size:3.5rem;color:var(--color-red);"></i>
        <p style="font-family:var(--font-display);font-size:1.1rem;color:#fff;text-transform:uppercase;letter-spacing:.08em;">
          Barrio Industria, Santiago del Estero
        </p>
        <p style="font-size:.88rem;color:#777;max-width:360px;line-height:1.6;">
          Colectora de circunvalación entre Rodríguez y Viamonte
        </p>
        <a
          href="https://maps.google.com/?q=Colectora+Circunvalacion+Barrio+Industria+Santiago+del+Estero"
          class="btn btn-outline"
          target="_blank"
          rel="noopener noreferrer"
          style="margin-top:.5rem"
        >
          <i class="fas fa-diamond-turn-right"></i> Ver en Google Maps
        </a>
      </div>
      <!-- /Placeholder mapa -->

    </div>
  </section>


  <!-- =====================================================
       HORARIOS
       WordPress: tabla / columnas de texto
  ====================================================== -->
  <section class="section-light" aria-labelledby="hours-title">
    <div class="container" style="max-width:700px;">
      <div class="section-header fade-in">
        <p class="section-eyebrow">Atención</p>
        <h2 class="section-title" id="hours-title">Horarios de atención</h2>
      </div>

      <div class="fade-in" style="
        border: 1.5px solid var(--color-gray);
        border-radius: var(--radius-md);
        overflow: hidden;
      ">
        <table style="width:100%;border-collapse:collapse;font-family:var(--font-body);font-size:.92rem;">
          <thead>
            <tr style="background:var(--color-dark);color:#fff;">
              <th style="padding:1rem 1.5rem;text-align:left;font-family:var(--font-display);font-size:.8rem;letter-spacing:.12em;text-transform:uppercase;font-weight:600;">Día</th>
              <th style="padding:1rem 1.5rem;text-align:left;font-family:var(--font-display);font-size:.8rem;letter-spacing:.12em;text-transform:uppercase;font-weight:600;">Horario</th>
            </tr>
          </thead>
          <tbody>
            <tr style="border-bottom:1px solid var(--color-gray);">
              <td style="padding:.9rem 1.5rem;color:var(--color-text);">Lunes a Viernes</td>
              <td style="padding:.9rem 1.5rem;color:var(--color-text);font-weight:500;">8:00 — 18:00 hs</td>
            </tr>
            <tr style="border-bottom:1px solid var(--color-gray);background:var(--color-gray-light);">
              <td style="padding:.9rem 1.5rem;color:var(--color-text);">Sábados</td>
              <td style="padding:.9rem 1.5rem;color:var(--color-text);font-weight:500;">8:00 — 13:00 hs</td>
            </tr>
            <tr>
              <td style="padding:.9rem 1.5rem;color:var(--color-text-muted);">Domingos y feriados</td>
              <td style="padding:.9rem 1.5rem;color:var(--color-text-muted);">Cerrado</td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="fade-in" style="margin-top:1.5rem;display:flex;align-items:center;gap:.75rem;padding:1.1rem 1.5rem;background:rgba(196,30,30,.06);border:1.5px solid rgba(196,30,30,.2);border-radius:var(--radius-md);">
        <i class="fas fa-circle-info" style="color:var(--color-red);font-size:1.1rem;flex-shrink:0;"></i>
        <p style="font-size:.88rem;color:var(--color-text-muted);line-height:1.5;">
          Para urgencias o consultas fuera de horario podés escribirnos por WhatsApp.
          Respondemos a la brevedad.
        </p>
      </div>
    </div>
  </section>


  <!-- =====================================================
       FOOTER
  ====================================================== -->
<?php
get_footer();
