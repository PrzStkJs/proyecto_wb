<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plugin ClickOnce · ReFirma</title>
    <link rel="stylesheet" href="{{ asset('Styles/Juridica-log.css') }}">
    <script src="{{ asset('Js/Juridica-log.js') }}" defer></script>
</head>
<body>

    <main class="contenedor-plugin">
        <div class="tarjeta-plugin">

            <!-- ICONO -->
            <div class="icono-plugin">
                <svg width="56" height="56" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                    <rect x="2" y="3" width="20" height="18" rx="2" fill="none" stroke="#dc2626" stroke-width="1.5"/>
                    <rect x="6" y="6" width="5" height="5" rx="1" fill="none" stroke="#dc2626" stroke-width="1.2"/>
                    <line x1="6" y1="14" x2="18" y2="14" stroke="#dc2626" stroke-width="1.2" stroke-linecap="round"/>
                    <line x1="6" y1="17" x2="15" y2="17" stroke="#dc2626" stroke-width="1.2" stroke-linecap="round"/>
                </svg>
            </div>

            <!-- TÍTULO -->
            <h1 class="titulo-plugin">Plugin de ClickOnce</h1>

            <!-- DESCRIPCIÓN -->
            <p class="descripcion-plugin">
                Asegúrate de tener el plugin de ClickOnce instalado y activo para continuar con la autenticación mediante DNI electrónico.
            </p>

            <!-- CHECKBOX -->
            <div class="checkbox-plugin">
                <input type="checkbox" id="chkContinuar" class="checkbox-input">
                <label for="chkContinuar" class="checkbox-label">Deseo continuar</label>
            </div>

            <!-- BOTÓN -->
            <button type="button" class="boton-abrir" id="btnAbrirRefirma" data-base-url="{{ url('/') }}" disabled>
                <svg width="20" height="20" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                    <rect x="2" y="3" width="20" height="18" rx="2" fill="none" stroke="currentColor" stroke-width="1.8"/>
                    <line x1="8" y1="2" x2="8" y2="6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                    <line x1="16" y1="2" x2="16" y2="6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                    <polyline points="8,12 11,15 16,9" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Abrir ReFirma ahora
            </button>

            <!-- ENLACE DE DESCARGA -->
            <p class="texto-descarga">
                ¿No tienes el plugin?
                <a href="https://chromewebstore-google-com.translate.goog/detail/cegid-peoplenet-clickonce/jkncabbipkgbconhaajbapbhokpbgkdc?_x_tr_sl=en&_x_tr_tl=es&_x_tr_hl=es&_x_tr_pto=tc" class="enlace-descarga" target="_blank" rel="noopener noreferrer">
                    Descargar ClickOnce
                </a>
            </p>

        </div>
    </main>

</body>
</html>
