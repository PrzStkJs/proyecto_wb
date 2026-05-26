<!--
|--------------------------------------------------------------------------
| Nombre      : Jesus Alexander Perez
| Fecha       : 25/05/2026
| Descripción : Formulario Paso 2 - Confirmación de visita, lugar de
|               trabajo y fecha/hora.
|--------------------------------------------------------------------------
-->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visita · Registro</title>
    <link rel="stylesheet" href="{{ asset('Styles/Reg-Entr2.css') }}">
    <script src="{{ asset('Js/Reg-Entr2.js') }}" defer></script>
</head>
<body>

    <main class="contenedor-formulario">
        <h1 class="titulo-formulario">Visita a {{ $nombre_visitado }}</h1>

        <p class="texto-registrando">Registrando a <span class="nombre-visitante">{{ $nombre_visitante }}</span></p>

        <form class="formulario-visita" action="{{ route('visitas.step2.store') }}" method="POST">
            @csrf

            <!-- Sección 1 : Datos del visitante -->
            <div class="fila-superior">
                <div class="columna-campos">

                    <!-- Lugar de trabajo -->
                    <fieldset class="seccion">
                        <legend class="titulo-seccion">Lugar de trabajo</legend>
                        <div class="opciones-lugar">
                            <label class="opcion">
                                <input type="radio" name="lugar_trabajo" value="entidad_publica">
                                <span class="opcion-texto">Entidad pública</span>
                            </label>
                            <label class="opcion">
                                <input type="radio" name="lugar_trabajo" value="empresa">
                                <span class="opcion-texto">Empresa</span>
                            </label>
                            <label class="opcion">
                                <input type="radio" name="lugar_trabajo" value="ninguno" checked>
                                <span class="opcion-texto">Ninguno</span>
                            </label>
                        </div>
                    </fieldset>

                    <!-- Nombre de la entidad -->
                    <div class="grupo-campo">
                        <label for="nombreEntidad" class="etiqueta">Nombre de la entidad <span class="opcional">(opcional)</span></label>
                        <input type="text" id="nombreEntidad" name="nombre_entidad" class="input-texto" placeholder="Nombre de la entidad" disabled>
                    </div>

                    <!-- Cargo -->
                    <div class="grupo-campo">
                        <label for="cargo" class="etiqueta">Cargo <span class="opcional">(opcional)</span></label>
                        <input type="text" id="cargo" name="cargo" class="input-texto" placeholder="Cargo del visitante" disabled>
                    </div>

                </div>

                <!-- Silueta -->
                <div class="columna-foto">
                    <div class="contenedor-foto">
                        <svg class="silueta-persona" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="8" r="5" />
                            <path d="M20 21a8 8 0 1 0-16 0" />
                        </svg>
                    </div>
                </div>

            </div>

            <!-- Sección 2 : Fecha y hora -->
            <fieldset class="seccion">
                <legend class="titulo-seccion">Fecha y hora de visita</legend>
                <div class="fila-fecha-hora">
                    <div class="grupo-campo">
                        <label for="fechaVisita" class="etiqueta">Fecha</label>
                        <input type="text" id="fechaVisita" name="fechaVisita" class="input-texto input-fijo" value="{{ now()->format('d/m/Y') }}" readonly>
                    </div>

                    <div class="grupo-campo">
                        <label for="horaVisita" class="etiqueta">Hora</label>
                        <input type="text" id="horaVisita" name="horaVisita" class="input-texto input-fijo" value="{{ now()->format('H:i:s') }}" readonly>
                    </div>
                </div>
            </fieldset>

            <!-- Sección 3 : Botones de navegación -->
            <div class="fila-botones">
                <button type="button" class="boton-anterior" onclick="window.history.back();">Anterior</button>
                <button type="submit" id="btnRegistrar" class="boton-registrar">Registrar</button>
            </div>

        </form>
    </main>

</body>
</html>
