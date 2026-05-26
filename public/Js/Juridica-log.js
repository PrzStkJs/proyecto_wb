/*
|--------------------------------------------------------------------------
| Nombre      : Jesus Alexander Perez
| Fecha       : 25/05/2026
| Descripción : Controla la interacción con el plugin ClickOnce de ReFirma
|               PDF (RENIEC). Maneja la validación del checkbox, la
|               descarga/apertura del instalador y la redirección final
|               simulando el flujo de autenticación.
|--------------------------------------------------------------------------
*/

document.addEventListener('DOMContentLoaded', () => {

    /*
    |--------------------------------------------------------------------------
    | Sección 1 : Referencias a elementos del DOM
    |--------------------------------------------------------------------------
    */
    const checkbox = document.getElementById('chkContinuar');
    const botonAbrir = document.getElementById('btnAbrirRefirma');
    const checkboxContainer = document.querySelector('.checkbox-plugin');
    const baseUrl = botonAbrir ? botonAbrir.dataset.baseUrl : '';
    // URL del instalador ClickOnce de ReFirma (oficial RENIEC)
    const URL_REFIRMA_CLICKONCE = 'https://sp.reniec.gob.pe/app/refirma_suite/pdf/clickonce/ReFirmaPDF.application';

    /*
    |--------------------------------------------------------------------------
    | Sección 2 : Crear contenedor de mensaje de error si no existe
    |--------------------------------------------------------------------------
    */
    let errorMsg = document.querySelector('.mensaje-error');
    if (!errorMsg) {
        errorMsg = document.createElement('div');
        errorMsg.className = 'mensaje-error';
        const tarjeta = document.querySelector('.tarjeta-plugin');
        tarjeta.insertBefore(errorMsg, botonAbrir);
    }

    /*
    |--------------------------------------------------------------------------
    | Sección 3 : Funciones de interfaz de usuario
    |--------------------------------------------------------------------------
    */
    const mostrarError = (mensaje) => {
        errorMsg.textContent = mensaje;
        errorMsg.classList.add('visible');

        if (checkboxContainer) {
            checkboxContainer.style.borderColor = '#dc2626';
            checkboxContainer.style.boxShadow = '0 0 0 3px rgba(220, 38, 38, 0.15)';
            checkboxContainer.style.background = '#fef2f2';

            // Efecto shake sobre el contenedor del checkbox
            let shakeCount = 0;
            const shakeInterval = setInterval(() => {
                if (shakeCount >= 6) {
                    checkboxContainer.style.transform = '';
                    clearInterval(shakeInterval);
                } else {
                    const offset = shakeCount % 2 === 0 ? -3 : 3;
                    checkboxContainer.style.transform = `translateX(${offset}px)`;
                    shakeCount++;
                }
            }, 40);

            setTimeout(() => {
                checkboxContainer.style.borderColor = '#eeeeee';
                checkboxContainer.style.boxShadow = '';
                checkboxContainer.style.background = '#fafafa';
            }, 1200);
        }
    };

    const ocultarError = () => {
        errorMsg.classList.remove('visible');
        errorMsg.textContent = '';
    };

    const actualizarEstadoBoton = () => {
        if (checkbox.checked) {
            botonAbrir.disabled = false;
            botonAbrir.style.opacity = '1';
            botonAbrir.style.cursor = 'pointer';
            ocultarError();
        } else {
            botonAbrir.disabled = true;
            botonAbrir.style.opacity = '0.5';
            botonAbrir.style.cursor = 'not-allowed';
        }
    };

    /*
    |--------------------------------------------------------------------------
    | Sección 4 : Flujo principal: lanzar ReFirma y redirigir
    |--------------------------------------------------------------------------
    */
    const abrirReFirma = () => {
        if (!checkbox.checked) {
            mostrarError('⚠️ Debes marcar "Deseo continuar" para abrir ReFirma');
            checkbox.focus();
            return;
        }

        botonAbrir.textContent = '⏳ Lanzando ReFirma PDF...';
        botonAbrir.disabled = true;
        botonAbrir.style.pointerEvents = 'none';

        console.log('🔐 Invocando ReFirma desde ClickOnce...');
        window.location.href = URL_REFIRMA_CLICKONCE;

        setTimeout(() => {
            botonAbrir.textContent = '🔄 Procesando autenticación de Persona Jurídica...';

            setTimeout(() => {
                console.log('✅ Firma validada. Redirigiendo a la plataforma de gestión...');
                window.location.href = baseUrl ? `${baseUrl}/Plataforma_gestion` : 'Plataforma_gestion';
            }, 4000); // Tiempo de verificación

        }, 3000); // Tiempo de apertura
    };

    /*
    |--------------------------------------------------------------------------
    | Sección 5 : Event listeners
    |--------------------------------------------------------------------------
    */
    checkbox.addEventListener('change', actualizarEstadoBoton);
    botonAbrir.addEventListener('click', abrirReFirma);

    // Permitir marcar/desmarcar con Enter en el label
    const label = document.querySelector('.checkbox-label');
    if (label) {
        label.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') {
                e.preventDefault();
                checkbox.checked = !checkbox.checked;
                actualizarEstadoBoton();
            }
        });
        label.setAttribute('tabindex', '0');
    }

    // Cerrar mensaje de error al marcar el checkbox
    checkbox.addEventListener('change', () => {
        if (checkbox.checked) {
            ocultarError();
        }
    });

    /*
    |--------------------------------------------------------------------------
    | Sección 6 : Estado inicial
    |--------------------------------------------------------------------------
    */
    actualizarEstadoBoton();
    console.log('🚀 Plugin ClickOnce listo');
});

/*
|--------------------------------------------------------------------------
| Sección 7 : Restaurar botón al volver atrás en el navegador
|--------------------------------------------------------------------------
*/
window.addEventListener('pageshow', function(event) {
    if (event.persisted) {
        const btn = document.getElementById('btnAbrirRefirma');
        if (btn) {
            btn.textContent = "Abrir ReFirma ahora";
            btn.disabled = false;
            btn.style.pointerEvents = 'auto';
        }
    }
});
