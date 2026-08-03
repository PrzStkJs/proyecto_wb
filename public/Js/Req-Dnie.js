/*
|--------------------------------------------------------------------------
| Nombre      : Jesus Alexander Perez
| Fecha       : 25/05/2026
| Descripción : Pantalla de requisitos previos al uso del DNI electrónico.
|               Controla el checkbox de confirmación, muestra errores con
|               animación shake y redirige a la validación de PIN.
|--------------------------------------------------------------------------
*/

document.addEventListener('DOMContentLoaded', () => {

    /*
    |--------------------------------------------------------------------------
    | Sección 1 : Referencias a elementos del DOM
    |--------------------------------------------------------------------------
    */
    const continuarBtn = document.getElementById('btnContinuar');
    const checkbox = document.getElementById('chkContinuar');
    const checkboxContainer = document.querySelector('.lector-checkbox');

    // Ruta hacia la pantalla de ingreso de PIN de 6 dígitos
    const URL_PANTALLA_ROJA = './Codigo_dnie';

    /*
    |--------------------------------------------------------------------------
    | Sección 2 : Crear contenedor de mensaje de error si no existe
    |--------------------------------------------------------------------------
    */
    let errorMsg = document.querySelector('.error-message');
    if (!errorMsg) {
        errorMsg = document.createElement('div');
        errorMsg.className = 'error-message';
        const buttonsContainer = document.querySelector('.lector-buttons');
        buttonsContainer.parentNode.insertBefore(errorMsg, buttonsContainer.nextSibling);
    }

    /*
    |--------------------------------------------------------------------------
    | Sección 3 : Funciones de interfaz de usuario
    |--------------------------------------------------------------------------
    */
    const showError = (message) => {
        errorMsg.textContent = message;
        errorMsg.classList.add('show');
        checkboxContainer.style.borderColor = '#FF0000';
        checkboxContainer.style.boxShadow = '0 0 0 3px rgba(220,20,60,0.5)';

        let shakeCount = 0;
        const shakeInterval = setInterval(() => {
            if (shakeCount >= 6) {
                checkboxContainer.style.transform = '';
                clearInterval(shakeInterval);
            } else {
                checkboxContainer.style.transform = `translateX(${shakeCount % 2 === 0 ? -4 : 4}px)`;
                shakeCount++;
            }
        }, 40);

        setTimeout(() => {
            checkboxContainer.style.borderColor = '';
            checkboxContainer.style.boxShadow = '';
        }, 1200);
    };

    const hideError = () => {
        errorMsg.classList.remove('show');
        errorMsg.textContent = '';
    };

    const updateButtonState = () => {
        if (checkbox.checked) {
            continuarBtn.disabled = false;
            hideError();
            continuarBtn.style.opacity = '1';
            continuarBtn.style.cursor = 'pointer';
        } else {
            continuarBtn.disabled = true;
            continuarBtn.style.opacity = '0.5';
            continuarBtn.style.cursor = 'not-allowed';
        }
    };

    /*
    |--------------------------------------------------------------------------
    | Sección 4 : Función principal de redirección
    |--------------------------------------------------------------------------
    */
    const handleContinue = () => {
        if (!checkbox.checked) {
            showError('⚠️ Debes confirmar que el dispositivo y DNIe están listos.');
            checkbox.focus();
            return;
        }

        // Efecto visual de transición
        continuarBtn.textContent = '⏳ Redirigiendo...';
        continuarBtn.disabled = true;
        continuarBtn.style.pointerEvents = 'none';

        // Redirige a la pantalla de validación de PIN del DNIe
        console.log('🔐 Redirigiendo a la validación del Agente Local...');
        window.location.href = URL_PANTALLA_ROJA;
    };

    /*
    |--------------------------------------------------------------------------
    | Sección 5 : Asignación de eventos
    |--------------------------------------------------------------------------
    */
    continuarBtn.addEventListener('click', handleContinue);
    checkbox.addEventListener('change', updateButtonState);

    const label = document.querySelector('.lector-label');
    if (label) {
        label.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') {
                e.preventDefault();
                checkbox.checked = !checkbox.checked;
                updateButtonState();
            }
        });
        label.setAttribute('tabindex', '0');
    }

    /*
    |--------------------------------------------------------------------------
    | Sección 6 : Estado inicial
    |--------------------------------------------------------------------------
    */
    updateButtonState();
    console.log('🚀 Script de Requisitos DNIe listo (Modo Local)');
});

/*
|--------------------------------------------------------------------------
| Sección 7 : Restaurar botón al volver atrás en el navegador
|--------------------------------------------------------------------------
*/
window.addEventListener('pageshow', function(event) {
    if (event.persisted) {
        const btn = document.getElementById('btnContinuar');
        if (btn) {
            btn.textContent = "Continuar";
            const checkbox = document.getElementById('chkContinuar');
            if (checkbox) {
                btn.disabled = !checkbox.checked;
                btn.style.opacity = checkbox.checked ? '1' : '0.5';
                btn.style.cursor = checkbox.checked ? 'pointer' : 'not-allowed';
            }
        }
    }
});
