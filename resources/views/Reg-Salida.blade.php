<!--
|--------------------------------------------------------------------------
| Nombre      : Jesus Alexander Perez
| Fecha       : 25/05/2026
| Descripción : Vista para confirmar la salida de visitantes y
|               acompañantes, con reloj en tiempo real y checkboxes.
|--------------------------------------------------------------------------
-->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar salida de visitantes</title>
    <link rel="stylesheet" href="{{ asset('Styles/Reg-Salida.css') }}">
    <script src="{{ asset('Js/Reg-Salida.js') }}" defer></script>
</head>
<body>
    <div class="container">
        <div class="card">

            <!-- Sección 1 : Encabezado con reloj en tiempo real -->
            <div class="header">
                <h1>Confirmar salida de visitantes a las
                    <span id="relojHora">{{ now()->format('H:i') }}</span>
                </h1>
            </div>

            <!-- Sección 2 : Formulario de salida -->
            <form action="{{ route('visitas.salida.store', $visita->VTA_N_ID) }}" method="POST">
                @csrf

                <div class="visitantes-list">

                    <!-- Visitante principal (si no ha salido) -->
                    @if(is_null($visita->VTA_T_HORA_SALIDA))
                    <label class="visitante-row">
                        <input type="checkbox" name="salidas[]" value="visitante_{{ $visita->VTA_N_ID }}" class="check-visitante">
                        <span class="avatar-svg">
                            <svg width="56" height="56" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="12" cy="8" r="4" stroke="currentColor" stroke-width="1.5" fill="none"/>
                                <path d="M5 20V19C5 15.6863 7.68629 13 11 13H13C16.3137 13 19 15.6863 19 19V20" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                            </svg>
                        </span>
                        <span class="nombre">{{ $visita->visitante->persona->PER_V_NOMBRE }} {{ $visita->visitante->persona->PER_V_APELLIDOS }} (Principal)</span>
                    </label>
                    @endif

                    <!-- Acompañantes que aún no han salido -->
                    @foreach($visita->acompanantes as $acompanante)
                        @if(is_null($acompanante->ACO_T_HORA_SALIDA))
                        <label class="visitante-row">
                            <input type="checkbox" name="salidas[]" value="acompanante_{{ $acompanante->ACO_N_ID }}" class="check-visitante">
                            <span class="avatar-svg">
                                <svg width="56" height="56" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="12" cy="8" r="4" stroke="currentColor" stroke-width="1.5" fill="none"/>
                                    <path d="M5 20V19C5 15.6863 7.68629 13 11 13H13C16.3137 13 19 15.6863 19 19V20" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                </svg>
                            </span>
                            <span class="nombre">{{ $acompanante->persona->PER_V_NOMBRE }} {{ $acompanante->persona->PER_V_APELLIDOS }} (Acompañante)</span>
                        </label>
                        @endif
                    @endforeach

                </div>

                <!-- Sección 3 : Hora registrada (solo lectura) -->
                <div class="hora-registro">
                    <span class="label-registro">🕒 Hora registrada:</span>
                    <input type="text" id="horaRegistrada" value="{{ now()->format('H:i:s') }}" readonly placeholder="--:--:--">
                </div>

                <!-- Sección 4 : Botones de acción -->
                <div class="botones">
                    <button type="button" id="btnRegresar" class="btn-regresar" onclick="window.location.href='{{ url('/Registro_visitas') }}'">Regresar</button>
                    <button type="submit" id="btnConfirmar" class="btn-confirmar">Confirmar salida</button>
                </div>
            </form>

            <!-- Sección 5 : Área de mensajes de estado -->
            <div id="mensajeArea" class="mensaje"></div>
        </div>
    </div>
</body>
</html>
