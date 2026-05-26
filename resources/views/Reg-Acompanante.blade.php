<!--
|--------------------------------------------------------------------------
| Nombre      : Jesus Alexander Perez
| Fecha       : 25/05/2026
| Descripción : Formulario para agregar acompañante a una visita existente.
|--------------------------------------------------------------------------
-->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Acompañante · Registro</title>
    <link rel="stylesheet" href="{{ asset('Styles/Reg-Acompanante.css') }}">
    <script src="{{ asset('Js/Reg-Acompanante.js') }}" defer></script>
</head>
<body>

    <!-- Sección 1 : Título y formulario -->
    <main class="contenedor-formulario">
        <h1 class="titulo-formulario">Agregar Acompañante</h1>

        <form id="formAcompanante" class="formulario-visita" action="{{ route('visitas.acompanante.store') }}" method="POST">
            @csrf

            <!-- ID de la visita -->
            <input type="hidden" name="visita_id" value="{{ $visita->VTA_N_ID }}">

            <!-- Sección 2 : Campos del acompañante + silueta -->
            <div class="fila-superior">

                <!-- Columna izquierda: campos -->
                <div class="columna-campos">

                    <!-- Tipo de documento (fijo) -->
                    <div class="grupo-campo">
                        <label for="tipoDocumento" class="etiqueta">Tipo de documento</label>
                        <input type="text" id="tipoDocumento" name="tipoDocumento" class="input-texto input-fijo" value="DOCUMENTO NACIONAL DE IDENTIDAD (DNI)" readonly>
                    </div>

                    <!-- Número de documento -->
                    <div class="grupo-campo">
                        <label for="numeroDocumento" class="etiqueta">Número de documento</label>
                        <input type="text" id="numeroDocumento" name="numeroDocumento" class="input-texto" placeholder="Ingrese el número de documento" inputmode="numeric" maxlength="8">
                        <p id="mensaje-dni" class="mensaje-api"></p>
                    </div>

                    <!-- Campos ocultos para nombres y apellidos desde API -->
                    <input type="hidden" id="nombres_api" name="nombres_api">
                    <input type="hidden" id="apellidos_api" name="apellidos_api">

                    <!-- Fecha y hora (solo lectura) -->
                    <div class="fila-fecha-hora">
                        <div class="grupo-campo">
                            <label for="fechaVisita" class="etiqueta">Fecha</label>
                            <input type="text" id="fechaVisita" name="fechaVisita" class="input-texto input-fijo" value="{{ now()->format('d/m/Y') }}" readonly>
                        </div>

                        <div class="grupo-campo">
                            <label for="horaVisita" class="etiqueta">Hora</label>
                            <input type="text" id="horaVisita" name="horaVisita" class="input-texto input-fijo" value="{{ now()->format('H:i') }}" readonly>
                        </div>
                    </div>

                </div>

                <!-- Columna derecha: silueta -->
                <div class="columna-foto">
                    <div class="contenedor-foto">
                        <svg class="silueta-persona" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="8" r="5" />
                            <path d="M20 21a8 8 0 1 0-16 0" />
                        </svg>
                    </div>
                </div>

            </div>

            <!-- Sección 3 : Botón de envío -->
            <button type="submit" id="btnSubmit" class="boton-continuar" disabled style="opacity: 0.5; cursor: not-allowed;">
                Agregar Acompañante
            </button>

        </form>
    </main>

    <!-- Variable global para la URL de consulta DNI -->
    <script>
        window.apiConsultaDniUrl = "{{ url('api/consultar-dni') }}";
    </script>
</body>
</html>
