<!--
|--------------------------------------------------------------------------
| Nombre      : Jesus Alexander Perez
| Fecha       : 25/05/2026
| Descripción : Página principal con pantalla de inicio animada y
|               opciones de autenticación (DNIe, certificado, QR).
|--------------------------------------------------------------------------
-->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Visitas</title>
    <link rel="stylesheet" href="{{ asset('Styles/styles.css') }}">
    <script src="{{ asset('Js/index.js') }}" defer></script>
</head>
<body>

    <!-- Sección 1 : Pantalla de inicio (clic para entrar) -->
    <div id="pantalla-inicio">
        <p>▶ Haz click para entrar</p>
    </div>

    <!-- Sección 2 : Loader con video institucional -->
    <div id="loader">
        <video id="videoLoader" playsinline>
            <source src="{{ asset('video/Video_Peru.mp4') }}" type="video/mp4">
        </video>
    </div>

    <!-- Sección 3 : Contenido principal (visible tras el video) -->
    <div id="pagina-real">

        <!-- Encabezado oficial -->
        <header class="header">
            <div class="logo-container">
                <img src="{{ asset('img/gob.png') }}" alt="Logo Gob Perú">
                <span>Registro de visitas y gestión de intereses</span>
            </div>
        </header>

        <main class="contenido-principal">

            <!-- Fila superior: título y perfil de usuario autenticado -->
            <div class="fila-titulo-perfil">
                <section class="titulo-principal">
                    <h1>Sistema de Registro de visitas y gestión de intereses</h1>
                </section>

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

            <!-- Opciones de autenticación -->
            <section class="contenedor-login">

                <div class="login-header">
                    <p>Debes autenticarte para continuar</p>
                </div>

                <!-- DNI electrónico -->
                <div class="opcion-login">
                    <div class="icono">
                        <svg width="40" height="40" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                            <rect x="2" y="3" width="20" height="18" rx="2" ry="2" fill="none" stroke="#1a1a1a" stroke-width="1.5"/>
                            <rect x="6" y="6" width="5" height="5" rx="1" fill="none" stroke="#1a1a1a" stroke-width="1.2"/>
                            <line x1="6" y1="14" x2="18" y2="14" stroke="#1a1a1a" stroke-width="1.2" stroke-linecap="round"/>
                            <line x1="6" y1="17" x2="15" y2="17" stroke="#1a1a1a" stroke-width="1.2" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <div class="texto-opcion">
                        <a href="{{ url('/Entrar_dnie') }}">Continuar con DNI electrónico</a>
                    </div>
                </div>

                <!-- Certificado de persona jurídica -->
                <div class="opcion-login">
                    <div class="icono">
                        <svg width="40" height="40" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                            <rect x="5" y="10" width="14" height="11" rx="2" fill="none" stroke="#1a1a1a" stroke-width="1.5"/>
                            <path d="M8 10V7a4 4 0 1 1 8 0v3" fill="none" stroke="#1a1a1a" stroke-width="1.5" stroke-linecap="round"/>
                            <circle cx="12" cy="15.5" r="1.2" fill="#1a1a1a"/>
                            <line x1="12" y1="16.7" x2="12" y2="18.5" stroke="#1a1a1a" stroke-width="1.2" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <div class="texto-opcion">
                        <a href="{{ url('/Entrar_juridica') }}">Continuar con certificado de persona jurídica</a>
                    </div>
                </div>

                <!-- ID Visitas (QR) -->
                <div class="opcion-login">
                    <div class="icono">
                        <svg width="40" height="40" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                            <circle cx="12" cy="12" r="10" fill="none" stroke="#1a1a1a" stroke-width="1.5"/>
                            <line x1="12" y1="5" x2="12" y2="19" stroke="#1a1a1a" stroke-width="1.5" stroke-linecap="round"/>
                            <line x1="6.5" y1="7.5" x2="17.5" y2="16.5" stroke="#1a1a1a" stroke-width="1.5" stroke-linecap="round"/>
                            <line x1="17.5" y1="7.5" x2="6.5" y2="16.5" stroke="#1a1a1a" stroke-width="1.5" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <div class="texto-opcion">
                        <a href="{{ url('/Entrar_idVisita') }}">Continuar con ID Visitas</a>
                    </div>
                </div>

            </section>

            <!-- Sección 4 : Descarga del lector DNIe desde Google Drive -->
            <section class="seccion-descarga">
                <p class="descarga-texto">¿No tienes el .exe para el lector?</p>
                <a href="https://drive.google.com/drive/folders/1KSTx4IrwVTeEJGKiiA_2B6fwRkBZ4uZ0?usp=sharing"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="btn-descarga">
                    <svg width="18" height="18" viewBox="0 0 24 24" aria-hidden="true" focusable="false" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                        <polyline points="7 10 12 15 17 10"/>
                        <line x1="12" y1="15" x2="12" y2="3"/>
                    </svg>
                    Descargar Agente de Autenticación
                </a>
                <p class="descarga-info">Serás redirigido a Google Drive para descargar el instalador</p>
            </section>

            <!-- Sección 5 : Instrucciones de uso del lector DNIe -->
            <section class="seccion-instrucciones">
                <h2 class="instrucciones-titulo">¿Cómo usar el lector de DNIe?</h2>
                <ol class="instrucciones-lista">
                    <li>Conecta el lector de DNI a un puerto USB de tu computadora.</li>
                    <li>Ejecuta el <strong>Agente de Autenticación</strong> (mysetup.exe) que descargaste.</li>
                    <li>Si aparece un error, cierra el programa y ejecuta en el CMD:
                        <code class="instrucciones-cmd">taskkill /F /IM javaw.exe</code>
                    </li>
                    <li>Vuelve a abrir el <strong>mysetup.exe</strong> y ya debería funcionar.</li>
                </ol>
            </section>

        </main>

    </div>

</body>
</html>
