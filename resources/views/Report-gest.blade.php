<!--
|--------------------------------------------------------------------------
| Nombre      : Jesus Alexander Perez
| Fecha       : 25/05/2026
| Descripción : Reporte de visitas con filtros por nombre/DNI y rango de
|               fechas, tabla de resultados y descarga a Excel.
|--------------------------------------------------------------------------
-->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Visitas</title>
    <link rel="stylesheet" href="{{ asset('Styles/Report-gest.css') }}">
    <!-- Librería para generar archivos Excel en el navegador -->
    <script src="https://cdn.sheetjs.com/xlsx-0.20.1/package/dist/xlsx.full.min.js"></script>
    <script src="{{ asset('Js/Report-gest.js') }}" defer></script>
</head>
<body>

    <!-- Sección 1 : Encabezado oficial -->
    <header class="header">
        <div class="logo-container">
            <img src="{{ asset('img/gob.png') }}" alt="Logo Gob Perú">
            <span>Registro de visitas y gestión de intereses</span>
        </div>
    </header>

    <!-- Sección 2 : Contenido del reporte -->
    <main class="contenedor-reporte">

        <!-- Breadcrumb -->
        <nav class="breadcrumb" aria-label="Ruta de navegación">
            <a href="{{ url('/Plataforma_gestion') }}" class="breadcrumb-enlace">
                <svg width="16" height="16" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                    <path d="M3 12l2-2v8h4v-6h6v6h4v-8l2-2L12 3z" fill="currentColor"/>
                </svg>
                Inicio
            </a>
            <span class="breadcrumb-separador">/</span>
            <span class="breadcrumb-actual">Reporte de visitas</span>
        </nav>

        <h1 class="titulo-reporte">Reporte de visitas</h1>

        <!-- Sección 3 : Opciones de búsqueda -->
        <section class="opciones-busqueda">
            <h2 class="titulo-busqueda">Opciones de búsqueda</h2>

            <form action="{{ route('reportes.index') }}" method="GET" class="fila-busqueda">

                <div class="buscador">
                    <svg class="buscador-icono" width="18" height="18" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                        <path d="M15.5 14h-.79l-.28-.27A6.47 6.47 0 0016 9.5 6.5 6.5 0 109.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z" fill="currentColor"/>
                    </svg>
                    <input type="search" name="buscar" class="buscador-input" placeholder="Buscar por nombre, DNI..." value="{{ request('buscar') }}">
                </div>

                <div class="input-fechas">
                    <svg class="icono-calendario" width="18" height="18" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                        <rect x="3" y="4" width="18" height="18" rx="2" fill="none" stroke="currentColor" stroke-width="1.8"/>
                        <line x1="8" y1="2" x2="8" y2="6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                        <line x1="16" y1="2" x2="16" y2="6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                        <line x1="3" y1="10" x2="21" y2="10" stroke="currentColor" stroke-width="1.8"/>
                    </svg>
                    <input type="date" class="fechas-input" name="fecha_inicio" value="{{ request('fecha_inicio') }}">
                    <span class="separador-fechas">—</span>
                    <input type="date" class="fechas-input" name="fecha_fin" value="{{ request('fecha_fin') }}">
                </div>

                <button type="submit" class="boton-buscar">
                    <svg width="18" height="18" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                        <path d="M15.5 14h-.79l-.28-.27A6.47 6.47 0 0016 9.5 6.5 6.5 0 109.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z" fill="currentColor"/>
                    </svg>
                    Buscar
                </button>
            </form>
        </section>

        <hr class="linea-roja">

        <!-- Sección 4 : Tabla de resultados -->
        <section class="tabla-visitas">
            <h2 class="titulo-tabla">Registro de visitas a funcionarios públicos</h2>

            <div class="tabla-contenedor">
                <table class="tabla">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>DNI</th> <th>Funcionario visitado</th>
                            <th>Visitante</th>
                            <th>Entidad</th>
                            <th>Hora de ingreso</th>
                            <th>Hora de salida</th>
                            <th>Motivo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($visitas as $visita)
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($visita->VTA_D_FECHA)->format('d/m/Y') }}</td>

                                <td>{{ $visita->visitante->persona->PER_B_DNI ?? 'N/A' }}</td>

                                <td>{{ $visita->funcionario->persona->PER_V_NOMBRE ?? '' }} {{ $visita->funcionario->persona->PER_V_APELLIDOS ?? '' }}</td>

                                <td>{{ $visita->visitante->persona->PER_V_NOMBRE ?? '' }} {{ $visita->visitante->persona->PER_V_APELLIDOS ?? '' }}</td>

                                <td>{{ $visita->visitante->entidad->ENT_V_NOMBRE ?? 'NINGUNO' }}</td>

                                <td>{{ \Carbon\Carbon::parse($visita->VTA_T_HORA_ENTRADA)->format('H:i') }}</td>

                                <td>
                                    @if($visita->VTA_T_HORA_SALIDA)
                                        {{ \Carbon\Carbon::parse($visita->VTA_T_HORA_SALIDA)->format('H:i') }}
                                    @else
                                        <span style="color: red; font-weight: bold;">En curso</span>
                                    @endif
                                </td>

                                <td>{{ $visita->motivo ? $visita->motivo->MOT_V_DESCRIPCION : $visita->MOT_N_ID }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" style="text-align: center; padding: 20px;">No se encontraron registros.</td>
                            </tr>
                        @endforelse
                        </tbody>
                </table>
            </div>
        </section>

        <!-- Sección 5 : Botón de descarga Excel -->
        <div class="fila-excel">
            <button type="button" class="boton-excel">
                <svg width="18" height="18" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                    <rect x="3" y="3" width="18" height="18" rx="2" fill="none" stroke="currentColor" stroke-width="1.8"/>
                    <line x1="3" y1="9" x2="21" y2="9" stroke="currentColor" stroke-width="1.8"/>
                    <line x1="9" y1="3" x2="9" y2="21" stroke="currentColor" stroke-width="1.8"/>
                </svg>
                Excel
            </button>
        </div>

    </main>

</body>
</html>
