<!--
|--------------------------------------------------------------------------
| Nombre      : Jesus Alexander Perez
| Fecha       : 25/05/2026
| Descripción : Listado de visitas activas con buscador, acceso a nueva
|               visita, agregar acompañante y registrar salidas.
|--------------------------------------------------------------------------
-->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de visitas</title>
    <link rel="stylesheet" href="{{ asset('Styles/Regs-visit.css') }}">
    <script src="{{ asset('Js/Regs-visist.js') }}" defer></script>
</head>
<body>

    <!-- Sección 1 : Encabezado oficial -->
    <header class="header">
        <div class="logo-container">
            <img src="{{ asset('img/gob.png') }}" alt="Logo Gob Perú">
            <span>Registro de visitas y gestión de intereses</span>
        </div>
    </header>

    <!-- Sección 2 : Contenido principal -->
    <main class="contenido-registro">

        <!-- Breadcrumb -->
        <nav class="breadcrumb" aria-label="Ruta de navegación">
            <a href="{{ url('/Plataforma_gestion') }}" class="breadcrumb-enlace">
                <svg width="16" height="16" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                    <path d="M3 12l2-2v8h4v-6h6v6h4v-8l2-2L12 3z" fill="currentColor"/>
                </svg>
                Inicio
            </a>
            <span class="breadcrumb-separador">/</span>
            <span class="breadcrumb-actual">Visitas</span>
        </nav>

        <!-- Título y descripción -->
        <h1 class="titulo-registro">Registro de visitas</h1>
        <p class="descripcion-registro">
            Registra la salida de las visitas pendientes y completa los datos o escanea un documento de identidad para registrar a una nueva visita a la entidad.
        </p>

        <!-- Barra de herramientas (buscador + nueva visita) -->
        <div class="barra-herramientas">
            <div class="barra-izquierda">
                <h2 class="titulo-ultimas">Últimas visitas</h2>
                <div class="buscador">
                    <svg class="buscador-icono" width="18" height="18" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                        <path d="M15.5 14h-.79l-.28-.27A6.47 6.47 0 0016 9.5 6.5 6.5 0 109.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z" fill="currentColor"/>
                    </svg>
                    <input type="search" class="buscador-input" placeholder="Buscar por nombre">
                </div>
            </div>
            <div class="barra-derecha">
                <button id="btnNuevaVisita"
        onclick="this.disabled=true; this.textContent='Cargando...'; window.location.href='{{ url('/Registrar_visita_p1') }}'"
        type="button"
        class="boton-nueva-visita">+ Nueva visita</button>
            </div>
        </div>

        <!-- Sección 3 : Lista de visitas activas -->
        <section class="lista-visitas">

            @forelse($visitas as $visita)
                <article class="tarjeta-visita">
                    <div class="tarjeta-info">
                        <h3 class="tarjeta-titulo">
                            Visita a {{ $visita->funcionario->persona->PER_V_NOMBRE }} {{ $visita->funcionario->persona->PER_V_APELLIDOS }}
                        </h3>

                        <p class="tarjeta-entidad">
                            ° {{ $visita->visitante->persona->PER_V_NOMBRE }} {{ $visita->visitante->persona->PER_V_APELLIDOS }}
                            @if($visita->visitante->entidad)
                                de {{ $visita->visitante->entidad->ENT_V_NOMBRE }}
                            @endif
                        </p>

                        <p class="tarjeta-fecha-hora">
                            fecha {{ \Carbon\Carbon::parse($visita->VTA_D_FECHA)->format('d/m/Y') }} -
                            hora {{ \Carbon\Carbon::parse($visita->VTA_T_HORA_ENTRADA)->format('H:i') }}
                        </p>

                        <!-- Acompañantes -->
                        <ul class="tarjeta-acompanantes">
                            @foreach($visita->acompanantes as $acompanante)
                                <li class="tarjeta-acompanante-item">
                                    ▶ Acompañante: {{ $acompanante->persona->PER_V_NOMBRE }} {{ $acompanante->persona->PER_V_APELLIDOS }} - hora {{ \Carbon\Carbon::parse($acompanante->ACO_T_HORA_ENTRADA)->format('H:i') }}

                                    @if($acompanante->ACO_T_HORA_SALIDA)
                                        <span style="color: #d32f2f; font-weight: bold;">(Salió: {{ \Carbon\Carbon::parse($acompanante->ACO_T_HORA_SALIDA)->format('H:i') }})</span>
                                    @endif
                                </li>
                            @endforeach
                        </ul>

                        <a href="{{ url('/Registrar_acompanante/' . $visita->VTA_N_ID) }}" class="tarjeta-agregar">
                            <svg class="tarjeta-agregar-icono" width="16" height="16" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                                <path d="M12 5v14m-7-7h14" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                            Agregar más personas a la visita
                        </a>
                    </div>

                    <div class="tarjeta-accion">
                        <button type="button" class="boton-registrar-salida" onclick="window.location.href='{{ url('/Registrar_salida/' . $visita->VTA_N_ID) }}'">Registrar salidas</button>
                    </div>
                </article>
            @empty
                <div style="text-align: center; padding: 50px; color: #888;">
                    <p>No hay visitas recientes</p>
                </div>
            @endforelse

        </section>

    </main>

</body>
</html>
