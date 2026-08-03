/*
|--------------------------------------------------------------------------
| Nombre      : Jesus Alexander Perez
| Fecha       : 25/05/2026
| Descripción : Control de salida de visitantes: reloj en tiempo real,
|               validación de checkboxes, mensajes de estado y protección
|               contra doble envío del formulario de confirmación.
|--------------------------------------------------------------------------
*/

document.addEventListener('DOMContentLoaded', function() {

    /*
    |--------------------------------------------------------------------------
    | Sección 1 : Referencias a elementos del DOM
    |--------------------------------------------------------------------------
    */
    const relojSpan = document.getElementById('relojHora');
    const checkboxes = document.querySelectorAll('.check-visitante');
    const horaRegistradaInput = document.getElementById('horaRegistrada');
    const btnConfirmar = document.getElementById('btnConfirmar');
    const btnRegresar = document.getElementById('btnRegresar');
    const mensajeDiv = document.getElementById('mensajeArea');
    const formulario = document.querySelector('form');

    /*
    |--------------------------------------------------------------------------
    | Sección 2 : Reloj en tiempo real (HH:MM)
    |--------------------------------------------------------------------------
    */
    function actualizarReloj() {
        const ahora = new Date();
        const horas = ahora.getHours().toString().padStart(2, '0');
        const minutos = ahora.getMinutes().toString().padStart(2, '0');
        const horaFormateada = `${horas}:${minutos}`;
        if (relojSpan) relojSpan.textContent = horaFormateada;
    }

    actualizarReloj();
    setInterval(actualizarReloj, 1000);

    /*
    |--------------------------------------------------------------------------
    | Sección 3 : Obtener hora completa (HH:MM:SS)
    |--------------------------------------------------------------------------
    */
    function obtenerHoraCompleta() {
        const ahora = new Date();
        const horas = ahora.getHours().toString().padStart(2, '0');
        const minutos = ahora.getMinutes().toString().padStart(2, '0');
        const segundos = ahora.getSeconds().toString().padStart(2, '0');
        return `${horas}:${minutos}:${segundos}`;
    }

    /*
    |--------------------------------------------------------------------------
    | Sección 4 : Mostrar mensajes de estado en el área designada
    |--------------------------------------------------------------------------
    */
    function mostrarMensaje(texto, esError = false) {
        if (!mensajeDiv) return;

        mensajeDiv.textContent = texto;
        if (esError) {
            mensajeDiv.style.background = '#ffe6e6';
            mensajeDiv.style.borderLeftColor = '#dc3545';
            mensajeDiv.style.color = '#a71d2a';
        } else {
            mensajeDiv.style.background = '#e6f4ea';
            mensajeDiv.style.borderLeftColor = '#28a745';
            mensajeDiv.style.color = '#155724';
        }

        setTimeout(() => {
            if (mensajeDiv.textContent === texto) {
                mensajeDiv.style.background = '#f0f2f5';
                mensajeDiv.style.borderLeftColor = '#1877f2';
                mensajeDiv.style.color = '#2c3e50';
            }
        }, 4000);
    }

    /*
    |--------------------------------------------------------------------------
    | Sección 5 : Obtener los nombres de los visitantes seleccionados
    |--------------------------------------------------------------------------
    */
    function obtenerNombresSeleccionados() {
        const seleccionados = Array.from(checkboxes).filter(cb => cb.checked);
        const nombres = seleccionados.map(cb => {
            const fila = cb.closest('.visitante-row');
            const nombreSpan = fila ? fila.querySelector('.nombre') : null;
            return nombreSpan ? nombreSpan.textContent : 'Visitante';
        });
        return { seleccionados, nombres };
    }

    /*
    |--------------------------------------------------------------------------
    | Sección 6 : Validación y envío del formulario
    |--------------------------------------------------------------------------
    */
    if (formulario) {
        formulario.addEventListener('submit', function(e) {
            const { seleccionados, nombres } = obtenerNombresSeleccionados();

            if (seleccionados.length === 0) {
                e.preventDefault();
                mostrarMensaje('⚠️ Error: Debes seleccionar al menos un visitante para confirmar su salida.', true);

                checkboxes.forEach(cb => {
                    cb.style.outline = '2px solid #dc3545';
                    cb.style.outlineOffset = '3px';
                    setTimeout(() => {
                        cb.style.outline = '';
                    }, 500);
                });
                return;
            }

            if (btnConfirmar) {
                btnConfirmar.disabled = true;
                btnConfirmar.style.opacity = '0.7';
                btnConfirmar.style.cursor = 'wait';
                btnConfirmar.textContent = 'Guardando... ⏳';
            }

            const horaActual = obtenerHoraCompleta();
            if (horaRegistradaInput) horaRegistradaInput.value = horaActual;

            const listaNombres = nombres.join(', ');
            mostrarMensaje(`✅ Salida confirmada para: ${listaNombres} a las ${horaActual}.`, false);
        });
    }

    /*
    |--------------------------------------------------------------------------
    | Sección 7 : Botón regresar (resetear todo el formulario)
    |--------------------------------------------------------------------------
    */
    function resetearTodo() {
        checkboxes.forEach(cb => cb.checked = false);

        if (horaRegistradaInput) horaRegistradaInput.value = '';

        if (mensajeDiv) {
            mensajeDiv.textContent = 'Selecciona uno o más visitantes y confirma su salida.';
            mensajeDiv.style.background = '#f0f2f5';
            mensajeDiv.style.borderLeftColor = '#1877f2';
            mensajeDiv.style.color = '#2c3e50';
        }

        checkboxes.forEach(cb => cb.style.outline = '');

        if (btnConfirmar) {
            btnConfirmar.disabled = false;
            btnConfirmar.style.opacity = '1';
            btnConfirmar.style.cursor = 'pointer';
            btnConfirmar.textContent = 'Confirmar salida';
        }

        if (btnRegresar) {
            btnRegresar.style.transform = 'scale(0.97)';
            setTimeout(() => {
                btnRegresar.style.transform = '';
            }, 150);
        }

        document.querySelectorAll('.visitante-row').forEach(fila => {
            fila.style.backgroundColor = '';
        });
    }

    /*
    |--------------------------------------------------------------------------
    | Sección 8 : Asignación de eventos e inicialización
    |--------------------------------------------------------------------------
    */
    if (btnRegresar) {
        btnRegresar.addEventListener('click', resetearTodo);
    }

    if (formulario) {
        resetearTodo();
    }

    /*
    |--------------------------------------------------------------------------
    | Sección 9 : Lógica de Principal y Acompañantes
    |--------------------------------------------------------------------------
    */
    const checkPrincipal = document.querySelector('input[value^="visitante_"]');
    const checksAcompanantes = document.querySelectorAll('input[value^="acompanante_"]');

    if (checkPrincipal) {
        checkPrincipal.addEventListener('change', function() {
            const estaMarcado = this.checked;
            checksAcompanantes.forEach(cb => {
                cb.checked = estaMarcado;
                cb.style.pointerEvents = estaMarcado ? 'none' : 'auto';
                cb.parentElement.style.opacity = estaMarcado ? '0.6' : '1';
            });
        });

        checksAcompanantes.forEach(cb => {
            cb.addEventListener('change', function(e) {
                if (checkPrincipal.checked) {
                    this.checked = true;
                }
            });
        });
    }
});
