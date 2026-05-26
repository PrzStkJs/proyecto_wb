<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
  <title>Términos de Servicio · Sistema de Visitas PCM</title>

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
    .hero-terminos {
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

    .hero-terminos::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 3px;
      background: linear-gradient(90deg,
        transparent 0%,
        rgba(220, 38, 38, 0.4) 20%,
        #dc2626 50%,
        rgba(220, 38, 38, 0.4) 80%,
        transparent 100%);
      animation: lineaHero 4s ease-in-out infinite;
    }

    @keyframes lineaHero {
      0%, 100% { opacity: 0.6; }
      50% { opacity: 1; }
    }

    .hero-terminos::after {
      content: '';
      position: absolute;
      top: -120px;
      right: -120px;
      width: 300px;
      height: 300px;
      background: radial-gradient(circle, rgba(220, 38, 38, 0.1) 0%, transparent 70%);
      border-radius: 50%;
      pointer-events: none;
    }

    .icono-hero {
      width: 70px;
      height: 70px;
      margin: 0 auto 1.5rem;
      background: linear-gradient(135deg, #dc2626, #991b1b);
      border-radius: 20px;
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow:
        0 15px 35px rgba(220, 38, 38, 0.4),
        0 0 0 8px rgba(220, 38, 38, 0.08);
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
      background: rgba(220, 38, 38, 0.1);
      border: 1px solid rgba(220, 38, 38, 0.2);
      border-radius: 20px;
      font-size: 0.8rem;
      color: #ef4444;
      font-weight: 500;
      position: relative;
      z-index: 1;
    }

    /* =============================================
       SECCIONES DE CONTENIDO
       ============================================= */
    .seccion-terminos {
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

    .seccion-terminos:nth-child(1) { animation-delay: 0.1s; }
    .seccion-terminos:nth-child(2) { animation-delay: 0.2s; }
    .seccion-terminos:nth-child(3) { animation-delay: 0.3s; }
    .seccion-terminos:nth-child(4) { animation-delay: 0.4s; }
    .seccion-terminos:nth-child(5) { animation-delay: 0.5s; }
    .seccion-terminos:nth-child(6) { animation-delay: 0.6s; }
    .seccion-terminos:nth-child(7) { animation-delay: 0.7s; }
    .seccion-terminos:nth-child(8) { animation-delay: 0.8s; }

    @keyframes entradaSeccion {
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .seccion-terminos:hover {
      border-color: rgba(220, 38, 38, 0.25);
      box-shadow:
        0 15px 40px rgba(0, 0, 0, 0.4),
        0 0 0 1px rgba(220, 38, 38, 0.1);
      transform: translateY(-2px);
    }

    .seccion-terminos::before {
      content: '';
      position: absolute;
      left: 0;
      top: 0;
      bottom: 0;
      width: 3px;
      background: linear-gradient(180deg, #dc2626, transparent 80%);
      border-radius: 3px 0 0 3px;
      opacity: 0;
      transition: opacity 0.35s ease;
    }

    .seccion-terminos:hover::before {
      opacity: 1;
    }

    .numero-seccion {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 36px;
      height: 36px;
      background: linear-gradient(135deg, #dc2626, #991b1b);
      border-radius: 10px;
      color: #ffffff;
      font-weight: 700;
      font-size: 0.9rem;
      margin-bottom: 1rem;
      box-shadow: 0 6px 20px rgba(220, 38, 38, 0.3);
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
      color: #ef4444;
      text-decoration: none;
      font-weight: 500;
      border-bottom: 1px solid rgba(239, 68, 68, 0.3);
      transition: all 0.2s ease;
    }

    .contenido-seccion a:hover {
      color: #dc2626;
      border-bottom-color: #dc2626;
    }

    /* =============================================
       LISTA DE CONTACTO
       ============================================= */
    .lista-contacto {
      list-style: none;
      padding: 0;
      margin-top: 0.8rem;
    }

    .lista-contacto li {
      display: flex;
      align-items: flex-start;
      gap: 0.6rem;
      margin-bottom: 0.6rem;
      color: rgba(255, 255, 255, 0.65);
    }

    .lista-contacto li::before {
      content: '';
      width: 6px;
      height: 6px;
      background: #dc2626;
      border-radius: 50%;
      margin-top: 0.55rem;
      flex-shrink: 0;
    }

    /* =============================================
       PIE DE PÁGINA
       ============================================= */
    .pie-terminos {
      text-align: center;
      margin-top: 3rem;
      padding: 2rem;
      background: rgba(20, 20, 20, 0.5);
      backdrop-filter: blur(15px);
      -webkit-backdrop-filter: blur(15px);
      border: 1px solid rgba(255, 255, 255, 0.05);
      border-radius: 20px;
    }

    .pie-terminos p {
      color: rgba(255, 255, 255, 0.4);
      font-size: 0.85rem;
      margin-bottom: 0.5rem;
    }

    .pie-terminos p:last-child {
      margin-bottom: 0;
    }

    .pie-terminos strong {
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
      background: linear-gradient(135deg, #dc2626, #b91c1c);
      border: none;
      border-radius: 14px;
      color: #ffffff;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      z-index: 200;
      text-decoration: none;
      box-shadow: 0 8px 30px rgba(220, 38, 38, 0.45);
      transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
      animation: flotarBoton 3s ease-in-out infinite;
    }

    @keyframes flotarBoton {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-6px); }
    }

    .boton-volver-login:hover {
      background: linear-gradient(135deg, #ef4444, #dc2626);
      transform: translateY(-5px) scale(1.05);
      box-shadow: 0 15px 40px rgba(220, 38, 38, 0.6);
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
       RESPONSIVE
       ============================================= */
    @media (max-width: 768px) {
      .contenedor-principal {
        padding: 2rem 1rem 4rem;
      }

      .hero-terminos {
        padding: 2rem 1.5rem;
        border-radius: 18px;
      }

      .titulo-hero {
        font-size: 1.7rem;
      }

      .seccion-terminos {
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
    }

    @media (max-width: 480px) {
      .hero-terminos {
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

      .seccion-terminos {
        padding: 1.2rem 1rem;
        border-radius: 14px;
      }

      .contenido-seccion {
        font-size: 0.88rem;
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
    <header class="hero-terminos" aria-labelledby="titulo-principal">
      <div class="icono-hero" aria-hidden="true">
        <svg viewBox="0 0 24 24">
          <path d="M14 2H6c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V8l-6-6zM6 20V4h7v5h5v11H6zm2-6h8v1.5H8V14zm0-3h8v1.5H8V11zm0 6h5v1.5H8V17z"/>
          <path d="M8 8h5v1.5H8V8z" opacity="0.5"/>
        </svg>
      </div>
      <h1 id="titulo-principal" class="titulo-hero">Términos de Servicio</h1>
      <p class="subtitulo-hero">Sistema de Gestión de Visitas · Presidencia del Consejo de Ministros del Perú</p>
      <span class="fecha-actualizacion">📅 Última actualización: 19 de mayo de 2026</span>
    </header>

    <!-- SECCIÓN 1 -->
    <section class="seccion-terminos" aria-labelledby="titulo-seccion-1">
      <span class="numero-seccion" aria-hidden="true">1</span>
      <h2 id="titulo-seccion-1" class="titulo-seccion">Aceptación de los Términos</h2>
      <div class="contenido-seccion">
        <p>Al acceder y utilizar el <strong>Sistema de Gestión de Visitas</strong> de la Presidencia del Consejo de Ministros (en adelante, <strong>"PCM"</strong>), usted acepta expresamente los presentes Términos de Servicio. Si no está de acuerdo con alguna de las disposiciones aquí establecidas, deberá abstenerse de utilizar la plataforma.</p>
        <p>El uso del sistema implica su conformidad plena y sin reservas con todas y cada una de las cláusulas que componen este documento, las cuales podrán ser actualizadas periódicamente sin previo aviso.</p>
      </div>
    </section>

    <!-- SECCIÓN 2 -->
    <section class="seccion-terminos" aria-labelledby="titulo-seccion-2">
      <span class="numero-seccion" aria-hidden="true">2</span>
      <h2 id="titulo-seccion-2" class="titulo-seccion">Descripción del Servicio</h2>
      <div class="contenido-seccion">
        <p>El <strong>Sistema de Gestión de Visitas</strong> es una plataforma digital oficial de la PCM diseñada para:</p>
        <p>✓ Registrar y gestionar el ingreso de visitantes a las instalaciones de la Presidencia del Consejo de Ministros.</p>
        <p>✓ Controlar y monitorear el flujo de personas en tiempo real.</p>
        <p>✓ Garantizar la seguridad y trazabilidad de todas las visitas realizadas.</p>
        <p>✓ Cumplir con las normativas vigentes en materia de control de acceso a entidades públicas.</p>
      </div>
    </section>

    <!-- SECCIÓN 3 -->
    <section class="seccion-terminos" aria-labelledby="titulo-seccion-3">
      <span class="numero-seccion" aria-hidden="true">3</span>
      <h2 id="titulo-seccion-3" class="titulo-seccion">Obligaciones del Usuario</h2>
      <div class="contenido-seccion">
        <p>Al utilizar el sistema, usted se compromete a:</p>
        <p><strong>a)</strong> Proporcionar información veraz, precisa y actualizada durante el registro de su visita.</p>
        <p><strong>b)</strong> No suplantar la identidad de terceros ni utilizar documentos falsos o alterados.</p>
        <p><strong>c)</strong> Respetar las normas de conducta y seguridad establecidas dentro de las instalaciones de la PCM.</p>
        <p><strong>d)</strong> No intentar vulnerar, hackear o comprometer la seguridad del sistema.</p>
        <p><strong>e)</strong> Reportar inmediatamente cualquier uso no autorizado de su cuenta o cualquier brecha de seguridad detectada.</p>
      </div>
    </section>

    <!-- SECCIÓN 4 -->
    <section class="seccion-terminos" aria-labelledby="titulo-seccion-4">
      <span class="numero-seccion" aria-hidden="true">4</span>
      <h2 id="titulo-seccion-4" class="titulo-seccion">Protección de Datos Personales</h2>
      <div class="contenido-seccion">
        <p>La PCM, en cumplimiento de la <strong>Ley N° 29733 – Ley de Protección de Datos Personales</strong> y su reglamento, garantiza que todos los datos personales recolectados a través del sistema serán tratados con estricta confidencialidad y utilizados exclusivamente para los fines de gestión de visitas.</p>
        <p>Para mayor información, consulte nuestra <a href="{{ url('/Politica_de_privacidad') }}">Política de Privacidad</a>.</p>
      </div>
    </section>

    <!-- SECCIÓN 5 -->
    <section class="seccion-terminos" aria-labelledby="titulo-seccion-5">
      <span class="numero-seccion" aria-hidden="true">5</span>
      <h2 id="titulo-seccion-5" class="titulo-seccion">Propiedad Intelectual</h2>
      <div class="contenido-seccion">
        <p>Todos los derechos de propiedad intelectual sobre el software, diseño, logotipos, marcas y cualquier otro contenido del <strong>Sistema de Gestión de Visitas</strong> pertenecen exclusivamente a la Presidencia del Consejo de Ministros del Perú o a sus licenciantes.</p>
        <p>Queda estrictamente prohibida la reproducción, distribución, modificación o cualquier otro uso no autorizado del contenido sin el consentimiento previo y por escrito de la PCM.</p>
      </div>
    </section>

    <!-- SECCIÓN 6 -->
    <section class="seccion-terminos" aria-labelledby="titulo-seccion-6">
      <span class="numero-seccion" aria-hidden="true">6</span>
      <h2 id="titulo-seccion-6" class="titulo-seccion">Limitación de Responsabilidad</h2>
      <div class="contenido-seccion">
        <p>La PCM no será responsable por:</p>
        <p><strong>a)</strong> Interrupciones temporales del servicio debido a mantenimiento técnico o causas de fuerza mayor.</p>
        <p><strong>b)</strong> Daños o perjuicios derivados del uso indebido del sistema por parte del usuario.</p>
        <p><strong>c)</strong> Pérdida de datos ocasionada por fallos técnicos ajenos al control razonable de la PCM.</p>
        <p>El sistema se proporciona <strong>"tal cual"</strong> y la PCM no otorga garantías explícitas o implícitas sobre su funcionamiento ininterrumpido o libre de errores.</p>
      </div>
    </section>

    <!-- SECCIÓN 7 -->
    <section class="seccion-terminos" aria-labelledby="titulo-seccion-7">
      <span class="numero-seccion" aria-hidden="true">7</span>
      <h2 id="titulo-seccion-7" class="titulo-seccion">Sanciones por Incumplimiento</h2>
      <div class="contenido-seccion">
        <p>El incumplimiento de cualquiera de las obligaciones establecidas en los presentes Términos de Servicio podrá dar lugar a:</p>
        <p>✓ La restricción o suspensión inmediata del acceso al sistema.</p>
        <p>✓ La denegación de futuras visitas a las instalaciones de la PCM.</p>
        <p>✓ Las acciones legales correspondientes de acuerdo con la legislación peruana vigente.</p>
      </div>
    </section>

    <!-- SECCIÓN 8 -->
    <section class="seccion-terminos" aria-labelledby="titulo-seccion-8">
      <span class="numero-seccion" aria-hidden="true">8</span>
      <h2 id="titulo-seccion-8" class="titulo-seccion">Modificaciones y Contacto</h2>
      <div class="contenido-seccion">
        <p>La PCM se reserva el derecho de modificar los presentes Términos de Servicio en cualquier momento. Las modificaciones entrarán en vigor desde su publicación en esta página. Se recomienda revisar periódicamente este documento.</p>
        <p>Para cualquier consulta, duda o reporte relacionado con estos términos, puede contactarnos a través de los siguientes canales oficiales:</p>
        <ul class="lista-contacto">
          <li>📍 Sede Central: Jirón de la Unión 284, Cercado de Lima, Perú</li>
          <li>📧 Correo electrónico: mesadepartes@pcm.gob.pe</li>
          <li>📞 Central telefónica: (01) 219-7000</li>
          <li>🌐 Portal web: www.gob.pe/pcm</li>
        </ul>
      </div>
    </section>

    <!-- PIE -->
    <footer class="pie-terminos">
      <p>© {{ date('Y') }} <strong>Presidencia del Consejo de Ministros del Perú</strong></p>
      <p>Todos los derechos reservados · Gobierno de la República del Perú</p>
    </footer>

  </main>

  <!-- =============================================
       BOTÓN FLOTANTE: VOLVER AL LOGIN
       ============================================= -->
  <a href="{{ url('/') }}" class="boton-volver-login" id="botonVolverLogin" aria-label="Volver al inicio de sesión" title="Ir al login">
    <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
      <path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"/>
    </svg>
  </a>

  <!-- =============================================
       SCRIPT
       ============================================= -->
  <script>
    (function () {
      'use strict';

      /* =============================================
         EFECTO DE REVELACIÓN AL HACER SCROLL
         (Intersection Observer para secciones)
         ============================================= */
      function inicializarObserver() {
        if (!('IntersectionObserver' in window)) return;

        const secciones = document.querySelectorAll('.seccion-terminos');

        const observer = new IntersectionObserver((entradas) => {
          entradas.forEach((entrada) => {
            if (entrada.isIntersecting) {
              entrada.target.style.opacity = '1';
              entrada.target.style.transform = 'translateY(0)';
            }
          });
        }, {
          threshold: 0.1,
          rootMargin: '0px 0px -50px 0px'
        });

        secciones.forEach((seccion) => {
          observer.observe(seccion);
        });
      }

      /* =============================================
         INICIALIZACIÓN
         ============================================= */
      function inicializar() {
        inicializarObserver();

        console.log('📄 Página de Términos de Servicio cargada');
        console.log('🏛️ Sistema de Visitas · PCM Perú');
      }

      if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', inicializar);
      } else {
        inicializar();
      }
    })();
  </script>

</body>
</html>
