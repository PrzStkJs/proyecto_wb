/*
|--------------------------------------------------------------------------
| Nombre      : Jesus Alexander Perez
| Fecha       : 25/05/2026
| Descripción : Filtrado en tiempo real de la tabla de reportes (texto y
|               rango de fechas), descarga a Excel con SheetJS, control
|               del formulario de búsqueda para evitar recarga y dashboard
|               de gráficos con Chart.js.
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
    const btnVerGraficos = document.getElementById('btnVerGraficos');
    const vistaTabla = document.getElementById('vistaTabla');
    const vistaGraficos = document.getElementById('vistaGraficos');

    let modoGrafico = false;
    let charts = {};

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
            if (fila.querySelector('td[colspan]')) return;

            let mostrar = true;

            if (texto) {
                const textoFila = fila.textContent.toLowerCase();
                if (!textoFila.includes(texto)) {
                    mostrar = false;
                }
            }

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

        if (modoGrafico) {
            generarGraficos();
        }
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

    /*
    |--------------------------------------------------------------------------
    | Sección 6 : Alternar entre tabla y gráficos
    |--------------------------------------------------------------------------
    */
    if (btnVerGraficos && vistaTabla && vistaGraficos) {
        btnVerGraficos.addEventListener('click', () => {
            modoGrafico = !modoGrafico;

            if (modoGrafico) {
                vistaTabla.style.display = 'none';
                vistaGraficos.style.display = 'block';
                btnVerGraficos.innerHTML = `
                    <svg width="18" height="18" viewBox="0 0 24 24" aria-hidden="true" focusable="false" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/>
                        <line x1="3" y1="9" x2="21" y2="9"/>
                        <line x1="3" y1="15" x2="21" y2="15"/>
                        <line x1="9" y1="3" x2="9" y2="21"/>
                    </svg>
                    Ver tabla
                `;
                generarGraficos();
            } else {
                vistaTabla.style.display = 'block';
                vistaGraficos.style.display = 'none';
                btnVerGraficos.innerHTML = `
                    <svg width="18" height="18" viewBox="0 0 24 24" aria-hidden="true" focusable="false" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="3" width="7" height="7"/>
                        <rect x="14" y="3" width="7" height="7"/>
                        <rect x="3" y="14" width="7" height="7"/>
                        <rect x="14" y="14" width="7" height="7"/>
                    </svg>
                    Ver gráficos
                `;
                destruirGraficos();
            }
        });
    }

    /*
    |--------------------------------------------------------------------------
    | Sección 7 : Obtener datos de la tabla (filas visibles)
    |--------------------------------------------------------------------------
    */
    function obtenerDatosTabla() {
        const filasVisibles = filas.filter(f => f.style.display !== 'none' && !f.querySelector('td[colspan]'));
        const datos = [];

        filasVisibles.forEach(fila => {
            const celdas = fila.querySelectorAll('td');
            datos.push({
                fecha: celdas[0]?.textContent.trim() || '',
                dni: celdas[1]?.textContent.trim() || '',
                funcionario: celdas[2]?.textContent.trim() || '',
                visitante: celdas[3]?.textContent.trim() || '',
                acompanantes: celdas[4]?.textContent.trim() || 'Ninguno',
                entidad: celdas[5]?.textContent.trim() || '',
                horaIngreso: celdas[6]?.textContent.trim() || '',
                horaSalida: celdas[7]?.textContent.trim() || '',
                motivo: celdas[8]?.textContent.trim() || ''
            });
        });

        return datos;
    }

    /*
    |--------------------------------------------------------------------------
    | Sección 8 : Generar gráficos
    |--------------------------------------------------------------------------
    */
    function generarGraficos() {
        destruirGraficos();
        const datos = obtenerDatosTabla();

        if (datos.length === 0) return;

        // --- Totales para tarjetas ---
        const totalVisitas = datos.length;
        document.getElementById('totalVisitas').textContent = totalVisitas;

        const fechasSet = new Set(datos.map(d => d.fecha));
        const diasUnicos = fechasSet.size;
        const promedioDiario = diasUnicos > 0 ? (totalVisitas / diasUnicos).toFixed(1) : '0';
        document.getElementById('promedioDiario').textContent = promedioDiario;

        const enCurso = datos.filter(d => d.horaSalida.includes('En curso')).length;
        document.getElementById('enCurso').textContent = enCurso;

        // Día con más visitas
        const contadorFechas = {};
        datos.forEach(d => {
            contadorFechas[d.fecha] = (contadorFechas[d.fecha] || 0) + 1;
        });
        let diaMax = '—';
        let maxVisitas = 0;
        for (const [fecha, count] of Object.entries(contadorFechas)) {
            if (count > maxVisitas) {
                maxVisitas = count;
                diaMax = `${fecha} (${count})`;
            }
        }
        document.getElementById('diaMasVisitas').textContent = diaMax;

        // --- Gráfico 1 : Visitas por día (barras) ---
        const ctx1 = document.getElementById('graficoVisitasDia').getContext('2d');
        const labelsFechas = Object.keys(contadorFechas).sort();
        const dataFechas = labelsFechas.map(f => contadorFechas[f]);

        charts.barras = new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: labelsFechas,
                datasets: [{
                    label: 'Visitas',
                    data: dataFechas,
                    backgroundColor: '#dc2626',
                    borderRadius: 6
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } }
            }
        });

        // --- Gráfico 2 : Distribución de motivos (pastel) ---
        const ctx2 = document.getElementById('graficoMotivos').getContext('2d');
        const contadorMotivos = {};
        datos.forEach(d => {
            const motivo = d.motivo || 'No especificado';
            contadorMotivos[motivo] = (contadorMotivos[motivo] || 0) + 1;
        });
        const labelsMotivos = Object.keys(contadorMotivos);
        const dataMotivos = labelsMotivos.map(m => contadorMotivos[m]);
        const coloresPastel = ['#dc2626', '#b91c1c', '#991b1b', '#7f1d1d', '#450a0a', '#fee2e2', '#fca5a5'];

        charts.pastel = new Chart(ctx2, {
            type: 'pie',
            data: {
                labels: labelsMotivos,
                datasets: [{
                    data: dataMotivos,
                    backgroundColor: coloresPastel.slice(0, labelsMotivos.length)
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });

        // --- Gráfico 3 : Top 5 funcionarios más visitados (barras horizontales) ---
        const ctx3 = document.getElementById('graficoFuncionarios').getContext('2d');
        const contadorFuncionarios = {};
        datos.forEach(d => {
            const nombre = d.funcionario || 'Desconocido';
            contadorFuncionarios[nombre] = (contadorFuncionarios[nombre] || 0) + 1;
        });
        const top5 = Object.entries(contadorFuncionarios)
            .sort((a, b) => b[1] - a[1])
            .slice(0, 5);
        const labelsTop = top5.map(t => t[0]);
        const dataTop = top5.map(t => t[1]);

        charts.funcionarios = new Chart(ctx3, {
            type: 'bar',
            data: {
                labels: labelsTop,
                datasets: [{
                    label: 'Visitas',
                    data: dataTop,
                    backgroundColor: '#dc2626',
                    borderRadius: 6
                }]
            },
            options: {
                indexAxis: 'y',
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } }
            }
        });
    }

    /*
    |--------------------------------------------------------------------------
    | Sección 9 : Destruir gráficos existentes
    |--------------------------------------------------------------------------
    */
    function destruirGraficos() {
        if (charts.barras) charts.barras.destroy();
        if (charts.pastel) charts.pastel.destroy();
        if (charts.funcionarios) charts.funcionarios.destroy();
        charts = {};
    }
});
