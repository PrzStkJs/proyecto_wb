<!--
|--------------------------------------------------------------------------
| Nombre      : Jesus Alexander Perez
| Fecha       : 25/05/2026
| Descripción : Formulario Paso 1 - Registro de visitas con datos del
|               visitante y selección de funcionario, sede y motivo.
|--------------------------------------------------------------------------
-->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Visitas · Nueva Persona</title>
    <link rel="stylesheet" href="{{ asset('Styles/Reg-Entr.css') }}">
    <script src="{{ asset('Js/Reg-Entr.js') }}" defer></script>
</head>
<body>

    <main class="contenedor-formulario">
        <h1 class="titulo-formulario">Registro de Visitas</h1>

        <form class="formulario-visita" action="{{ route('visitas.step1.store') }}" method="POST">
            @csrf

            <!-- Sección 1 : Datos de visita -->
            <fieldset class="seccion">
                <legend class="titulo-seccion">Datos de visita</legend>

                <!-- A quién visita -->
                <div class="grupo-campo">
                    <label for="quienVisita" class="etiqueta">A quién visita</label>
                    <select id="quienVisita" name="quienVisita" class="input-texto" required>
                        <option value="" disabled selected>Seleccione una persona o área</option>
                        @foreach($funcionarios as $funcionario)
                        <option value="{{ $funcionario->FUN_N_ID }}"
                                data-sujeto-obligado="{{ $funcionario->FUN_B_SUJETO_OBLIGADO ? 'true' : 'false' }}">
                            {{ $funcionario->persona->PER_V_NOMBRES }} {{ $funcionario->persona->PER_V_APELLIDOS }} - {{ $funcionario->area->ARE_V_NOMBRE }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <!-- Lugar de reunión -->
                <div class="grupo-campo">
                    <label for="lugarReunion" class="etiqueta">Lugar de reunión</label>
                    <select id="lugarReunion" name="lugarReunion" class="input-texto" required>
                        <option value="" disabled selected>Seleccione un lugar</option>
                        @foreach($sedes as $sede)
                        <option value="{{ $sede->SED_N_ID }}">
                        {{ $sede->SED_V_NOMBRE }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <!-- Motivo de la visita (desactivado por defecto) -->
                <div class="grupo-campo">
                    <label for="motivoVisita" class="etiqueta">Motivo de la visita</label>
                    <select id="motivoVisita" name="motivoVisita" class="input-texto" disabled required>
                        <option value="" disabled selected>Seleccione un motivo</option>
                        @foreach($motivos as $motivo)
                        <option value="{{ $motivo->MOT_N_ID }}">
                        {{ $motivo->MOT_V_DESCRIPCION }}
                        </option>
                        @endforeach
                    </select>
                    <small class="motivo-ayuda" style="color: #888; font-size: 0.8rem; margin-top: 0.3rem;">
                        Disponible solo si el funcionario no es sujeto obligado.
                    </small>
                </div>
            </fieldset>

            <!-- Sección 2 : Nueva Persona -->
            <fieldset class="seccion">
                <legend class="titulo-seccion">Nueva Persona</legend>

                <div class="grupo-campo">
                    <label for="tipoDocumento" class="etiqueta">Tipo de documento</label>
                    <input type="text" id="tipoDocumento" name="tipoDocumento" class="input-texto input-fijo" value="DOCUMENTO NACIONAL DE IDENTIDAD (DNI)" readonly>
                </div>

                <div class="grupo-campo">
                    <label for="numeroDocumento" class="etiqueta">Número de documento</label>
                    <input type="text" id="numeroDocumento" name="numeroDocumento" class="input-texto" placeholder="Ingrese el número de documento" inputmode="numeric" maxlength="8">
                    <p id="mensaje-dni" class="mensaje-api"></p>
                </div>

                <input type="hidden" id="nombres_api" name="nombres_api">
                <input type="hidden" id="apellidos_api" name="apellidos_api">
            </fieldset>

            <!-- Sección 3 : Botón Continuar -->
            <button type="submit" id="btnContinuar" class="boton-continuar" disabled style="opacity: 0.5; cursor: not-allowed;">
    Continuar
</button>
        </form>
    </main>

    <script>
        window.apiConsultaDniUrl = "{{ url('api/consultar-dni') }}";
    </script>
</body>
</html>
