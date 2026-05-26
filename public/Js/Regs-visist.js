/*
|--------------------------------------------------------------------------
| Nombre      : Jesus Alexander Perez
| Fecha       : 25/05/2026
| Descripción : Filtrado en tiempo real de tarjetas de visitas mediante
|               búsqueda en el título y la entidad. Muestra un mensaje
|               si no hay resultados. También protege el botón "Nueva visita",
|               los enlaces "Agregar más personas" y los botones "Registrar salidas"
|               contra clics múltiples.
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
    const btnNuevaVisita = document.getElementById('btnNuevaVisita');

    if (btnNuevaVisita) {
        btnNuevaVisita.addEventListener('click', function () {
            this.disabled = true;
            this.textContent = 'Cargando...';
        });
    }

    /*
    |--------------------------------------------------------------------------
    | Sección 2 : Protección para enlaces "Agregar más personas" y botones "Registrar salidas"
    |--------------------------------------------------------------------------
    */
    function protegerBotonRedireccion(selector, esEnlace = false) {
        const elementos = document.querySelectorAll(selector);
        elementos.forEach(elemento => {
            elemento.addEventListener('click', function (e) {
                e.preventDefault();

                // Obtener la URL de destino según el tipo de elemento
                let url = '';
                if (esEnlace) {
                    url = this.getAttribute('href');
                } else {
                    const onclick = this.getAttribute('onclick');
                    const match = onclick.match(/window\.location\.href\s*=\s*'([^']+)'/);
                    if (match) url = match[1];
                }

                if (!url) return;


                this.style.pointerEvents = 'none';
                this.style.opacity = '0.6';
                if (esEnlace) {
                    this.textContent = 'Cargando...';
                } else {
                    this.textContent = 'Cargando...';
                    this.disabled = true;
                }
                setTimeout(() => {
                    window.location.href = url;
                }, 100);
            });
        });
    }

    protegerBotonRedireccion('.tarjeta-agregar', true);
    protegerBotonRedireccion('.boton-registrar-salida', false);

    /*
    |--------------------------------------------------------------------------
    | Sección 3 : Filtrado en tiempo real de las tarjetas
    |--------------------------------------------------------------------------
    */
    if (buscadorInput && listaVisitas) {

        const mensajeSinResultados = document.createElement('p');
        mensajeSinResultados.textContent = 'No se encontraron visitas';
        mensajeSinResultados.style.cssText = 'text-align: center; padding: 2rem; color: #888;';
        mensajeSinResultados.classList.add('mensaje-sin-resultados');
        mensajeSinResultados.style.display = 'none';
        listaVisitas.appendChild(mensajeSinResultados);

        function filtrarVisitas() {
            const textoBusqueda = buscadorInput.value.trim().toLowerCase();
            let hayCoincidencias = false;

            tarjetas.forEach(tarjeta => {
                const titulo = tarjeta.querySelector('.tarjeta-titulo')?.textContent.toLowerCase() || '';
                const entidad = tarjeta.querySelector('.tarjeta-entidad')?.textContent.toLowerCase() || '';

                if (titulo.includes(textoBusqueda) || entidad.includes(textoBusqueda)) {
                    tarjeta.style.display = '';
                    hayCoincidencias = true;
                } else {
                    tarjeta.style.display = 'none';
                }
            });

            if (hayCoincidencias || textoBusqueda === '') {
                mensajeSinResultados.style.display = 'none';
            } else {
                mensajeSinResultados.style.display = 'block';
            }
        }

        buscadorInput.addEventListener('input', filtrarVisitas);
        buscadorInput.addEventListener('keypress', function (e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                filtrarVisitas();
            }
        });
    }
});
