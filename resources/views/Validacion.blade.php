<!--
|--------------------------------------------------------------------------
| Nombre      : Jesus Alexander Perez
| Fecha       : 25/05/2026
| Descripción : Portal móvil para autorizar el ingreso escaneado por QR.
|--------------------------------------------------------------------------
-->

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
  <title>Portal de Validación · PCM</title>
  <link rel="stylesheet" href="{{ asset('Styles/Validacion.css') }}">

  <meta name="csrf-token" content="{{ csrf_token() }}">

  <script src="{{ asset('Js/Validacion.js') }}" defer></script>
</head>
<body>

  <!-- Sección 1 : Encabezado oficial -->
  <header class="header">
    <div class="logo-container">
      <img src="{{ asset('img/gob.png') }}" alt="Logo Gob Perú">
      <span>Registro de visitas y gestión de intereses</span>
    </div>
  </header>

  <!-- Sección 2 : Portal de autorización -->
  <main class="portal-main" id="portal-contenedor" data-token="{{ $token }}" data-base-url="{{ url('/') }}">
    <div class="portal-card">

      <div class="portal-icono">
        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
          <path d="M9 12l2 2 4-4"/>
        </svg>
      </div>

      <h1 class="portal-titulo">Portal de Validación</h1>

      <p class="portal-descripcion">
        Presidencia del Consejo de Ministros del Perú<br>
        Sistema de Gestión de Visitas
      </p>

      <button class="portal-boton" id="btn-autorizar">
        Autorizar ingreso
      </button>

      <p class="portal-legal">
        Al autorizar, aceptas los <a href="{{ url('/Terminos_servicio') }}">Términos de servicio</a>
      </p>

    </div>
  </main>

</body>
</html>
