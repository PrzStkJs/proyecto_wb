<!--
|--------------------------------------------------------------------------
| Nombre      : Jesus Alexander Perez
| Fecha       : 25/05/2026
| Descripción : Vista de acceso mediante QR para validación de identidad.
|--------------------------------------------------------------------------
-->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso QR · Validación</title>
    <link rel="stylesheet" href="{{ asset('Styles/idVisit-log.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
</head>
<body>

    <!-- Sección 1 : Encabezado -->
    <header class="header">
        <div class="logo-container">
            <img src="{{ asset('img/gob.png') }}" alt="Logo Gob Perú">
            <span>Registro de visitas y gestión de intereses</span>
        </div>
    </header>

    <!-- Sección 2 : Instrucciones y código QR -->
    <main class="contenido-qr">

        <!-- Columna izquierda: pasos a seguir -->
        <section class="columna-pasos">
            <h2 class="titulo-pasos">Instrucciones para validar su identidad</h2>
            <ol class="lista-pasos">
                <li class="paso"><p>Escanee el código QR con la cámara de su teléfono o Google Lens.</p></li>
                <li class="paso"><p>Acceda al enlace que aparecerá en su pantalla para abrir el portal de validación.</p></li>
                <li class="paso"><p>Confirme su identidad ingresando sus credenciales o usando el reconocimiento biométrico de su equipo.</p></li>
                <li class="paso"><p>Presione "Autorizar Ingreso" para activar el acceso en esta terminal de forma automática.</p></li>
            </ol>
        </section>

        <!-- Columna derecha: código QR generado con el token -->
        <section class="columna-qr">
            <div class="contenedor-qr">
                <div id="qrcode" data-token="{{ $token }}" data-base-url="{{ url('/') }}" style="padding: 10px; background: white; border-radius: 8px;"></div>
            </div>
        </section>

    </main>

    <script src="{{ asset('Js/idVisit-log.js') }}"></script>
</body>
</html>
