/*
|--------------------------------------------------------------------------
| Nombre      : Jesus Alexander Perez
| Fecha       : 25/05/2026
| Descripción : Validación de DNI en tiempo real mediante API externa,
|               actualización de reloj y protección contra doble envío
|               del formulario de acompañante.
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
    const fechaInput = document.getElementById('fechaVisita');
    const horaInput = document.getElementById('horaVisita');
    const btnSubmit = document.getElementById('btnSubmit');

    /*
    |--------------------------------------------------------------------------
    | Sección 2 : Reloj en tiempo real
    |--------------------------------------------------------------------------
    */
    function actualizarReloj() {
        const ahora = new Date();
        if (fechaInput) fechaInput.value = ahora.toLocaleDateString();
        if (horaInput) horaInput.value = ahora.toLocaleTimeString();
    }

    setInterval(actualizarReloj, 1000);
    actualizarReloj();

    /*
    |--------------------------------------------------------------------------
    | Sección 3 : Funciones auxiliares para el botón de envío
    |--------------------------------------------------------------------------
    */
    function deshabilitarBoton() {
        btnSubmit.disabled = true;
        btnSubmit.style.opacity = '0.5';
        btnSubmit.style.cursor = 'not-allowed';
    }

    function habilitarBoton() {
        btnSubmit.disabled = false;
        btnSubmit.style.opacity = '1';
        btnSubmit.style.cursor = 'pointer';
    }

    deshabilitarBoton();

    /*
    |--------------------------------------------------------------------------
    | Sección 4 : Consulta DNI en tiempo real
    |--------------------------------------------------------------------------
    */
    if (!inputDni || !mensajeDni || !inputNombres || !inputApellidos) {
        console.warn('⚠️ No se encontraron todos los elementos del formulario DNI.');
        return;
    }

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
                if (!response.ok) {
                    throw new Error('DNI no encontrado');
                }
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
                mensajeDni.textContent = '❌ Error al conectar con el servicio de consulta.';
                mensajeDni.className = 'mensaje-api mensaje-error';
                inputNombres.value = '';
                inputApellidos.value = '';
            });
    });

    /*
    |--------------------------------------------------------------------------
    | Sección 5 : Protección contra doble envío del formulario de acompañante
    |--------------------------------------------------------------------------
    */
    const formAcompanante = document.getElementById('formAcompanante');

    if (formAcompanante) {
        formAcompanante.addEventListener('submit', function () {
            btnSubmit.disabled = true;
            btnSubmit.style.opacity = '0.7';
            btnSubmit.style.cursor = 'wait';
            btnSubmit.textContent = 'Guardando... ⏳';
        });
    }
});
