/*
|--------------------------------------------------------------------------
| Nombre      : Jesus Alexander Perez
| Fecha       : 25/05/2026
| Descripción : Portal del guardia para autorizar el ingreso vía QR.
|               Envía la orden al servidor, muestra confirmación visual
|               y maneja errores con reintento.
|--------------------------------------------------------------------------
*/

document.addEventListener("DOMContentLoaded", () => {

    /*
    |--------------------------------------------------------------------------
    | Sección 1 : Referencias al DOM y tokens de seguridad
    |--------------------------------------------------------------------------
    */
    const btnAutorizar = document.getElementById("btn-autorizar");
    const contenedor = document.getElementById("portal-contenedor");

    if (!btnAutorizar || !contenedor) return;

    // Token único de la sesión QR
    const tokenQR = contenedor.dataset.token;
    const baseUrl = contenedor.dataset.baseUrl;
    // Token CSRF de Laravel
    const tokenCSRF = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    /*
    |--------------------------------------------------------------------------
    | Sección 2 : Evento de autorización
    |--------------------------------------------------------------------------
    */
    btnAutorizar.addEventListener("click", () => {
        // Evitar doble envío accidental
        btnAutorizar.disabled = true;
        btnAutorizar.innerText = "Procesando...";

        // Enviar orden al servidor
        fetch(`${baseUrl}/api/autorizar-guardia/${tokenQR}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': tokenCSRF,
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            }
        })
        .then(response => {
            if (!response.ok) throw new Error("Error en la autorización");
            return response.json();
        })
        .then(data => {
            if (data.status === 'success') {
                // Mostrar interfaz de éxito
                contenedor.innerHTML = `
                    <div class="portal-card" style="text-align: center;">
                        <div class="portal-icono" style="color: #28a745;">
                            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                        </div>
                        <h1 class="portal-titulo" style="color: #28a745;">¡Acceso Concedido!</h1>
                        <p class="portal-descripcion">El terminal de la PC ha sido desbloqueado. Ya puede cerrar esta ventana de su celular.</p>
                    </div>
                `;
            }
        })
        .catch(error => {
            console.error("Error:", error);
            alert("Hubo un problema al autorizar el ingreso. Inténtalo de nuevo.");
            btnAutorizar.disabled = false;
            btnAutorizar.innerText = "Autorizar ingreso";
        });
    });
});
