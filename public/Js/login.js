/*
|--------------------------------------------------------------------------
| Nombre      : Jesus Alexander Perez
| Fecha       : 25/05/2026
| Descripción : Sistema de autenticación social con panel de proveedores
|               adicionales, efectos visuales, manejo de foco y teclado,
|               y preparación para redirección a backend (Auth0, etc.).
|--------------------------------------------------------------------------
*/

(function () {
  'use strict';

  /*
  |--------------------------------------------------------------------------
  | Sección 1 : Referencias al DOM
  |--------------------------------------------------------------------------
  */
  const botonMostrarMas = document.getElementById('botonMostrarMas');
  const panelOpcionesExtra = document.getElementById('panelOpcionesExtra');
  const botonCerrarPanel = document.getElementById('botonCerrarPanel');
  const fondoPanel = panelOpcionesExtra?.querySelector('.fondo-panel');
  const todosLosBotonesProveedor = document.querySelectorAll('.boton-proveedor');
  const anuncioLectorPantalla = document.querySelector('.solo-lectores-pantalla[aria-live="polite"]');

  const contenedorLogin = document.querySelector('[data-base-url]');
  const baseUrl = contenedorLogin ? contenedorLogin.dataset.baseUrl : '';

  /*
  |--------------------------------------------------------------------------
  | Sección 2 : Estado interno
  |--------------------------------------------------------------------------
  */
  let panelAbierto = false;
  let botonCargando = null;
  let animacionCierreActiva = false;

  /*
  |--------------------------------------------------------------------------
  | Sección 3 : Funciones auxiliares (anuncios, foco, restauración)
  |--------------------------------------------------------------------------
  */
  function anunciar(mensaje) {
    if (!anuncioLectorPantalla) return;
    anuncioLectorPantalla.textContent = '';
    setTimeout(() => {
      anuncioLectorPantalla.textContent = mensaje;
    }, 50);
  }

  function atraparFoco(evento) {
    if (!panelAbierto) return;

    const elementosFocables = fondoPanel.querySelectorAll(
      'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])'
    );

    if (elementosFocables.length === 0) return;

    const primerElemento = elementosFocables[0];
    const ultimoElemento = elementosFocables[elementosFocables.length - 1];

    if (evento.key === 'Tab') {
      if (evento.shiftKey) {
        if (document.activeElement === primerElemento) {
          evento.preventDefault();
          ultimoElemento.focus();
        }
      } else {
        if (document.activeElement === ultimoElemento) {
          evento.preventDefault();
          primerElemento.focus();
        }
      }
    }
  }

  function obtenerNombreProveedor(boton) {
    const texto = boton.querySelector('.texto-proveedor');
    return texto ? texto.textContent.trim() : 'este proveedor';
  }

  function restaurarBotones() {
    todosLosBotonesProveedor.forEach((boton) => {
      boton.classList.remove('boton-proveedor--cargando');
      boton.disabled = false;
    });
    botonCargando = null;
  }

  /*
  |--------------------------------------------------------------------------
  | Sección 4 : Manejo del panel modal (abrir, cerrar, escape, clic fuera)
  |--------------------------------------------------------------------------
  */
  function abrirPanel() {
    if (panelAbierto || animacionCierreActiva) return;

    panelOpcionesExtra.hidden = false;
    panelAbierto = true;
    botonMostrarMas.setAttribute('aria-expanded', 'true');
    anunciar('Panel de más opciones de inicio de sesión abierto');

    setTimeout(() => {
      botonCerrarPanel.focus();
    }, 100);

    document.addEventListener('keydown', manejarEscape);
    fondoPanel.addEventListener('keydown', atraparFoco);
    panelOpcionesExtra.addEventListener('click', manejarClicFuera);
  }

  function cerrarPanel() {
    if (!panelAbierto || animacionCierreActiva) return;

    animacionCierreActiva = true;
    anunciar('Panel de opciones cerrado');

    fondoPanel.style.transform = 'scale(0.9)';
    fondoPanel.style.opacity = '0';
    panelOpcionesExtra.style.opacity = '0';

    setTimeout(() => {
      panelOpcionesExtra.hidden = true;
      fondoPanel.style.transform = '';
      fondoPanel.style.opacity = '';
      panelOpcionesExtra.style.opacity = '';
      panelAbierto = false;
      animacionCierreActiva = false;
      botonMostrarMas.setAttribute('aria-expanded', 'false');
      botonMostrarMas.focus();

      document.removeEventListener('keydown', manejarEscape);
      fondoPanel.removeEventListener('keydown', atraparFoco);
      panelOpcionesExtra.removeEventListener('click', manejarClicFuera);
    }, 200);
  }

  function manejarEscape(evento) {
    if (evento.key === 'Escape') {
      cerrarPanel();
    }
  }

  function manejarClicFuera(evento) {
    if (evento.target === panelOpcionesExtra) {
      cerrarPanel();
    }
  }

  /*
  |--------------------------------------------------------------------------
  | Sección 5 : Redirección a proveedores (simulación/API)
  |--------------------------------------------------------------------------
  */
  function redirigirAProveedor(nombreProveedor, boton) {
    botonCargando = boton;
    boton.classList.add('boton-proveedor--cargando');
    boton.disabled = true;

    const urlsProveedores = {
      google: '/auth/google',
      facebook: '/auth/facebook',
      microsoft: '/auth/microsoft',
      linkedin: '/auth/linkedin',
      github: '/auth/github',
      twitter: '/auth/twitter',
    };

    const claveProveedor = nombreProveedor.toLowerCase().replace(' electrónico', '');
    const pathRedireccion = urlsProveedores[claveProveedor] || `/auth/${claveProveedor}`;
    const urlFinalAbsoluta = baseUrl ? `${baseUrl}${pathRedireccion}` : pathRedireccion;

    console.log(`🔐 Redirigiendo de forma segura a: ${urlFinalAbsoluta}`);
    console.log(`📦 Proveedor: ${nombreProveedor}`);

    window.location.href = urlFinalAbsoluta;
  }

  function manejarClicProveedor(evento) {
    const boton = evento.currentTarget;

    if (botonCargando === boton || boton.classList.contains('boton-proveedor--cargando')) {
      return;
    }

    const nombreProveedor = obtenerNombreProveedor(boton);

    if (panelAbierto) {
      cerrarPanel();
    }

    redirigirAProveedor(nombreProveedor, boton);
  }

  /*
  |--------------------------------------------------------------------------
  | Sección 6 : Efectos visuales (ripple, partículas)
  |--------------------------------------------------------------------------
  */
  function agregarEfectoRipple(evento) {
    const boton = evento.currentTarget;

    if (boton.classList.contains('boton-proveedor--cargando')) return;

    const ripple = document.createElement('span');
    const rect = boton.getBoundingClientRect();
    const tamaño = Math.max(rect.width, rect.height);
    const x = evento.clientX - rect.left - tamaño / 2;
    const y = evento.clientY - rect.top - tamaño / 2;

    ripple.style.cssText = `
      position: absolute;
      width: ${tamaño}px;
      height: ${tamaño}px;
      left: ${x}px;
      top: ${y}px;
      background: rgba(220, 38, 38, 0.3);
      border-radius: 50%;
      transform: scale(0);
      animation: ripple 0.6s ease-out;
      pointer-events: none;
    `;

    boton.appendChild(ripple);

    ripple.addEventListener('animationend', () => {
      ripple.remove();
    });
  }

  function crearParticulas(evento) {
    if (window.innerWidth < 768) return;

    const boton = evento.currentTarget;
    const rect = boton.getBoundingClientRect();
    const centroX = rect.left + rect.width / 2;
    const centroY = rect.top + rect.height / 2;

    for (let i = 0; i < 8; i++) {
      const particula = document.createElement('span');
      const angulo = (Math.PI * 2 * i) / 8;
      const distancia = 40 + Math.random() * 30;

      particula.style.cssText = `
        position: fixed;
        width: 4px;
        height: 4px;
        background: #dc2626;
        border-radius: 50%;
        left: ${centroX}px;
        top: ${centroY}px;
        pointer-events: none;
        z-index: 9999;
        opacity: 0.8;
        animation: particulaExplosion 0.6s ease-out forwards;
        --translateX: ${Math.cos(angulo) * distancia}px;
        --translateY: ${Math.sin(angulo) * distancia}px;
      `;

      document.body.appendChild(particula);

      particula.addEventListener('animationend', () => {
        particula.remove();
      });
    }
  }

  /*
  |--------------------------------------------------------------------------
  | Sección 7 : Inicialización y configuración global
  |--------------------------------------------------------------------------
  */
  function inicializar() {
    if (!botonMostrarMas || !panelOpcionesExtra || !botonCerrarPanel) {
      console.warn('⚠️ Elementos del panel no encontrados. Verifica los IDs en el HTML.');
    }

    botonMostrarMas?.addEventListener('click', abrirPanel);
    botonCerrarPanel?.addEventListener('click', cerrarPanel);

    todosLosBotonesProveedor.forEach((boton) => {
      boton.addEventListener('click', manejarClicProveedor);
      boton.addEventListener('mousedown', agregarEfectoRipple);
      boton.addEventListener('click', crearParticulas);
    });

    // Inyectar keyframes dinámicos
    if (!document.getElementById('keyframes-dinamicos')) {
      const estilo = document.createElement('style');
      estilo.id = 'keyframes-dinamicos';
      estilo.textContent = `
        @keyframes ripple {
          to {
            transform: scale(4);
            opacity: 0;
          }
        }
        @keyframes particulaExplosion {
          0% {
            transform: translate(0, 0) scale(1);
            opacity: 0.8;
          }
          100% {
            transform: translate(var(--translateX), var(--translateY)) scale(0);
            opacity: 0;
          }
        }
      `;
      document.head.appendChild(estilo);
    }

    console.log('🚀 Sistema de autenticación social listo');
  }

  function obtenerProveedoresPrincipales() {
    const principales = document.querySelectorAll('.conjunto-proveedores:not(.conjunto-proveedores--extra) .texto-proveedor');
    return Array.from(principales).map((el) => el.textContent.trim()).join(', ');
  }

  function obtenerProveedoresExtra() {
    const extra = document.querySelectorAll('.conjunto-proveedores--extra .texto-proveedor');
    return Array.from(extra).map((el) => el.textContent.trim()).join(', ');
  }

  /*
  |--------------------------------------------------------------------------
  | Sección 8 : API pública global (opcional)
  |--------------------------------------------------------------------------
  */
  window.SistemaAuth = {
    abrirPanel,
    cerrarPanel,
    restaurarBotones,
    obtenerProveedoresPrincipales,
    obtenerProveedoresExtra,
  };

  /*
  |--------------------------------------------------------------------------
  | Sección 9 : Arranque según estado del DOM
  |--------------------------------------------------------------------------
  */
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', inicializar);
  } else {
    inicializar();
  }
})();
