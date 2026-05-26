/*
|--------------------------------------------------------------------------
| Nombre      : Jesus Alexander Perez
| Fecha       : 25/05/2026
| Descripción : Validación de PIN del DNI electrónico mediante API local.
|               Maneja intentos, bloqueo, visibilidad del PIN y alertas.
|--------------------------------------------------------------------------
*/

document.addEventListener('DOMContentLoaded', function() {

    /*
    |--------------------------------------------------------------------------
    | Sección 1 : Referencias a elementos del DOM
    |--------------------------------------------------------------------------
    */
    const formulario = document.getElementById('form-dnie');
    const inputPin = document.getElementById('inputPin');
    const spanIntentos = document.getElementById('contadorIntentos');
    const botonIngresar = document.querySelector('.boton-ingresar');
    const botonOjo = document.getElementById('botonOjo');
    const baseUrl = formulario ? formulario.dataset.baseUrl : '';

    let intentosRestantes = 3;

    /*
    |--------------------------------------------------------------------------
    | Sección 2 : Función para mostrar alertas visuales
    |--------------------------------------------------------------------------
    */
    const mostrarAlerta = (mensaje, tipo = 'error') => {
        // Eliminar alerta anterior si existe
        const alertaAnterior = document.querySelector('.alerta-pin');
        if (alertaAnterior) {
            alertaAnterior.remove();
        }

        // Icono según tipo
        const iconos = {
            error: '⚠️',
            exito: '✅',
            info: 'ℹ️'
        };

        // Crear alerta
        const alerta = document.createElement('div');
        alerta.className = `alerta-pin alerta-pin--${tipo}`;
        alerta.innerHTML = `
            <span class="alerta-pin-icono">${iconos[tipo] || iconos.error}</span>
            <span>${mensaje}</span>
        `;

        // Insertar después del mensaje de intentos
        const mensajeIntentos = document.querySelector('.mensaje-intentos');
        mensajeIntentos.after(alerta);

        // Auto-eliminar después de 6 segundos (solo errores e info)
        if (tipo !== 'exito') {
            setTimeout(() => {
                if (alerta.parentNode) {
                    alerta.style.opacity = '0';
                    alerta.style.transition = 'opacity 0.3s ease';
                    setTimeout(() => alerta.remove(), 300);
                }
            }, 6000);
        }
    };

    /*
    |--------------------------------------------------------------------------
    | Sección 3 : Actualizar contador de intentos en pantalla
    |--------------------------------------------------------------------------
    */
    const actualizarIntentos = () => {
        spanIntentos.textContent = intentosRestantes;

        // Parpadeo cuando queda 1 intento
        if (intentosRestantes <= 1) {
            spanIntentos.classList.add('peligro');
        } else {
            spanIntentos.classList.remove('peligro');
        }
    };

    /*
    |--------------------------------------------------------------------------
    | Sección 4 : Botón de ojo para mostrar / ocultar PIN
    |--------------------------------------------------------------------------
    */
    let pinVisible = false;

    botonOjo.addEventListener('click', function() {
        pinVisible = !pinVisible;

        if (pinVisible) {
            inputPin.type = 'text';
            botonOjo.classList.add('mostrando');
            botonOjo.setAttribute('aria-label', 'Ocultar PIN');
        } else {
            inputPin.type = 'password';
            botonOjo.classList.remove('mostrando');
            botonOjo.setAttribute('aria-label', 'Mostrar PIN');
        }

        inputPin.focus();
    });

    /*
    |--------------------------------------------------------------------------
    | Sección 5 : Validación y envío del PIN al servidor local
    |--------------------------------------------------------------------------
    */
    formulario.addEventListener('submit', async function(e) {
        e.preventDefault();

        const pinValue = inputPin.value;

        if (pinValue.length !== 6 || isNaN(pinValue)) {
            mostrarAlerta('Por favor, ingresa un PIN numérico de 6 dígitos.', 'error');
            inputPin.focus();
            return;
        }

        botonIngresar.textContent = "Validando...";
        botonIngresar.disabled = true;

        try {
            // Esto se queda igual, interacciona perfecto con tu archivo .exe local
            const respuesta = await fetch('http://localhost:9000/auth-dnie', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ pin: pinValue })
            });

            const data = await respuesta.json();

            if (data.status === 'success') {
                mostrarAlerta('¡Identidad verificada exitosamente! Redirigiendo...', 'exito');

                setTimeout(() => {
                    window.location.href = baseUrl ? `${baseUrl}/Plataforma_gestion` : 'Plataforma_gestion';
                }, 1000);

            } else {
                intentosRestantes--;
                actualizarIntentos();
                mostrarAlerta(data.message || 'Error de validación. Verifique su PIN.', 'error');

                if (intentosRestantes <= 0) {
                    inputPin.disabled = true;
                    botonIngresar.disabled = true;
                    botonIngresar.textContent = '🔒 Bloqueado';
                    mostrarAlerta('Tarjeta bloqueada temporalmente. Contacte a soporte.', 'error');
                } else {
                    botonIngresar.textContent = "Ingresar";
                    botonIngresar.disabled = false;
                    inputPin.value = '';
                    inputPin.focus();
                }
            }

        } catch (error) {
            mostrarAlerta('Error de conexión: Asegúrate de conectar tu lector y ejecutar el programa.', 'error');
            botonIngresar.textContent = "Ingresar";
            botonIngresar.disabled = false;
        }
    });

    /*
    |--------------------------------------------------------------------------
    | Sección 6 : Restaurar botón al volver atrás en el navegador
    |--------------------------------------------------------------------------
    */
    window.addEventListener('pageshow', function(event) {
        if (event.persisted) {
            if (botonIngresar) {
                botonIngresar.textContent = "Ingresar";
                botonIngresar.disabled = false;
            }
        }
    });

    /*
    |--------------------------------------------------------------------------
    | Sección 7 : Inicialización
    |--------------------------------------------------------------------------
    */
    actualizarIntentos();
    console.log('🔐 Plataforma de Autenticación lista');
});
