/*
|--------------------------------------------------------------------------
| Nombre      : Jesus Alexander Perez
| Fecha       : 25/05/2026
| Descripción : Validación de DNI en tiempo real mediante API RENIEC,
|               control dinámico del motivo según sujeto obligado y
|               protección contra doble envío del formulario.
|--------------------------------------------------------------------------
*/

document.addEventListener('DOMContentLoaded', function () {

    /*
    |--------------------------------------------------------------------------
    | Sección 1 : Referencias a elementos del DOM
    |--------------------------------------------------------------------------
    */
    const inputDni = document.getElementById('numeroDocumento');
    const mensajeDni = document.getElementById('mensaje-dni');
    const inputNombres = document.getElementById('nombres_api');
    const inputApellidos = document.getElementById('apellidos_api');
    const selectFuncionario = document.getElementById('quienVisita');
    const selectMotivo = document.getElementById('motivoVisita');
    const btnContinuar = document.getElementById('btnContinuar');

    /*
    |--------------------------------------------------------------------------
    | Sección 2 : Control de estado del botón Continuar
    |--------------------------------------------------------------------------
    */
    function deshabilitarBoton() {
        if (!btnContinuar) return;
        btnContinuar.disabled = true;
        btnContinuar.style.opacity = '0.5';
        btnContinuar.style.cursor = 'not-allowed';
    }

    function habilitarBoton() {
        if (!btnContinuar) return;
        btnContinuar.disabled = false;
        btnContinuar.style.opacity = '1';
        btnContinuar.style.cursor = 'pointer';
    }

    deshabilitarBoton();

    /*
    |--------------------------------------------------------------------------
    | Sección 3 : Deshabilitar motivo si el funcionario es sujeto obligado
    |--------------------------------------------------------------------------
    */
    function actualizarMotivo() {
        if (!selectFuncionario || !selectMotivo || selectFuncionario.selectedIndex === -1) return;

        const opcionSeleccionada = selectFuncionario.options[selectFuncionario.selectedIndex];
        const esSujetoObligado = opcionSeleccionada.getAttribute('data-sujeto-obligado') === 'true';

        if (esSujetoObligado) {
            selectMotivo.disabled = true;
            selectMotivo.value = '';
        } else {
            selectMotivo.disabled = false;
        }
    }

    if (selectFuncionario) {
        selectFuncionario.addEventListener('change', actualizarMotivo);
        actualizarMotivo();
    }

    /*
    |--------------------------------------------------------------------------
    | Sección 4 : Consulta de DNI a la API y autorellenado
    |--------------------------------------------------------------------------
    */
    if (inputDni && mensajeDni && inputNombres && inputApellidos) {
        inputDni.addEventListener('input', function () {
            const dni = inputDni.value.trim();

            deshabilitarBoton();
            inputNombres.value = '';
            inputApellidos.value = '';

            if (dni.length !== 8) {
                mensajeDni.textContent = '';
                mensajeDni.className = 'mensaje-api';
                return;
            }

            if (!/^\d{8}$/.test(dni)) {
                mensajeDni.textContent = '⚠️ El DNI debe contener solo números.';
                mensajeDni.className = 'mensaje-api mensaje-error';
                return;
            }

            mensajeDni.textContent = 'Buscando en RENIEC...';
            mensajeDni.className = 'mensaje-api mensaje-cargando';

            const urlBase = window.apiConsultaDniUrl || '/api/consultar-dni';

            fetch(`${urlBase}/${dni}`)
                .then(response => {
                    if (!response.ok) throw new Error('DNI no encontrado');
                    return response.json();
                })
                .then(data => {
                    if (data.nombre && data.nombres) {
                        mensajeDni.textContent = `✓ Registrando a ${data.nombre}`;
                        mensajeDni.className = 'mensaje-api mensaje-exito';

                        inputNombres.value = data.nombres;
                        inputApellidos.value = `${data.apellidoPaterno || ''} ${data.apellidoMaterno || ''}`.trim();

                        habilitarBoton();
                    } else {
                        mensajeDni.textContent = '❌ No se encontraron datos para este DNI.';
                        mensajeDni.className = 'mensaje-api mensaje-error';
                        inputNombres.value = '';
                        inputApellidos.value = '';
                    }
                })
                .catch(error => {
                    console.error('Error en consulta DNI:', error);
                    mensajeDni.textContent = '❌ Error al conectar con el servicio.';
                    mensajeDni.className = 'mensaje-api mensaje-error';
                    inputNombres.value = '';
                    inputApellidos.value = '';
                });
        });
    } else {
        console.warn('⚠️ Se omitió la lógica de RENIEC: Faltan inputs de DNI en esta vista.');
    }

    /*
    |--------------------------------------------------------------------------
    | Sección 5 : Protección contra doble envío del formulario
    |--------------------------------------------------------------------------
    */
    const formulario = document.querySelector('form');
    if (formulario) {
        formulario.addEventListener('submit', function () {
            if (!btnContinuar) return;
            btnContinuar.disabled = true;
            btnContinuar.style.opacity = '0.7';
            btnContinuar.style.cursor = 'wait';
            btnContinuar.textContent = 'Enviando... ⏳';
        });
    }
});
