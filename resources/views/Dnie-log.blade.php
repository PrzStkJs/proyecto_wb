<!--
|--------------------------------------------------------------------------
| Nombre      : Jesus Alexander Perez
| Fecha       : 25/05/2026
| Descripción : Vista de ingreso de PIN del DNIe (autenticación nacional).
|--------------------------------------------------------------------------
-->

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
  <title>Plataforma de Autenticación Nacional</title>
  <link rel="stylesheet" href="{{ asset('Styles/Dnie-log.css') }}">
  <script src="{{ asset('Js/Dnie-log.js') }}" defer></script>
</head>
<body>

  <!-- Sección 1 : Encabezado oficial -->
  <header class="encabezado-pin">
    <img src="{{ asset('img/esucdo_solo.png') }}" alt="Escudo nacional" class="logo-escudo">
    <h1 class="titulo-plataforma">Plataforma de Autenticación Nacional</h1>
  </header>

  <!-- Sección 2 : Formulario de ingreso de PIN -->
  <main class="contenido-pin">
    <form id="form-dnie" onsubmit="return false;" data-base-url="{{ url('/') }}">>

      <label for="inputPin" class="etiqueta-pin">Ingresa tu PIN</label>

      <div class="contenedor-input-pin">
        <input type="password" id="inputPin" name="pin" class="input-pin" inputmode="numeric" maxlength="6" placeholder="••••••" autocomplete="off" required>
        <button type="button" class="boton-ojo" id="botonOjo" aria-label="Mostrar PIN">
          <svg class="icono-ojo" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
            <circle cx="12" cy="12" r="3"/>
          </svg>
        </button>
      </div>

      <p class="mensaje-intentos">Te quedan <span id="contadorIntentos">3</span> intentos restantes</p>

      <button type="submit" class="boton-ingresar">Ingresar</button>
      <a href="{{ url('/Autenticarse') }}" class="enlace-cancelar">Cancelar</a>
    </form>
  </main>

</body>
</html>
