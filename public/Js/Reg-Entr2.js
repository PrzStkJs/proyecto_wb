/*
|--------------------------------------------------------------------------
| Nombre      : Jesus Alexander Perez
| Fecha       : 25/05/2026
| Descripción : Reloj en tiempo real, control de campos según lugar de
|               trabajo y protección contra doble envío en el formulario
|               de registro (Paso 2).
|--------------------------------------------------------------------------
*/

document.addEventListener('DOMContentLoaded', () => {

    /*
    |--------------------------------------------------------------------------
    | Sección 1 : Referencias al DOM
    |--------------------------------------------------------------------------
    */
    const fechaInput = document.getElementById('fechaVisita');
    const horaInput = document.getElementById('horaVisita');
    const radioLugarTrabajo = document.querySelectorAll('input[name="lugar_trabajo"]');
    const inputEntidad = document.getElementById('nombreEntidad');
    const inputCargo = document.getElementById('cargo');
    const formulario = document.querySelector('.formulario-visita');
    const btnRegistrar = document.getElementById('btnRegistrar');

    /*
    |--------------------------------------------------------------------------
    | Sección 2 : Reloj en tiempo real (fecha y hora)
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
    | Sección 3 : Control de campos según lugar de trabajo
    |--------------------------------------------------------------------------
    */
    if (radioLugarTrabajo.length > 0 && inputEntidad && inputCargo) {
        function actualizarCamposLugar() {
            const seleccionado = document.querySelector('input[name="lugar_trabajo"]:checked');
            if (!seleccionado) return; // Este return está bien porque solo sale de esta subfunción

            const valor = seleccionado.value;


            if (valor === 'ninguno') {
                inputEntidad.disabled = true;
                inputEntidad.value = '';
                inputCargo.disabled = true;
                inputCargo.value = '';
            } else {
                inputEntidad.disabled = false;
                inputCargo.disabled = false;
            }
        }

        radioLugarTrabajo.forEach(radio => {
            radio.addEventListener('change', actualizarCamposLugar);
        });

        actualizarCamposLugar();
    } else {
        console.warn('⚠️ Se omitió la lógica de lugar de trabajo: Faltan elementos en el DOM.');
    }

    /*
    |--------------------------------------------------------------------------
    | Sección 4 : Protección contra doble envío del formulario
    |--------------------------------------------------------------------------
    */
    if (formulario && btnRegistrar) {
        formulario.addEventListener('submit', function () {
            btnRegistrar.disabled = true;
            btnRegistrar.style.opacity = '0.7';
            btnRegistrar.style.cursor = 'wait';
            btnRegistrar.textContent = 'Registrando... ⏳';
        });
    }
});
