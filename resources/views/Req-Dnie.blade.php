<!--
|--------------------------------------------------------------------------
| Nombre      : Jesus Alexander Perez
| Fecha       : 25/05/2026
| Descripción : Pantalla de validación del lector de DNIe. Confirma
|               conexión del dispositivo y redirige al PIN.
|--------------------------------------------------------------------------
-->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lector DNIe - Validación</title>
    <link rel="stylesheet" href="{{ asset('Styles/Req-Dnie.css') }}">
    <script src="{{ asset('Js/Req-Dnie.js') }}" defer></script>
</head>
<body>
    <div class="lector-container">
        <div class="lector-card">

            <!-- Sección 1 : Título -->
            <h1 class="lector-title">Inserta tu DNIe en el dispositivo lector</h1>

            <!-- Sección 2 : Alerta informativa -->
            <div class="lector-alert">
                <p>⚠️ <strong>Importante:</strong> Asegúrese de tener conectado su lector USB e iniciado el <strong>Agente de Autenticación Local (.exe)</strong> antes de proceder.</p>
            </div>

            <!-- Sección 3 : Imagen del DNIe -->
            <div class="lector-image">
                <img src="{{ asset('img/dnie_obt.png') }}" alt="Insertar DNIe en lector" class="lector-img">
            </div>

            <!-- Sección 4 : Checkbox de confirmación -->
            <div class="lector-checkbox">
                <input type="checkbox" id="chkContinuar" class="lector-check">
                <label for="chkContinuar" class="lector-label">Confirmo que el dispositivo y DNIe están listos.</label>
            </div>

            <!-- Sección 5 : Botones de acción -->
            <div class="lector-buttons">
                <button class="btn btn-continuar" id="btnContinuar" disabled>Continuar</button>
                <a href="{{ url('/Autenticarse') }}" class="btn btn-cancelar" id="btnCancelar">Cancelar</a>
            </div>
        </div>
    </div>
</body>
</html>
