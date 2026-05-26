/*
|--------------------------------------------------------------------------
| Nombre      : Jesus Alexander Perez
| Fecha       : 25/05/2026
| Descripción : Generación de código QR para autenticación, consulta
|               periódica (polling) del estado de autorización y
|               redirección al panel de gestión.
|--------------------------------------------------------------------------
*/

document.addEventListener("DOMContentLoaded", () => {

    /*
    |--------------------------------------------------------------------------
    | Sección 1 : Obtener contenedor y token desde el HTML
    |--------------------------------------------------------------------------
    */
    const qrcodeContainer = document.getElementById("qrcode");

    if (!qrcodeContainer) {
        console.error("Error crítico: No se encontró el elemento HTML con id 'qrcode'.");
        return;
    }

    const tokenQR = qrcodeContainer.dataset.token;
    const baseUrl = qrcodeContainer.dataset.baseUrl;

    if (!tokenQR) {
        console.error("Error: El atributo data-token está vacío o no existe.");
        return;
    }

    /*
    |--------------------------------------------------------------------------
    | Sección 2 : Generar el código QR con la URL del celular
    |--------------------------------------------------------------------------
    */
    const urlCelular = `${baseUrl}/Validacion_QR/${tokenQR}`;

    new QRCode(qrcodeContainer, {
        text: urlCelular,
        width: 256,
        height: 256,
        colorDark: "#000000",
        colorLight: "#ffffff",
        correctLevel: QRCode.CorrectLevel.H
    });

    /*
    |--------------------------------------------------------------------------
    | Sección 3 : Polling cada 2 segundos para verificar autorización
    |--------------------------------------------------------------------------
    */
    const miIntervalo = setInterval(validarEstadoQR, 2000);

    function validarEstadoQR() {
        fetch(`${baseUrl}/api/verificar-status-qr/${tokenQR}`)
            .then(response => {
                if (!response.ok) throw new Error("Error de red al consultar el estado.");
                return response.json();
            })
            .then(data => {
                if (data.login === true) {
                    clearInterval(miIntervalo);
                    window.location.href = `${baseUrl}/Plataforma_gestion`;
                }
            })
            .catch(error => console.error('Error al consultar el estado:', error));
    }
});
