/* =========================================================
   MS Metal Santiago — JavaScript principal
   ========================================================= */

/* --- Navbar mobile toggle --- */
const navToggle = document.getElementById('navToggle');
const navMenu   = document.getElementById('navMenu');

if (navToggle && navMenu) {
  navToggle.addEventListener('click', () => {
    const isOpen = navMenu.classList.toggle('open');
    navToggle.setAttribute('aria-expanded', isOpen);
    navToggle.querySelector('i').classList.toggle('fa-bars', !isOpen);
    navToggle.querySelector('i').classList.toggle('fa-xmark', isOpen);
  });

  // Cerrar menú al hacer click en un link
  navMenu.querySelectorAll('a').forEach(link => {
    link.addEventListener('click', () => {
      navMenu.classList.remove('open');
      navToggle.querySelector('i').classList.add('fa-bars');
      navToggle.querySelector('i').classList.remove('fa-xmark');
    });
  });
}

/* --- Marcar nav link activo según página actual --- */
(function markActiveNav() {
  const path = window.location.pathname.split('/').pop() || 'index.html';
  document.querySelectorAll('.navbar-nav a').forEach(a => {
    const href = a.getAttribute('href');
    if (href === path || (path === '' && href === 'index.html')) {
      a.classList.add('active');
    }
  });
})();

/* --- Fade-in con IntersectionObserver --- */
const fadeObserver = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add('visible');
      fadeObserver.unobserve(entry.target); // Ejecutar una sola vez
    }
  });
}, { threshold: 0.12 });

document.querySelectorAll('.fade-in').forEach(el => fadeObserver.observe(el));

/* --- Formulario de contacto (feedback visual) --- */
const contactForm = document.getElementById('contactForm');
if (contactForm) {
  contactForm.addEventListener('submit', function (e) {
    e.preventDefault();
    const btn   = contactForm.querySelector('.form-submit .btn');
    const orig  = btn.innerHTML;

    btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Enviando…';
    btn.disabled  = true;

    // Simulación — reemplazar por lógica real (wp-mail, API, etc.)
    setTimeout(() => {
      btn.innerHTML = '<i class="fas fa-circle-check"></i> ¡Mensaje enviado!';
      btn.style.background = '#1a8f4c';
      btn.style.borderColor = '#1a8f4c';
      contactForm.reset();

      setTimeout(() => {
        btn.innerHTML = orig;
        btn.disabled  = false;
        btn.style.background = '';
        btn.style.borderColor = '';
      }, 4000);
    }, 1400);
  });
}

/* --- Smooth scroll para anclas internas --- */
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener('click', function (e) {
    const target = document.querySelector(this.getAttribute('href'));
    if (target) {
      e.preventDefault();
      const navH = document.querySelector('.navbar')?.offsetHeight || 64;
      window.scrollTo({
        top: target.getBoundingClientRect().top + window.scrollY - navH - 12,
        behavior: 'smooth'
      });
    }
  });
});
