/*
|--------------------------------------------------------------------------
| Nombre      : Jesus Alexander Perez
| Fecha       : 25/05/2026
| Descripción : Filtrado en tiempo real de tarjetas de visitas mediante
|               búsqueda en el título y la entidad. Muestra un mensaje
|               si no hay resultados.
|--------------------------------------------------------------------------
*/

document.addEventListener('DOMContentLoaded', function () {

    /*
    |--------------------------------------------------------------------------
    | Sección 1 : Referencias a elementos del DOM
    |--------------------------------------------------------------------------
    */
    const buscadorInput = document.querySelector('.buscador-input');
    const tarjetas = document.querySelectorAll('.tarjeta-visita');
    const listaVisitas = document.querySelector('.lista-visitas');

    if (buscadorInput && listaVisitas) {

        /*
        |--------------------------------------------------------------------------
        | Sección 2 : Crear mensaje de "sin resultados" (oculto por defecto)
        |--------------------------------------------------------------------------
        */
        const mensajeSinResultados = document.createElement('p');
        mensajeSinResultados.textContent = 'No se encontraron visitas';
        mensajeSinResultados.style.cssText = 'text-align: center; padding: 2rem; color: #888;';
        mensajeSinResultados.classList.add('mensaje-sin-resultados');
        mensajeSinResultados.style.display = 'none';

        // Al estar dentro del IF, estamos 100% seguros de que listaVisitas existe
        listaVisitas.appendChild(mensajeSinResultados);

        /*
        |--------------------------------------------------------------------------
        | Sección 3 : Función que realiza el filtrado
        |--------------------------------------------------------------------------
        */
        function filtrarVisitas() {
            const textoBusqueda = buscadorInput.value.trim().toLowerCase();
            let hayCoincidencias = false;

            tarjetas.forEach(tarjeta => {
                const titulo = tarjeta.querySelector('.tarjeta-titulo')?.textContent.toLowerCase() || '';
                const entidad = tarjeta.querySelector('.tarjeta-entidad')?.textContent.toLowerCase() || '';

                if (titulo.includes(textoBusqueda) || entidad.includes(textoBusqueda)) {
                    tarjeta.style.display = ''; // Mostrar
                    hayCoincidencias = true;
                } else {
                    tarjeta.style.display = 'none'; // Ocultar
                }
            });

            // Mostrar u ocultar mensaje "sin resultados"
            if (hayCoincidencias || textoBusqueda === '') {
                mensajeSinResultados.style.display = 'none';
            } else {
                mensajeSinResultados.style.display = 'block';
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Sección 4 : Escuchar el evento input y Enter
        |--------------------------------------------------------------------------
        */
        buscadorInput.addEventListener('input', filtrarVisitas);

        buscadorInput.addEventListener('keypress', function (e) {
            if (e.key === 'Enter') {
                e.preventDefault(); // Evitar submit accidental
                filtrarVisitas();
            }
        });

    }
});
