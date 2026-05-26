<?php

/*
|--------------------------------------------------------------------------
| Nombre      : Jesus Alexander Perez
| Fecha       : 25/05/2026
| Descripción : Controlador de autenticación social (Google, GitHub,
|               Facebook, LinkedIn, Microsoft, Twitter / X) con Laravel
|               Socialite.
|--------------------------------------------------------------------------
*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Exception;

class GoogleController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Sección 1 : Autenticación con Google
    |--------------------------------------------------------------------------
    */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            $user = User::where('email', $googleUser->email)->first();

            if ($user) {
                Auth::login($user);
            } else {
                $user = User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'password' => bcrypt('123456dummy'),
                ]);
                Auth::login($user);
            }

            session([
                'user_avatar' => $googleUser->avatar,
                'user_name'   => $googleUser->name,
            ]);

            return redirect()->intended('/Autenticarse');
        } catch (Exception $e) {
            return redirect('/')->with('error', 'No se pudo iniciar sesión con Google.');
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Sección 2 : Autenticación con GitHub
    |--------------------------------------------------------------------------
    */
    public function redirectToGithub()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleGithubCallback()
    {
        try {
            $githubUser = Socialite::driver('github')->user();
            $user = User::where('email', $githubUser->email)->first();

            if ($user) {
                Auth::login($user);
            } else {
                $user = User::create([
                    'name' => $githubUser->name ?? $githubUser->nickname,
                    'email' => $githubUser->email,
                    'password' => bcrypt('123456dummy'),
                ]);
                Auth::login($user);
            }

            session([
                'user_avatar' => $githubUser->avatar,
                'user_name'   => $githubUser->name ?? $githubUser->nickname,
            ]);

            return redirect()->intended('/Autenticarse');
        } catch (Exception $e) {
            return redirect('/')->with('error', 'No se pudo iniciar sesión con GitHub.');
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Sección 3 : Autenticación con Facebook
    |--------------------------------------------------------------------------
    */
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        try {
            $facebookUser = Socialite::driver('facebook')->user();
            $user = User::where('email', $facebookUser->email)->first();

            if ($user) {
                Auth::login($user);
            } else {
                $user = User::create([
                    'name' => $facebookUser->name,
                    'email' => $facebookUser->email,
                    'password' => bcrypt('123456dummy'),
                ]);
                Auth::login($user);
            }

            session([
                'user_avatar' => $facebookUser->avatar,
                'user_name'   => $facebookUser->name,
            ]);

            return redirect()->intended('/Autenticarse');
        } catch (Exception $e) {
            return redirect('/')->with('error', 'No se pudo iniciar sesión con Facebook.');
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Sección 4 : Autenticación con LinkedIn
    |--------------------------------------------------------------------------
    */
    public function redirectToLinkedin()
    {
        return Socialite::driver('linkedin-openid')->redirect();
    }

    public function handleLinkedinCallback()
    {
        try {
            $linkedinUser = Socialite::driver('linkedin-openid')->user();
            $user = User::where('email', $linkedinUser->email)->first();

            if ($user) {
                Auth::login($user);
            } else {
                $user = User::create([
                    'name' => $linkedinUser->name,
                    'email' => $linkedinUser->email,
                    'password' => bcrypt('123456dummy'),
                ]);
                Auth::login($user);
            }

            session([
                'user_avatar' => $linkedinUser->avatar,
                'user_name'   => $linkedinUser->name,
            ]);

            return redirect()->intended('/Autenticarse');
        } catch (Exception $e) {
            return redirect('/')->with('error', 'Hubo un problema con LinkedIn');
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Sección 5 : Autenticación con Microsoft (Azure)
    |--------------------------------------------------------------------------
    */
    public function redirectToMicrosoft()
    {
        return Socialite::driver('azure')->redirect();
    }

    public function handleMicrosoftCallback()
    {
        try {
            $microsoftUser = Socialite::driver('azure')->user();
            $user = User::where('email', $microsoftUser->email)->first();

            if ($user) {
                Auth::login($user);
            } else {
                $user = User::create([
                    'name' => $microsoftUser->name,
                    'email' => $microsoftUser->email,
                    'password' => bcrypt('123456dummy'),
                ]);
                Auth::login($user);
            }

            session([
                'user_avatar' => $microsoftUser->avatar,
                'user_name'   => $microsoftUser->name,
            ]);

            return redirect()->intended('/Autenticarse');
        } catch (Exception $e) {
            return redirect('/')->with('error', 'Error al entrar con Microsoft');
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Sección 6 : Autenticación con Twitter (X)
    |--------------------------------------------------------------------------
    */
    public function redirectToTwitter()
    {
        return Socialite::driver('twitter-oauth-2')->redirect();
    }

    public function handleTwitterCallback()
    {
        try {
            $twitterUser = Socialite::driver('twitter-oauth-2')->user();
            $email = $twitterUser->email ?? $twitterUser->nickname . '@twitter.com';

            $user = User::where('email', $email)->first();

            if ($user) {
                Auth::login($user);
            } else {
                $user = User::create([
                    'name' => $twitterUser->name ?? $twitterUser->nickname,
                    'email' => $email,
                    'password' => bcrypt('123456dummy'),
                ]);
                Auth::login($user);
            }

            session([
                'user_avatar' => $twitterUser->avatar,
                'user_name'   => $twitterUser->name ?? $twitterUser->nickname,
            ]);

            return redirect()->intended('/Autenticarse');
        } catch (Exception $e) {
            return redirect('/')->with('error', 'Hubo un problema al iniciar sesión con X.');
        }
    }
}
