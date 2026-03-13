<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function redirect($provider)
    {
        if ($provider === 'spotify') {
            return Socialite::driver($provider)
                ->scopes(['user-read-email', 'user-read-private'])
                ->redirect();
        }

        return Socialite::driver($provider)->redirect();
    }

    // Manejar la respuesta del proveedor
    public function callback($provider)
    {
        try {
            $socialUser = Socialite::driver($provider)->user();
            
            // Lógica de "Actualizar o Crear"
            $user = User::updateOrCreate([
                'email' => $socialUser->getEmail(),
            ], [
                'name' => $socialUser->getName() ?? $socialUser->getNickname(),
                'provider_id' => $socialUser->getId(),
                'provider_name' => $provider,
                'avatar' => $socialUser->getAvatar(),
            ]);

            Auth::login($user);

            return redirect('/dashboard'); // Asegúrate de que esta ruta exista
        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Error al autenticar con ' . $provider);
        }
    }
}