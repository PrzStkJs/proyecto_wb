/*
|--------------------------------------------------------------------------
| Nombre      : Jesus Alexander Perez
| Fecha       : 25/05/2026
| Descripción : Filtrado en tiempo real de la tabla de reportes (texto y
|               rango de fechas), descarga a Excel con SheetJS y control
|               del formulario de búsqueda para evitar recarga.
|--------------------------------------------------------------------------
*/

document.addEventListener('DOMContentLoaded', () => {

    /*
    |--------------------------------------------------------------------------
    | Sección 1 : Referencias a elementos del DOM
    |--------------------------------------------------------------------------
    */
    const inputBuscar = document.querySelector('input[name="buscar"]');
    const inputFechaInicio = document.querySelector('input[name="fecha_inicio"]');
    const inputFechaFin = document.querySelector('input[name="fecha_fin"]');
    const tabla = document.querySelector('.tabla tbody');
    const filas = tabla ? Array.from(tabla.querySelectorAll('tr')) : [];
    const btnExcel = document.querySelector('.boton-excel');
    const formBusqueda = document.querySelector('.fila-busqueda');

    if (!inputBuscar || !tabla || !formBusqueda) return;

    /*
    |--------------------------------------------------------------------------
    | Sección 2 : Función para filtrar filas según texto y fechas
    |--------------------------------------------------------------------------
    */
    function filtrarTabla() {
        const texto = inputBuscar.value.trim().toLowerCase();
        const fechaInicio = inputFechaInicio?.value ? new Date(inputFechaInicio.value + 'T00:00:00') : null;
        const fechaFin = inputFechaFin?.value ? new Date(inputFechaFin.value + 'T23:59:59') : null;

        filas.forEach(fila => {
            // Saltar fila de "No se encontraron registros"
            if (fila.querySelector('td[colspan]')) return;

            let mostrar = true;

            // Filtro por texto
            if (texto) {
                const textoFila = fila.textContent.toLowerCase();
                if (!textoFila.includes(texto)) {
                    mostrar = false;
                }
            }

            // Filtro por fecha (primera celda: dd/mm/YYYY)
            if (mostrar && (fechaInicio || fechaFin)) {
                const celdaFecha = fila.querySelector('td:first-child');
                if (celdaFecha) {
                    const partes = celdaFecha.textContent.trim().split('/');
                    if (partes.length === 3) {
                        const fechaFila = new Date(`${partes[2]}-${partes[1]}-${partes[0]}T00:00:00`);
                        if (fechaInicio && fechaFila < fechaInicio) mostrar = false;
                        if (fechaFin && fechaFila > fechaFin) mostrar = false;
                    }
                }
            }

            fila.style.display = mostrar ? '' : 'none';
        });
    }

    /*
    |--------------------------------------------------------------------------
    | Sección 3 : Eventos de filtrado en tiempo real
    |--------------------------------------------------------------------------
    */
    inputBuscar.addEventListener('input', filtrarTabla);
    if (inputFechaInicio) inputFechaInicio.addEventListener('change', filtrarTabla);
    if (inputFechaFin) inputFechaFin.addEventListener('change', filtrarTabla);

    /*
    |--------------------------------------------------------------------------
    | Sección 4 : Descarga de tabla visible como Excel (SheetJS)
    |--------------------------------------------------------------------------
    */
    if (btnExcel) {
        btnExcel.addEventListener('click', () => {
            const filasVisibles = filas.filter(f => f.style.display !== 'none' && !f.querySelector('td[colspan]'));
            const datos = [];

            const encabezados = [];
            document.querySelectorAll('.tabla thead th').forEach(th => encabezados.push(th.textContent.trim()));
            datos.push(encabezados);

            filasVisibles.forEach(fila => {
                const celdas = fila.querySelectorAll('td');
                const filaDatos = [];
                celdas.forEach(td => filaDatos.push(td.textContent.trim()));
                datos.push(filaDatos);
            });

            if (typeof XLSX !== 'undefined') {
                const wb = XLSX.utils.book_new();
                const ws = XLSX.utils.aoa_to_sheet(datos);
                XLSX.utils.book_append_sheet(wb, ws, 'Reporte');
                XLSX.writeFile(wb, 'reporte_visitas.xlsx');
            } else {
                console.error('SheetJS (XLSX) no está cargado.');
            }
        });
    }

    /*
    |--------------------------------------------------------------------------
    | Sección 5 : Evitar recarga del formulario de búsqueda
    |--------------------------------------------------------------------------
    */
    formBusqueda.addEventListener('submit', (e) => {
        e.preventDefault();
        filtrarTabla();
    });
});
