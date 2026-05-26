/*
|--------------------------------------------------------------------------
| Nombre      : Jesus Alexander Perez
| Fecha       : 25/05/2026
| Descripción : Controla la pantalla de inicio con video (intro).
|               Al hacer clic se muestra el video, al finalizar (o tras
|               6 segundos de seguridad) se revela el contenido principal.
|--------------------------------------------------------------------------
*/


/*
|--------------------------------------------------------------------------
| Sección 1 : Referencias del DOM
|--------------------------------------------------------------------------
*/
const pantallaInicio = document.getElementById('pantalla-inicio');
const loader = document.getElementById('loader');
const video = document.getElementById('videoLoader');

/*
|--------------------------------------------------------------------------
| Sección 2 : Activar video al hacer clic en la pantalla de inicio
|--------------------------------------------------------------------------
*/
pantallaInicio.addEventListener('click', () => {
    pantallaInicio.style.display = 'none';
    video.muted = false;
    video.volume = 1.0;
    video.play();
});

/*
|--------------------------------------------------------------------------
| Sección 3 : Ocultar el loader cuando el video termina
|--------------------------------------------------------------------------
*/
video.addEventListener('ended', () => {
    loader.classList.add('oculto');
});

/*
|--------------------------------------------------------------------------
| Sección 4 : Plan B: si el video no se reproduce, ocultar loader tras 6s
|--------------------------------------------------------------------------
*/
setTimeout(() => {
    if (!loader.classList.contains('oculto')) {
        loader.classList.add('oculto');
    }
}, 6000);
