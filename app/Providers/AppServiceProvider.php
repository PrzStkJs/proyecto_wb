<?php

/*
|--------------------------------------------------------------------------
| Nombre       : Jesus Alexander Perez
| Fecha       : 25/05/2026
| Descripción : Service Provider principal de la aplicación.
|               Aquí se registra el "puente" entre Laravel Socialite y
|               Microsoft Azure AD, y se fuerza HTTPS en producción.
|--------------------------------------------------------------------------
*/

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL; // <-- 1. IMPORTANTE: Agregamos esta línea para usar URL
use SocialiteProviders\Manager\SocialiteWasCalled;
use SocialiteProviders\Azure\AzureExtendSocialite;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /*
    |--------------------------------------------------------------------------
    | Sección : Registro del driver Azure para Laravel Socialite e HTTPS
    |--------------------------------------------------------------------------
    */
    public function boot(): void
    {
        // 2. Forzar HTTPS solo si NO estás en tu entorno local (Laragon)
        if (!app()->isLocal()) {
            URL::forceScheme('https');
        }

        // 3. Tu configuración existente de Azure para Socialite
        \Illuminate\Support\Facades\Event::listen(
            SocialiteWasCalled::class,
            [AzureExtendSocialite::class, 'handle']
        );
    }
}
