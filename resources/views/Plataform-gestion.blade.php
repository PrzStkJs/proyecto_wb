<!--
|--------------------------------------------------------------------------
| Nombre      : Jesus Alexander Perez
| Fecha       : 25/05/2026
| Descripción : Panel principal de gestión de visitas y reportes.
|--------------------------------------------------------------------------
-->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel · Gestión de Visitas</title>
    <link rel="stylesheet" href="{{ asset('Styles/Plataform-gestion.css') }}">
</head>
<body>

    <!-- Sección 1 : Encabezado oficial -->
    <header class="header">
        <div class="logo-container">
            <img src="{{ asset('img/gob.png') }}" alt="Logo Gob Perú">
            <span>Registro de visitas y gestión de intereses</span>
        </div>
    </header>

    <!-- Sección 2 : Contenido del panel -->
    <main class="contenido-panel">

        <!-- Fila superior: título y perfil de usuario -->
        <div class="fila-titulo-perfil">
            <h1 class="titulo-bienvenida">Bienvenido a la Plataforma de Gestión de Visitas</h1>

            @auth
            <div class="perfil-superior">
                <img src="{{ session('user_avatar', asset('img/default-avatar.png')) }}"
                     alt="Foto de perfil"
                     class="avatar-superior">
                <div class="info-superior">
                    <span class="nombre-superior">{{ session('user_name', auth()->user()->name) }}</span>
                    <form action="{{ url('/logout') }}" method="POST" class="form-logout-superior">
                        @csrf
                        <button type="submit" class="btn-cerrar-sesion-superior">Cerrar sesión</button>
                    </form>
                </div>
            </div>
            @endauth
        </div>

        <!-- Sección 3 : Accesos rápidos (cajitas) -->
        <div class="cajitas-contenedor">

            <!-- Registro de Visitas -->
            <a href="{{ url('/Registro_visitas') }}" class="cajita">
                <div class="cajita-contenido">
                    <p class="cajita-etiqueta">Registro de</p>
                    <p class="cajita-titulo">Visitas</p>
                </div>
                <div class="cajita-footer">
                    Registrar
                    <span class="flecha">→</span>
                </div>
            </a>

            <!-- Gestión de Reportes -->
            <a href="{{ url('/Gestion_reportes') }}" class="cajita">
                <div class="cajita-contenido">
                    <p class="cajita-etiqueta">Gestión de</p>
                    <p class="cajita-titulo">Reportes</p>
                </div>
                <div class="cajita-footer">
                    Ver reportes
                    <span class="flecha">→</span>
                </div>
            </a>

        </div>

    </main>

</body>
</html>
