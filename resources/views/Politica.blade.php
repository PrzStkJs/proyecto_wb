<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
  <title>Política de Privacidad · Sistema de Visitas PCM</title>

  <style>
    /* =============================================
       RESET Y CONFIGURACIÓN GLOBAL
       ============================================= */
    *,
    *::before,
    *::after {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    html {
      font-size: 16px;
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
      scroll-behavior: smooth;
    }

    body {
      font-family: 'Inter', 'Segoe UI', system-ui, -apple-system, sans-serif;
      background: linear-gradient(160deg, #0a0a0a 0%, #141414 30%, #1a0a0a 55%, #0d0d0d 100%);
      background-attachment: fixed;
      min-height: 100vh;
      color: #e5e5e5;
      line-height: 1.7;
      position: relative;
      overflow-x: hidden;
    }

    /* Fondo animado con partículas y gradientes */
    body::before {
      content: '';
      position: fixed;
      top: -50%;
      left: -50%;
      width: 200%;
      height: 200%;
      background:
        radial-gradient(circle at 15% 25%, rgba(220, 38, 38, 0.06) 0%, transparent 50%),
        radial-gradient(circle at 85% 60%, rgba(220, 38, 38, 0.04) 0%, transparent 50%),
        radial-gradient(circle at 40% 80%, rgba(180, 30, 30, 0.05) 0%, transparent 50%),
        radial-gradient(circle at 70% 15%, rgba(255, 255, 255, 0.015) 0%, transparent 60%);
      animation: fondoAnimado 25s ease-in-out infinite;
      z-index: 0;
      pointer-events: none;
    }

    @keyframes fondoAnimado {
      0%, 100% { transform: translate(0, 0) rotate(0deg); }
      25% { transform: translate(1.5%, -1%) rotate(0.5deg); }
      50% { transform: translate(-1%, 1.5%) rotate(-0.5deg); }
      75% { transform: translate(-0.5%, -1.5%) rotate(0.3deg); }
    }

    /* =============================================
       BARRA DE NAVEGACIÓN SUPERIOR
       ============================================= */
    .barra-superior {
      position: sticky;
      top: 0;
      z-index: 100;
      background: rgba(14, 14, 14, 0.8);
      backdrop-filter: blur(25px);
      -webkit-backdrop-filter: blur(25px);
      border-bottom: 1px solid rgba(255, 255, 255, 0.06);
      padding: 0 2rem;
      display: flex;
      align-items: center;
      justify-content: space-between;
      height: 64px;
      box-shadow: 0 4px 30px rgba(0, 0, 0, 0.5);
    }

    .logo-pcm {
      display: flex;
      align-items: center;
      gap: 0.75rem;
      text-decoration: none;
      color: #ffffff;
      font-weight: 700;
      font-size: 1.1rem;
      letter-spacing: -0.3px;
      transition: opacity 0.3s ease;
    }

    .logo-pcm:hover {
      opacity: 0.85;
    }

    .logo-icono {
      width: 36px;
      height: 36px;
      background: linear-gradient(135deg, #dc2626, #991b1b);
      border-radius: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.2rem;
      box-shadow: 0 4px 15px rgba(220, 38, 38, 0.35);
    }

    .logo-texto {
      display: flex;
      flex-direction: column;
    }

    .logo-texto-principal {
      font-size: 0.95rem;
      line-height: 1.1;
    }

    .logo-texto-secundario {
      font-size: 0.7rem;
      color: rgba(255, 255, 255, 0.5);
      font-weight: 400;
      line-height: 1.1;
    }

    .boton-volver {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      padding: 0.5rem 1rem;
      background: rgba(255, 255, 255, 0.04);
      border: 1px solid rgba(255, 255, 255, 0.1);
      border-radius: 10px;
      color: rgba(255, 255, 255, 0.8);
      font-size: 0.85rem;
      font-weight: 500;
      cursor: pointer;
      text-decoration: none;
      transition: all 0.3s ease;
      font-family: inherit;
    }

    .boton-volver:hover {
      background: rgba(220, 38, 38, 0.1);
      border-color: rgba(220, 38, 38, 0.4);
      color: #ffffff;
      box-shadow: 0 4px 20px rgba(220, 38, 38, 0.2);
      transform: translateY(-1px);
    }

    .boton-volver svg {
      width: 16px;
      height: 16px;
      fill: currentColor;
      transition: transform 0.3s ease;
    }

    .boton-volver:hover svg {
      transform: translateX(-3px);
    }

    /* =============================================
       CONTENEDOR PRINCIPAL
       ============================================= */
    .contenedor-principal {
      position: relative;
      z-index: 1;
      max-width: 820px;
      margin: 0 auto;
      padding: 3rem 2rem 5rem;
    }

    /* =============================================
       HERO / ENCABEZADO
       ============================================= */
    .hero-privacidad {
      text-align: center;
      margin-bottom: 3.5rem;
      position: relative;
      padding: 3rem 2rem;
      background: rgba(20, 20, 20, 0.7);
      backdrop-filter: blur(20px);
      -webkit-backdrop-filter: blur(20px);
      border: 1px solid rgba(255, 255, 255, 0.06);
      border-radius: 24px;
      overflow: hidden;
      box-shadow:
        0 20px 50px rgba(0, 0, 0, 0.5),
        inset 0 1px 0 rgba(255, 255, 255, 0.02);
      animation: entradaHero 0.8s cubic-bezier(0.22, 0.61, 0.36, 1);
    }

    @keyframes entradaHero {
      from {
        opacity: 0;
        transform: translateY(30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .hero-privacidad::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 3px;
      background: linear-gradient(90deg,
        transparent 0%,
        rgba(59, 130, 246, 0.4) 20%,
        #3b82f6 50%,
        rgba(59, 130, 246, 0.4) 80%,
        transparent 100%);
      animation: lineaHero 4s ease-in-out infinite;
    }

    @keyframes lineaHero {
      0%, 100% { opacity: 0.6; }
      50% { opacity: 1; }
    }

    .hero-privacidad::after {
      content: '';
      position: absolute;
      top: -120px;
      right: -120px;
      width: 300px;
      height: 300px;
      background: radial-gradient(circle, rgba(59, 130, 246, 0.08) 0%, transparent 70%);
      border-radius: 50%;
      pointer-events: none;
    }

    .icono-hero {
      width: 70px;
      height: 70px;
      margin: 0 auto 1.5rem;
      background: linear-gradient(135deg, #3b82f6, #1d4ed8);
      border-radius: 20px;
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow:
        0 15px 35px rgba(59, 130, 246, 0.4),
        0 0 0 8px rgba(59, 130, 246, 0.08);
      position: relative;
      z-index: 1;
    }

    .icono-hero svg {
      width: 32px;
      height: 32px;
      fill: #ffffff;
    }

    .titulo-hero {
      font-size: 2.4rem;
      font-weight: 800;
      color: #ffffff;
      letter-spacing: -1px;
      margin-bottom: 0.8rem;
      position: relative;
      z-index: 1;
      text-shadow: 0 2px 15px rgba(0, 0, 0, 0.5);
    }

    .subtitulo-hero {
      font-size: 1rem;
      color: rgba(255, 255, 255, 0.5);
      font-weight: 400;
      position: relative;
      z-index: 1;
    }

    .fecha-actualizacion {
      display: inline-block;
      margin-top: 1.2rem;
      padding: 0.4rem 1rem;
      background: rgba(59, 130, 246, 0.1);
      border: 1px solid rgba(59, 130, 246, 0.2);
      border-radius: 20px;
      font-size: 0.8rem;
      color: #60a5fa;
      font-weight: 500;
      position: relative;
      z-index: 1;
    }

    /* =============================================
       SECCIONES DE CONTENIDO
       ============================================= */
    .seccion-privacidad {
      background: rgba(20, 20, 20, 0.6);
      backdrop-filter: blur(15px);
      -webkit-backdrop-filter: blur(15px);
      border: 1px solid rgba(255, 255, 255, 0.05);
      border-radius: 20px;
      padding: 2.2rem 2.5rem;
      margin-bottom: 1.5rem;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
      transition: all 0.35s ease;
      position: relative;
      overflow: hidden;
      animation: entradaSeccion 0.6s ease-out forwards;
      opacity: 0;
      transform: translateY(20px);
    }

    .seccion-privacidad:nth-child(1) { animation-delay: 0.1s; }
    .seccion-privacidad:nth-child(2) { animation-delay: 0.2s; }
    .seccion-privacidad:nth-child(3) { animation-delay: 0.3s; }
    .seccion-privacidad:nth-child(4) { animation-delay: 0.4s; }
    .seccion-privacidad:nth-child(5) { animation-delay: 0.5s; }
    .seccion-privacidad:nth-child(6) { animation-delay: 0.6s; }
    .seccion-privacidad:nth-child(7) { animation-delay: 0.7s; }
    .seccion-privacidad:nth-child(8) { animation-delay: 0.8s; }
    .seccion-privacidad:nth-child(9) { animation-delay: 0.9s; }
    .seccion-privacidad:nth-child(10) { animation-delay: 1.0s; }

    @keyframes entradaSeccion {
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .seccion-privacidad:hover {
      border-color: rgba(59, 130, 246, 0.25);
      box-shadow:
        0 15px 40px rgba(0, 0, 0, 0.4),
        0 0 0 1px rgba(59, 130, 246, 0.1);
      transform: translateY(-2px);
    }

    .seccion-privacidad::before {
      content: '';
      position: absolute;
      left: 0;
      top: 0;
      bottom: 0;
      width: 3px;
      background: linear-gradient(180deg, #3b82f6, transparent 80%);
      border-radius: 3px 0 0 3px;
      opacity: 0;
      transition: opacity 0.35s ease;
    }

    .seccion-privacidad:hover::before {
      opacity: 1;
    }

    .numero-seccion {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 36px;
      height: 36px;
      background: linear-gradient(135deg, #3b82f6, #1d4ed8);
      border-radius: 10px;
      color: #ffffff;
      font-weight: 700;
      font-size: 0.9rem;
      margin-bottom: 1rem;
      box-shadow: 0 6px 20px rgba(59, 130, 246, 0.3);
    }

    .titulo-seccion {
      font-size: 1.25rem;
      font-weight: 700;
      color: #ffffff;
      margin-bottom: 0.8rem;
      letter-spacing: -0.3px;
    }

    .contenido-seccion {
      color: rgba(255, 255, 255, 0.65);
      font-size: 0.95rem;
      line-height: 1.8;
    }

    .contenido-seccion p {
      margin-bottom: 0.8rem;
    }

    .contenido-seccion p:last-child {
      margin-bottom: 0;
    }

    .contenido-seccion strong {
      color: rgba(255, 255, 255, 0.9);
      font-weight: 600;
    }

    .contenido-seccion a {
      color: #60a5fa;
      text-decoration: none;
      font-weight: 500;
      border-bottom: 1px solid rgba(96, 165, 250, 0.3);
      transition: all 0.2s ease;
    }

    .contenido-seccion a:hover {
      color: #3b82f6;
      border-bottom-color: #3b82f6;
    }

    /* Tabla de datos */
    .tabla-datos {
      width: 100%;
      border-collapse: collapse;
      margin-top: 1rem;
      font-size: 0.9rem;
    }

    .tabla-datos thead th {
      background: rgba(59, 130, 246, 0.15);
      color: #ffffff;
      padding: 0.8rem 1rem;
      text-align: left;
      font-weight: 600;
      border-bottom: 2px solid rgba(59, 130, 246, 0.3);
    }

    .tabla-datos thead th:first-child {
      border-radius: 8px 0 0 0;
    }

    .tabla-datos thead th:last-child {
      border-radius: 0 8px 0 0;
    }

    .tabla-datos tbody td {
      padding: 0.8rem 1rem;
      border-bottom: 1px solid rgba(255, 255, 255, 0.05);
      color: rgba(255, 255, 255, 0.6);
    }

    .tabla-datos tbody tr:hover td {
      background: rgba(59, 130, 246, 0.05);
      color: rgba(255, 255, 255, 0.8);
    }

    /* Lista con iconos */
    .lista-derechos {
      list-style: none;
      padding: 0;
      margin-top: 0.8rem;
    }

    .lista-derechos li {
      display: flex;
      align-items: flex-start;
      gap: 0.7rem;
      margin-bottom: 0.8rem;
      color: rgba(255, 255, 255, 0.65);
    }

    .lista-derechos li::before {
      content: '🔒';
      font-size: 1rem;
      flex-shrink: 0;
      margin-top: 0.15rem;
    }

    /* =============================================
       PIE DE PÁGINA
       ============================================= */
    .pie-privacidad {
      text-align: center;
      margin-top: 3rem;
      padding: 2rem;
      background: rgba(20, 20, 20, 0.5);
      backdrop-filter: blur(15px);
      -webkit-backdrop-filter: blur(15px);
      border: 1px solid rgba(255, 255, 255, 0.05);
      border-radius: 20px;
    }

    .pie-privacidad p {
      color: rgba(255, 255, 255, 0.4);
      font-size: 0.85rem;
      margin-bottom: 0.5rem;
    }

    .pie-privacidad p:last-child {
      margin-bottom: 0;
    }

    .pie-privacidad strong {
      color: rgba(255, 255, 255, 0.6);
    }

    /* =============================================
       BOTÓN VOLVER AL LOGIN (FLOTANTE)
       ============================================= */
    .boton-volver-login {
      position: fixed;
      bottom: 2rem;
      right: 2rem;
      width: 48px;
      height: 48px;
      background: linear-gradient(135deg, #3b82f6, #1d4ed8);
      border: none;
      border-radius: 14px;
      color: #ffffff;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      z-index: 200;
      text-decoration: none;
      box-shadow: 0 8px 30px rgba(59, 130, 246, 0.45);
      transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
      animation: flotarBoton 3s ease-in-out infinite;
    }

    @keyframes flotarBoton {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-6px); }
    }

    .boton-volver-login:hover {
      background: linear-gradient(135deg, #60a5fa, #3b82f6);
      transform: translateY(-5px) scale(1.05);
      box-shadow: 0 15px 40px rgba(59, 130, 246, 0.6);
      animation: none;
    }

    .boton-volver-login:active {
      transform: scale(0.92);
    }

    .boton-volver-login svg {
      width: 22px;
      height: 22px;
      fill: #ffffff;
      transition: transform 0.3s ease;
    }

    .boton-volver-login:hover svg {
      transform: translateX(-2px);
    }

    /* Tooltip al hover */
    .boton-volver-login::after {
      content: 'Ir al login';
      position: absolute;
      right: 60px;
      background: rgba(20, 20, 20, 0.9);
      backdrop-filter: blur(10px);
      color: #ffffff;
      padding: 0.4rem 0.8rem;
      border-radius: 8px;
      font-size: 0.78rem;
      font-weight: 500;
      white-space: nowrap;
      pointer-events: none;
      opacity: 0;
      transform: translateX(10px);
      transition: all 0.3s ease;
      border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .boton-volver-login:hover::after {
      opacity: 1;
      transform: translateX(0);
    }

    /* =============================================
       BANNER DE COOKIES (DECORATIVO - INFORMATIVO)
       ============================================= */
    .banner-cookies {
      background: rgba(20, 20, 20, 0.7);
      backdrop-filter: blur(15px);
      -webkit-backdrop-filter: blur(15px);
      border: 1px solid rgba(59, 130, 246, 0.2);
      border-radius: 16px;
      padding: 1.5rem;
      margin-bottom: 1.5rem;
      display: flex;
      align-items: center;
      gap: 1rem;
      flex-wrap: wrap;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
    }

    .banner-cookies-icono {
      font-size: 2rem;
      flex-shrink: 0;
    }

    .banner-cookies-texto {
      flex: 1;
      min-width: 200px;
      color: rgba(255, 255, 255, 0.65);
      font-size: 0.9rem;
      line-height: 1.6;
    }

    .banner-cookies-texto strong {
      color: #ffffff;
    }

    /* =============================================
       RESPONSIVE
       ============================================= */
    @media (max-width: 768px) {
      .contenedor-principal {
        padding: 2rem 1rem 4rem;
      }

      .hero-privacidad {
        padding: 2rem 1.5rem;
        border-radius: 18px;
      }

      .titulo-hero {
        font-size: 1.7rem;
      }

      .seccion-privacidad {
        padding: 1.5rem 1.5rem;
        border-radius: 16px;
      }

      .titulo-seccion {
        font-size: 1.1rem;
      }

      .barra-superior {
        padding: 0 1rem;
      }

      .logo-texto-secundario {
        display: none;
      }

      .boton-volver-login {
        bottom: 1.5rem;
        right: 1.5rem;
        width: 44px;
        height: 44px;
      }

      .boton-volver-login::after {
        display: none;
      }

      .tabla-datos {
        font-size: 0.78rem;
      }

      .tabla-datos thead th,
      .tabla-datos tbody td {
        padding: 0.6rem 0.7rem;
      }
    }

    @media (max-width: 480px) {
      .hero-privacidad {
        padding: 1.5rem 1rem;
      }

      .titulo-hero {
        font-size: 1.4rem;
      }

      .icono-hero {
        width: 55px;
        height: 55px;
      }

      .icono-hero svg {
        width: 26px;
        height: 26px;
      }

      .seccion-privacidad {
        padding: 1.2rem 1rem;
        border-radius: 14px;
      }

      .contenido-seccion {
        font-size: 0.88rem;
      }

      .tabla-datos {
        font-size: 0.7rem;
      }

      .tabla-datos thead th,
      .tabla-datos tbody td {
        padding: 0.5rem;
      }
    }
  </style>
</head>
<body>

  <!-- =============================================
       BARRA SUPERIOR
       ============================================= -->
  <nav class="barra-superior" aria-label="Navegación principal">
    <a href="{{ url('/') }}" class="logo-pcm" aria-label="Ir al inicio">
      <div class="logo-icono" aria-hidden="true">🏛️</div>
      <div class="logo-texto">
        <span class="logo-texto-principal">PCM</span>
        <span class="logo-texto-secundario">Presidencia del Consejo de Ministros</span>
      </div>
    </a>

    <a href="{{ url('/') }}" class="boton-volver" aria-label="Volver al inicio de sesión">
      <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
        <path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"/>
      </svg>
      <span>Volver</span>
    </a>
  </nav>

  <!-- =============================================
       CONTENEDOR PRINCIPAL
       ============================================= -->
  <main class="contenedor-principal">

    <!-- HERO -->
    <header class="hero-privacidad" aria-labelledby="titulo-principal">
      <div class="icono-hero" aria-hidden="true">
        <svg viewBox="0 0 24 24">
          <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm0 10.99h7c-.53 4.12-3.28 7.79-7 8.94V12H5V6.3l7-3.11v8.8z"/>
        </svg>
      </div>
      <h1 id="titulo-principal" class="titulo-hero">Política de Privacidad</h1>
      <p class="subtitulo-hero">Sistema de Gestión de Visitas · Presidencia del Consejo de Ministros del Perú</p>
      <span class="fecha-actualizacion">📅 Última actualización: 19 de mayo de 2026</span>
    </header>

    <!-- BANNER DE COOKIES -->
    <div class="banner-cookies" role="complementary" aria-label="Información sobre cookies">
      <span class="banner-cookies-icono" aria-hidden="true">🍪</span>
      <div class="banner-cookies-texto">
        <strong>Este sitio utiliza cookies esenciales</strong> para garantizar su correcto funcionamiento y mejorar la seguridad. No se utilizan cookies de seguimiento ni publicitarias. Al continuar navegando, acepta nuestro uso de cookies.
      </div>
    </div>

    <!-- SECCIÓN 1 -->
    <section class="seccion-privacidad" aria-labelledby="titulo-seccion-1">
      <span class="numero-seccion" aria-hidden="true">1</span>
      <h2 id="titulo-seccion-1" class="titulo-seccion">Introducción y Marco Legal</h2>
      <div class="contenido-seccion">
        <p>La <strong>Presidencia del Consejo de Ministros del Perú</strong> (en adelante, <strong>"PCM"</strong>), en su calidad de titular del Banco de Datos Personales, asume el firme compromiso de proteger la privacidad de todos los ciudadanos que utilizan el <strong>Sistema de Gestión de Visitas</strong>.</p>
        <p>La presente Política de Privacidad se rige por la <strong>Ley N° 29733 – Ley de Protección de Datos Personales</strong>, su Reglamento aprobado por Decreto Supremo N° 003-2013-JUS, y demás normativas complementarias emitidas por la Autoridad Nacional de Protección de Datos Personales (<strong>ANPDP</strong>).</p>
      </div>
    </section>

    <!-- SECCIÓN 2 -->
    <section class="seccion-privacidad" aria-labelledby="titulo-seccion-2">
      <span class="numero-seccion" aria-hidden="true">2</span>
      <h2 id="titulo-seccion-2" class="titulo-seccion">Responsable del Tratamiento</h2>
      <div class="contenido-seccion">
        <p>El responsable del tratamiento de los datos personales recolectados a través del sistema es:</p>
        <p>
          <strong>Presidencia del Consejo de Ministros</strong><br>
          📍 Jirón de la Unión 284, Cercado de Lima, Perú<br>
          📧 Correo electrónico: mesadepartes@pcm.gob.pe<br>
          📞 Central telefónica: (01) 219-7000
        </p>
        <p>Para cualquier consulta relacionada con sus datos personales, puede contactar a nuestro <strong>Oficial de Protección de Datos Personales</strong> a través de los canales mencionados.</p>
      </div>
    </section>

    <!-- SECCIÓN 3 -->
    <section class="seccion-privacidad" aria-labelledby="titulo-seccion-3">
      <span class="numero-seccion" aria-hidden="true">3</span>
      <h2 id="titulo-seccion-3" class="titulo-seccion">Datos Personales que Recolectamos</h2>
      <div class="contenido-seccion">
        <p>Para el correcto funcionamiento del Sistema de Gestión de Visitas, la PCM recolecta los siguientes datos personales, los cuales son estrictamente necesarios para los fines descritos:</p>

        <table class="tabla-datos" aria-label="Tabla de datos recolectados">
          <thead>
            <tr>
              <th scope="col">Categoría</th>
              <th scope="col">Datos específicos</th>
              <th scope="col">Finalidad</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><strong>Identificación</strong></td>
              <td>Nombres, apellidos, tipo y número de documento (DNI, carnet de extranjería)</td>
              <td>Verificación de identidad y registro de ingreso</td>
            </tr>
            <tr>
              <td><strong>Contacto</strong></td>
              <td>Correo electrónico, número telefónico</td>
              <td>Notificaciones sobre el estado de la visita</td>
            </tr>
            <tr>
              <td><strong>Imagen</strong></td>
              <td>Fotografía del rostro (capturada al momento del registro)</td>
              <td>Control de acceso y seguridad</td>
            </tr>
            <tr>
              <td><strong>Datos de visita</strong></td>
              <td>Fecha, hora de ingreso y salida, área visitada, persona a quien visita</td>
              <td>Trazabilidad y control de permanencia</td>
            </tr>
            <tr>
              <td><strong>Datos de navegación</strong></td>
              <td>Dirección IP, tipo de navegador, sistema operativo</td>
              <td>Seguridad informática y prevención de fraudes</td>
            </tr>
          </tbody>
        </table>
      </div>
    </section>

    <!-- SECCIÓN 4 -->
    <section class="seccion-privacidad" aria-labelledby="titulo-seccion-4">
      <span class="numero-seccion" aria-hidden="true">4</span>
      <h2 id="titulo-seccion-4" class="titulo-seccion">Finalidad del Tratamiento</h2>
      <div class="contenido-seccion">
        <p>Los datos personales recolectados serán utilizados exclusivamente para las siguientes finalidades:</p>
        <p><strong>a)</strong> Gestionar el registro, control y monitoreo de visitantes en las instalaciones de la PCM.</p>
        <p><strong>b)</strong> Garantizar la seguridad de las personas, instalaciones y bienes del Estado.</p>
        <p><strong>c)</strong> Cumplir con las obligaciones legales y normativas aplicables a entidades públicas.</p>
        <p><strong>d)</strong> Elaborar estadísticas anonimizadas para la mejora continua del sistema.</p>
        <p><strong>e)</strong> Atender consultas, reclamos o solicitudes relacionadas con el servicio de visitas.</p>
      </div>
    </section>

    <!-- SECCIÓN 5 -->
    <section class="seccion-privacidad" aria-labelledby="titulo-seccion-5">
      <span class="numero-seccion" aria-hidden="true">5</span>
      <h2 id="titulo-seccion-5" class="titulo-seccion">Consentimiento del Titular</h2>
      <div class="contenido-seccion">
        <p>Al registrarse en el <strong>Sistema de Gestión de Visitas</strong>, usted otorga su consentimiento expreso, libre, previo e informado para el tratamiento de sus datos personales conforme a los términos establecidos en la presente Política de Privacidad.</p>
        <p>Usted tiene derecho a <strong>revocar su consentimiento</strong> en cualquier momento, sin que ello afecte la licitud del tratamiento realizado con anterioridad. Sin embargo, la revocación del consentimiento para datos esenciales impedirá el uso del sistema, ya que dichos datos son necesarios para los fines descritos.</p>
      </div>
    </section>

    <!-- SECCIÓN 6 -->
    <section class="seccion-privacidad" aria-labelledby="titulo-seccion-6">
      <span class="numero-seccion" aria-hidden="true">6</span>
      <h2 id="titulo-seccion-6" class="titulo-seccion">Plazo de Conservación</h2>
      <div class="contenido-seccion">
        <p>Los datos personales serán conservados durante el tiempo estrictamente necesario para cumplir con las finalidades descritas y de acuerdo con los plazos establecidos por la normativa archivística y de transparencia del Estado peruano:</p>
        <p>✓ <strong>Datos de identificación y visita:</strong> Conservados por un período
