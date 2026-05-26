<?php

/*
|--------------------------------------------------------------------------
| Nombre      : Jesus Alexander Perez
| Fecha       : 25/05/2026
| Descripción : Service Provider principal de la aplicación.
|               Aquí se registra el "puente" entre Laravel Socialite y
|               Microsoft Azure AD.
|--------------------------------------------------------------------------
*/

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
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
    | Sección : Registro del driver Azure para Laravel Socialite
    |--------------------------------------------------------------------------
    */
    public function boot(): void
    {
        \Illuminate\Support\Facades\Event::listen(
            SocialiteWasCalled::class,
            [AzureExtendSocialite::class, 'handle']
        );
    }
}
